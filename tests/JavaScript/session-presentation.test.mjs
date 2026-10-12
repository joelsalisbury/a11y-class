import assert from 'node:assert/strict';
import test from 'node:test';
import { initSessionPresentation } from '../../resources/js/session-presentation.js';

function presentation(hash = '') {
    const handlers = new Map();
    const elements = new Map();
    const document = { activeElement: null, getElementById: id => id === 'session-resources' ? resources : null };
    function element(name, properties = {}) {
        const events = new Map();
        const value = {
            hidden: false, disabled: false, textContent: '',
            addEventListener: (event, callback) => events.set(event, callback),
            fire(event, payload) { events.get(event)?.(payload); },
            focus() { document.activeElement = value; },
            scrollIntoView() {},
            closest() { return null; },
            ...properties,
        };
        elements.set(name, value);
        return value;
    }
    const resources = element('resources');
    const slides = ['Opening', 'Motion', 'Class Work'].map(title => {
        const heading = element(`heading:${title}`, { textContent: title });
        return element(`slide:${title}`, { querySelector: () => heading });
    });
    for (const name of ['presentation-deck', 'session-review', 'slide-previous', 'slide-next', 'view-all', 'present', 'slide-progress', 'slide-announcement', 'presentation-controls']) element(name);
    elements.get('session-review').contains = target => target === resources;
    const root = element('root', {
        querySelectorAll: () => slides,
        querySelector: selector => elements.get(selector.slice(6, -1)),
    });
    const browser = {
        document, location: { hash },
        history: {
            pushState: (_, __, hash) => { browser.location.hash = hash; },
            replaceState: (_, __, hash) => { browser.location.hash = hash; },
        },
        addEventListener: (event, callback) => handlers.set(event, callback),
        requestAnimationFrame: callback => callback(),
    };
    initSessionPresentation(root, browser);
    return { root, browser, slides, get: name => elements.get(name), key(event) { handlers.get('keydown')(event); }, hash(value) { browser.location.hash = value; handlers.get('hashchange')(); } };
}

test('only the current slide is exposed and hash/progress/announcements follow navigation', () => {
    const f = presentation('#slide-2');
    assert.deepEqual(f.slides.map(slide => slide.hidden), [true, false, true]);
    assert.equal(f.get('session-review').hidden, true);
    assert.equal(f.get('slide-progress').textContent, '2 of 3');
    assert.equal(f.get('slide-announcement').textContent, 'Slide 2 of 3: Motion');
    f.get('slide-next').focus();
    f.get('slide-next').fire('click');
    assert.equal(f.browser.location.hash, '#slide-3');
    assert.equal(f.get('slide-next').disabled, true);
    assert.equal(f.browser.document.activeElement, f.get('heading:Class Work'));
    f.hash('#slide-1');
    assert.equal(f.get('slide-previous').disabled, true);
    f.hash('#slide-99');
    assert.equal(f.browser.location.hash, '#slide-3');
});

test('View all exposes the complete review and section links switch into review mode', () => {
    const f = presentation();
    f.get('view-all').fire('click');
    assert.equal(f.get('session-review').hidden, false);
    assert.equal(f.get('presentation-deck').hidden, true);
    assert.equal(f.browser.location.hash, '#view-all');
    assert.equal(f.browser.document.activeElement, f.get('present'));
    f.get('present').fire('click');
    assert.equal(f.get('session-review').hidden, true);
    f.hash('#session-resources');
    assert.equal(f.get('session-review').hidden, false);
});

test('arrow keys move slides but leave ordinary controls and modified shortcuts alone', () => {
    const f = presentation();
    let prevented = false;
    const event = { key: 'ArrowRight', target: f.get('heading:Opening'), preventDefault() { prevented = true; } };
    f.key(event);
    assert.equal(prevented, true);
    assert.equal(f.browser.location.hash, '#slide-2');
    const control = { closest: () => ({}) };
    f.key({ ...event, target: control });
    assert.equal(f.browser.location.hash, '#slide-2');
    f.key({ ...event, ctrlKey: true });
    assert.equal(f.browser.location.hash, '#slide-2');
    f.get('view-all').fire('click');
    f.key(event);
    assert.equal(f.browser.location.hash, '#view-all');
});
