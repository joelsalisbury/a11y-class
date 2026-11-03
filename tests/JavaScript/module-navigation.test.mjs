import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import test from 'node:test';
import vm from 'node:vm';

test('hash navigation activates every responsive link for the current section', () => {
    const source = readFileSync(new URL('../../resources/js/app.js', import.meta.url), 'utf8')
        .replace(/^import .*;\n/gm, '');
    const listeners = new Map();
    const sections = new Map([
        ['quiz-03', { id: 'quiz-03', getBoundingClientRect: () => ({ top: 200 }) }],
        ['resources', { id: 'resources', getBoundingClientRect: () => ({ top: 500 }) }],
    ]);

    function link(href) {
        const classes = new Set();
        const attributes = new Map();

        return {
            classList: {
                toggle(name, active) {
                    if (active) {
                        classes.add(name);
                    } else {
                        classes.delete(name);
                    }
                },
                contains: name => classes.has(name),
            },
            getAttribute: name => name === 'href' ? href : null,
            setAttribute: (name, value) => attributes.set(name, value),
            removeAttribute: name => attributes.delete(name),
            isActive: () => classes.has('is-active'),
            current: () => attributes.get('aria-current'),
        };
    }

    const mobileQuizLink = link('#quiz-03');
    const desktopQuizLink = link('#quiz-03');
    const otherLink = link('#resources');
    const navLinks = [mobileQuizLink, desktopQuizLink, otherLink];
    const document = {
        querySelectorAll(selector) {
            if (selector === '[data-session-presentation]' || selector === '[data-cognitive-load-demo]') {
                return [];
            }

            return selector === '[data-session-nav-link]' ? navLinks : [];
        },
        getElementById: id => sections.get(id) ?? null,
    };
    const window = {
        innerHeight: 1000,
        location: { hash: '#quiz-03' },
        addEventListener: (type, listener) => listeners.set(type, listener),
        IntersectionObserver: class {
            constructor(callback) {
                this.callback = callback;
            }

            observe() {}
        },
    };

    vm.runInNewContext(source, {
        document,
        window,
        IntersectionObserver: window.IntersectionObserver,
    });

    assert.equal(mobileQuizLink.isActive(), true);
    assert.equal(mobileQuizLink.current(), 'location');
    assert.equal(desktopQuizLink.isActive(), true);
    assert.equal(desktopQuizLink.current(), 'location');
    assert.equal(otherLink.isActive(), false);

    window.location.hash = '#resources';
    listeners.get('hashchange')();

    assert.equal(mobileQuizLink.isActive(), false);
    assert.equal(desktopQuizLink.isActive(), false);
    assert.equal(otherLink.isActive(), true);
    assert.equal(otherLink.current(), 'location');
});

for (const [path, hash, expected] of [
    ['/modules/9', '', 'overview'],
    ['/modules/9', '#quiz-03', 'quiz'],
    ['/modules/9/session-17', '', 'session'],
    ['/modules/9/session-17', '#quiz-03', 'session'],
    ['/modules/9', '#unknown', 'overview'],
]) {
    test(`module navigation selects ${expected} at ${path}${hash} without scroll tracking`, () => {
        const source = readFileSync(new URL('../../resources/js/app.js', import.meta.url), 'utf8')
            .replace(/^import .*;\n/gm, '');
        const listeners = new Map();
        const links = [];

        for (const layout of ['mobile', 'desktop']) {
            for (const [name, target] of [
                ['overview', '/modules/9'],
                ['session', '/modules/9/session-17'],
                ['quiz', '/modules/9#quiz-03'],
            ]) {
                const defaultActive = name === (path === '/modules/9' ? 'overview' : 'session');
                const attributes = new Map(defaultActive ? [['aria-current', 'page']] : []);
                const classes = new Set(defaultActive ? ['is-active'] : []);
                const marker = { hidden: !defaultActive };
                links.push({
                    name, layout, marker,
                    getAttribute: attribute => attribute === 'href' ? target : attributes.get(attribute),
                    hasAttribute: attribute => attributes.has(attribute),
                    setAttribute: (attribute, value) => attributes.set(attribute, value),
                    removeAttribute: attribute => attributes.delete(attribute),
                    querySelector: () => marker,
                    classList: {
                        toggle: (value, active) => active ? classes.add(value) : classes.delete(value),
                        contains: value => classes.has(value),
                    },
                });
            }
        }

        const window = {
            location: { href: `http://localhost${path}${hash}` },
            addEventListener: (event, handler) => listeners.set(event, handler),
        };
        const document = {
            querySelectorAll: selector => selector === '[data-module-nav-link]' ? links : [],
        };

        vm.runInNewContext(source, { document, window, URL });

        const assertSelection = selected => {
            for (const link of links) {
                assert.equal(link.classList.contains('is-active'), link.name === selected, `${link.layout}: ${link.name}`);
                assert.equal(link.marker.hidden, link.name !== selected);
                assert.equal(link.hasAttribute('aria-current'), link.name === selected);
            }
        };

        assertSelection(expected);
        assert.equal(listeners.has('scroll'), false);

        if (path === '/modules/9') {
            window.location.href = 'http://localhost/modules/9#quiz-03';
            listeners.get('hashchange')();
            assertSelection('quiz');
            assert.equal(links.find(link => link.name === 'quiz').getAttribute('aria-current'), 'location');

            window.location.href = 'http://localhost/modules/9';
            listeners.get('hashchange')();
            assertSelection('overview');
        }
    });
}
