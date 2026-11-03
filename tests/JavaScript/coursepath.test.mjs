import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import test from 'node:test';
import vm from 'node:vm';

const source = readFileSync(new URL('../../resources/js/coursepath.js', import.meta.url), 'utf8');
function element(properties = {}) {
    const handlers = new Map();
    const classes = new Set();
    return {
        value: '', hidden: false, disabled: false, isConnected: true, textContent: '', dataset: {},
        classList: { add: name => classes.add(name), remove: name => classes.delete(name), contains: name => classes.has(name), toggle(name, yes) { yes ? classes.add(name) : classes.delete(name); } },
        addEventListener(type, handler) { handlers.set(type, handler); },
        async fire(type, details = {}) { const event = { target: this, currentTarget: this, preventDefault() {}, ...details }; return handlers.get(type)?.(event); },
        ...properties,
    };
}
function fixture(elements = {}, groups = {}, fetcher = async () => ({ ok: true, json: async () => ({}) })) {
    const document = element({ body: { classList: { contains: () => false } }, querySelector: key => elements[key] ?? null, querySelectorAll: key => groups[key] ?? [] });
    let url;
    vm.runInNewContext(source, {
        document, URL, URLSearchParams, AbortController,
        FormData: class { constructor(form) { this.form = form; } [Symbol.iterator]() { return this.form.entries[Symbol.iterator](); } },
        fetch: fetcher, history: { replaceState(_a, _b, value) { url = String(value); } }, location: { assign() {} },
        setTimeout(callback) { callback(); return 1; }, clearTimeout() {},
    });
    return { document, url: () => url };
}

test('catalog requests preserve combined filters and replace results without losing the form', async () => {
    const form = element({ action: 'http://localhost/coursepath/catalog', entries: [['q', 'data'], ['department', 'Data Science'], ['day[]', 'T']] });
    const results = element();
    let requested;
    const f = fixture({ '[data-catalog-filters]': form, '[data-catalog-results]': results, '[data-toast]': element() }, {}, async url => {
        requested = String(url);
        return { ok: true, text: async () => '<article>Data Visualization</article>' };
    });
    await form.fire('submit');
    await new Promise(setImmediate);
    assert.match(requested, /q=data/);
    assert.match(requested, /department=Data\+Science/);
    assert.match(requested, /day%5B%5D=T/);
    assert.equal(results.innerHTML, '<article>Data Visualization</article>');
    assert.equal(f.url(), requested);
});

test('section choices update the submitted section and selection state', async () => {
    const field = element({ value: 'des-1100-01' });
    const form = { querySelector: () => field };
    const choices = ['01', '02'].map(id => element({ dataset: { sectionChoice: `des-1100-${id}` }, closest: () => form }));
    for (const choice of choices) choice.parentElement = { querySelectorAll: () => choices };
    fixture({}, { '[data-section-choice]': choices });
    await choices[1].fire('click');
    assert.equal(field.value, 'des-1100-02');
    assert.equal(choices[0].classList.contains('is-selected'), false);
    assert.equal(choices[1].classList.contains('is-selected'), true);
});

test('prerequisite tips can be dismissed from the keyboard', async () => {
    const prerequisite = element();
    let prevented = false;
    fixture({}, { '[data-prerequisite-tooltip]': [prerequisite] });

    await prerequisite.fire('keydown', { key: 'Escape', preventDefault() { prevented = true; } });

    assert.equal(prevented, true);
    assert.equal(prerequisite.classList.contains('is-dismissed'), true);
});

test('adding a course updates the persistent count and server feedback', async () => {
    const button = element();
    const feedback = element();
    const count = element();
    const toast = element();
    const form = element({ action: 'http://localhost/coursepath/plan', entries: [], matches: () => true, querySelector: key => key === 'button[type=submit]' ? button : feedback });
    const f = fixture({ '[data-toast]': toast }, { '[data-plan-count]': [count] }, async () => ({ ok: true, json: async () => ({ count: 2, message: 'DES 1100 added to your schedule.' }) }));
    await f.document.fire('submit', { target: form });
    assert.equal(count.textContent, 2);
    assert.equal(feedback.textContent, 'DES 1100 added to your schedule.');
    assert.equal(toast.hidden, false);
    assert.equal(button.disabled, false);
});

test('adding a course refreshes its requirements and enables the remove action', async () => {
    const button = element();
    const feedback = element();
    const checklist = element();
    const removeAction = element();
    const form = element({ action: 'http://localhost/coursepath/plan', entries: [], matches: () => true, querySelector: key => key === 'button[type=submit]' ? button : feedback });
    const f = fixture({
        '[data-requirements-checklist]': checklist,
        '[data-course-remove-action]': removeAction,
        '[data-toast]': element(),
    }, {}, async () => ({
        ok: true,
        json: async () => ({
            count: 1,
            message: 'DES 1100 added to your schedule.',
            checklist: '<aside>1 / 5 courses</aside>',
            removeAction: '<form>Remove this course</form>',
        }),
    }));

    await f.document.fire('submit', { target: form });

    assert.equal(checklist.outerHTML, '<aside>1 / 5 courses</aside>');
    assert.equal(removeAction.innerHTML, '<form>Remove this course</form>');
});

test('rejected additions leave the plan count untouched and allow recovery', async () => {
    const button = element();
    const toast = element();
    const count = element({ textContent: '2' });
    const form = element({ action: 'http://localhost/coursepath/plan', entries: [], matches: () => true, querySelector: () => button });
    const f = fixture({ '[data-toast]': toast }, { '[data-plan-count]': [count] }, async () => ({ ok: false, json: async () => ({ message: 'This section is full. Choose another section.' }) }));
    await f.document.fire('submit', { target: form });
    assert.equal(count.textContent, '2');
    assert.match(toast.textContent, /section is full/);
    assert.equal(button.disabled, false);
});

test('failed catalog search names the current retry action', async () => {
    const form = element({ action: 'http://localhost/coursepath/catalog', entries: [] });
    const toast = element();
    const f = fixture({
        '[data-catalog-filters]': form,
        '[data-toast]': toast,
    }, {}, async () => ({ ok: false, redirected: false }));

    await form.fire('submit');
    await new Promise(setImmediate);

    assert.equal(toast.textContent, 'Search could not be updated. Use Search Courses to try again.');
});

test('removing a course replaces schedule totals and requirements together', async () => {
    const button = element({ isConnected: false });
    const region = element();
    const count = element();
    const form = element({ action: 'http://localhost/coursepath/plan/des-1100', entries: [['_method', 'delete']], matches: () => true, querySelector: () => button });
    const f = fixture({ '[data-toast]': element(), '[data-plan-region]': region }, { '[data-plan-count]': [count] }, async () => ({ ok: true, json: async () => ({ html: '<div data-plan-region>Updated requirements and timetable</div>', count: 1 }) }));
    await f.document.fire('submit', { target: form });
    assert.equal(count.textContent, 1);
    assert.match(region.outerHTML, /Updated requirements and timetable/);
});
