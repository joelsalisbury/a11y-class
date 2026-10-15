import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import test from 'node:test';
import vm from 'node:vm';

// Exercises the page's real handlers with a small DOM double, not a browser.
function fixture(page) {
    const source = readFileSync(new URL(`../../resources/views/experiences/${page}.blade.php`, import.meta.url), 'utf8');
    const elements = new Map();
    const groups = new Map();
    let now = 1000;
    let timerId = 0;
    const timers = new Map();
    const document = {
        activeElement: null,
        querySelector: selector => elements.get(selector) ?? null,
        querySelectorAll: selector => groups.get(selector) ?? [],
    };
    function element(selector, properties = {}) {
        const listeners = new Map();
        const children = new Map();
        const classes = new Set();
        const item = {
            value: '', textContent: '', disabled: false, hidden: false, checked: false,
            style: {}, dataset: {}, offsetWidth: 200, attributes: {},
            classList: {
                add: name => classes.add(name), remove: name => classes.delete(name),
                toggle: (name, state) => state ? classes.add(name) : classes.delete(name),
                contains: name => classes.has(name),
            },
            addEventListener: (type, listener) => listeners.set(type, listener),
            fire(type, target = item) { listeners.get(type)?.({ target, preventDefault() {} }); },
            focus() { document.activeElement = item; },
            scrollIntoView() {},
            setCustomValidity(message) { item.validationMessage = message; },
            reportValidity() { item.validityReported = true; },
            contains(target) { return [...children.values()].includes(target); },
            setAttribute(name, value) { item.attributes[name] = value; },
            querySelector: selector => children.get(selector) ?? null,
            child(selector, value) { children.set(selector, value); },
            reset() { for (const child of children.values()) child.value = ''; item.fire('reset'); },
            ...properties,
        };
        elements.set(selector, item);
        return item;
    }
    for (const [, id] of source.matchAll(/id="([a-z][\w-]*)"/g)) element(`#${id}`);
    const scripts = [...source.matchAll(/<script>([\s\S]*?)<\/script>/g)].map(match => match[1]).join('\n');
    return {
        element, elements, groups, document,
        get: selector => elements.get(selector),
        run() {
            vm.runInNewContext(scripts, {
                document, Date: { now: () => now },
                setInterval(callback) { timers.set(++timerId, callback); return timerId; },
                clearInterval(id) { timers.delete(id); },
            });
        },
        advance(milliseconds) { now += milliseconds; for (const callback of [...timers.values()]) callback(); },
    };
}

test('GearShare selects equipment consistently, releases expired holds, and confirms valid requests', () => {
    const f = fixture('gearshare');
    const cameraButtons = ['card', 'details', 'recommended'].map(context => f.element(`camera:${context}`, { dataset: { kit: 'camera', name: 'Camera Kit' } }));
    const audio = f.element('audio', { dataset: { kit: 'audio', name: 'Audio Kit' } });
    const kits = [...cameraButtons, audio];
    f.groups.set('[data-kit]', kits);
    f.groups.set('[data-kit-card]', [f.element('camera-card', { dataset: { kitCard: 'camera' } }), f.element('audio-card', { dataset: { kitCard: 'audio' } })]);
    const details = f.element('#details-camera', { hidden: true });
    const disclosure = f.element('disclosure', { dataset: { details: 'camera' } });
    f.groups.set('[data-details]', [disclosure]);
    for (const field of ['borrower-name', 'project-name', 'notification-email', 'pickup-location', 'pickup-day', 'pickup-time']) f.get('#request-form').child(field, f.get(`#${field}`));
    f.run();
    f.get('#request-form').fire('submit');
    assert.match(f.get('#request-status').textContent, /save a borrower record/);
    f.get('#borrower-email').value = 'student@example.edu';
    f.get('#borrower-form').fire('submit');
    assert.equal(f.get('#borrower-form').hidden, true);
    assert.equal(f.get('#borrower-email').value, '');
    assert.equal(f.get('#notification-email').value, '');
    disclosure.fire('click');
    assert.equal(details.hidden, false);
    assert.equal(disclosure.attributes['aria-expanded'], 'true');
    disclosure.fire('click');
    assert.equal(details.hidden, true);
    cameraButtons[0].fire('click');
    assert.equal(f.get('#hold-time').textContent, '5:00');
    assert.equal(f.get('#summary-kit').textContent, 'Camera Kit');
    assert.equal(cameraButtons[2].attributes['aria-pressed'], 'true');
    f.advance(6500);
    assert.equal(f.get('#desk-update').textContent, 'Lighting kits returned after 3:00 PM may not be available same-day');
    cameraButtons[1].fire('click');
    assert.equal(f.get('#hold-time').textContent, '4:54');
    cameraButtons[2].fire('click');
    assert.equal(f.get('#hold-time').textContent, '4:54');
    audio.fire('click');
    assert.equal(f.get('#summary-kit').textContent, 'Audio Kit');
    assert.equal(cameraButtons[0].attributes['aria-pressed'], 'false');
    cameraButtons[0].fire('click');
    f.get('#pickup-location').value = 'Media Building';
    f.get('#pickup-location').fire('change');
    assert.equal(f.document.activeElement, f.get('#pickup-heading'));
    f.get('#change-location').fire('click');
    assert.equal(f.document.activeElement, f.get('#pickup-location'));
    f.get('#pickup-day').value = 'Thursday';
    f.get('#pickup-day').fire('change');
    f.get('#pickup-time').value = '2:00–2:15 PM';
    f.get('#pickup-time').fire('change');
    assert.equal(f.document.activeElement, f.get('#pickup-location'));
    f.get('#borrower-name').value = 'Sam Student';
    f.get('#project-name').value = 'DMD 3998 field shoot';
    f.get('#notification-email').value = 'student@example.edu';
    f.advance(294000);
    assert.equal(f.get('#hold-line').hidden, true);
    assert.equal(f.get('#summary-kit').textContent, 'Not selected');
    assert.match(f.get('#hold-status').textContent, /hold expired/);
    assert.equal(f.get('#borrower-name').value, 'Sam Student');
    assert.equal(f.get('#pickup-time').value, '2:00–2:15 PM');
    f.get('#request-form').fire('submit');
    assert.match(f.get('#request-status').textContent, /Add an equipment kit/);
    cameraButtons[2].fire('click');
    assert.equal(f.get('#hold-time').textContent, '5:00');
    f.get('#notification-email').value = 'other@example.edu';
    f.get('#request-form').fire('submit');
    assert.match(f.get('#notification-email').validationMessage, /same university email/);
    assert.equal(f.get('#notification-email').validityReported, true);
    f.get('#notification-email').value = 'student@example.edu';
    f.get('#notification-email').fire('input');
    f.get('#request-form').fire('submit');
    assert.equal(f.get('#confirmation').hidden, false);
    assert.match(f.get('#confirmation-summary').textContent, /Camera Kit requested for Thursday, 2:00–2:15 PM/);
    assert.equal(f.document.activeElement, f.get('#confirmation-title'));
    assert.equal(cameraButtons[0].disabled, true);
    f.get('#new-request').fire('click');
    assert.equal(f.get('#borrower-form').hidden, false);
    assert.equal(f.get('#request-form').hidden, false);
    assert.equal(f.get('#notification-email').value, '');
    assert.equal(f.document.activeElement, f.get('#borrower-email'));
});

test('equipment-desk updates advance identically and B can pause and resume', () => {
    const f = fixture('module06-motion');
    prepareMotionPage(f);
    f.run();
    f.advance(4000);
    assert.equal(f.get('#desk-announcement-a').textContent, 'Audio kits are available for Thursday pickup');
    assert.equal(f.get('#desk-announcement-b').textContent, 'Audio kits are available for Thursday pickup');
    f.get('#pause-updates').fire('click');
    assert.equal(f.get('#pause-updates').textContent, 'Resume updates');
    f.advance(4000);
    assert.equal(f.get('#desk-announcement-a').textContent, 'Studio B will close at 4:00 PM');
    assert.equal(f.get('#desk-announcement-b').textContent, 'Audio kits are available for Thursday pickup');
    f.get('#pause-updates').fire('click');
    f.advance(4000);
    assert.equal(f.get('#desk-announcement-b').textContent, 'Studio B will close at 4:00 PM');
    assert.equal(f.get('#pause-updates').textContent, 'Pause updates');
});

function prepareMotionPage(f) {
    for (const version of ['a', 'b']) {
        for (const id of ['desk-announcement', 'choose-pickup', 'hold', 'countdown', 'confirm-reservation', 'reservation-status', 'try-again', 'another-reservation', 'view-details', 'kit-details']) {
            f.element(`#${id}-${version}`, { hidden: ['hold', 'try-again', 'another-reservation', 'kit-details'].includes(id) });
        }
        f.get(`#hold-${version}`).child('confirm', f.get(`#confirm-reservation-${version}`));
    }
    f.get('#hold-b').child('extend', f.get('#add-time'));
}

test('reservation extension adds two minutes while the unadjustable hold expires', () => {
    const f = fixture('module06-motion');
    prepareMotionPage(f);
    f.run();
    f.get('#choose-pickup-a').fire('click');
    f.get('#choose-pickup-b').fire('click');
    assert.equal(f.get('#countdown-a').textContent, '0:30');
    assert.equal(f.get('#countdown-b').textContent, '0:30');
    f.advance(3000);
    f.get('#add-time').fire('click');
    assert.equal(f.get('#countdown-b').textContent, '2:27');
    for (let count = 0; count < 10; count++) f.get('#add-time').fire('click');
    assert.equal(f.get('#countdown-b').textContent, '22:27');
    f.get('#confirm-reservation-a').focus();
    f.advance(27000);
    assert.equal(f.get('#hold-a').hidden, true);
    assert.equal(f.get('#try-again-a').hidden, false);
    assert.equal(f.document.activeElement, f.get('#try-again-a'));
    assert.equal(f.get('#reservation-status-a').textContent, 'Your hold expired. Please select the pickup time again.');
    f.get('#try-again-a').fire('click');
    assert.equal(f.get('#choose-pickup-a').hidden, false);
    f.get('#choose-pickup-a').fire('click');
    assert.equal(f.get('#countdown-a').textContent, '0:30');
    f.get('#confirm-reservation-a').fire('click');
    f.get('#confirm-reservation-b').fire('click');
    assert.equal(f.get('#reservation-status-a').textContent, 'Reservation confirmed: Camera Kit, Thursday at 2:00 PM.');
    assert.equal(f.get('#reservation-status-b').textContent, 'Reservation confirmed: Camera Kit, Thursday at 2:00 PM.');
    f.advance(120000);
    assert.equal(f.get('#another-reservation-b').hidden, false);
    assert.match(f.get('#reservation-status-b').textContent, /Reservation confirmed/);
});

test('kit-detail controls open and close the same information in both versions', () => {
    const f = fixture('module06-motion');
    prepareMotionPage(f);
    f.run();
    for (const version of ['a', 'b']) {
        const button = f.get(`#view-details-${version}`);
        const panel = f.get(`#kit-details-${version}`);
        button.fire('click');
        assert.equal(panel.hidden, false);
        assert.equal(button.attributes['aria-expanded'], 'true');
        assert.equal(button.textContent, 'Hide kit details');
        button.fire('click');
        assert.equal(panel.hidden, true);
        assert.equal(button.attributes['aria-expanded'], 'false');
        assert.equal(button.textContent, 'View kit details');
    }
});

test('the spare-battery option works on pointer release but not native keyboard click activation', () => {
    const f = fixture('gearshare');
    f.run();
    const button = f.get('#extra-battery');
    button.fire('click');
    assert.equal(button.attributes['aria-pressed'], undefined);
    button.fire('pointerup');
    assert.equal(button.attributes['aria-pressed'], 'true');
    assert.equal(f.get('#battery-status').textContent, 'A spare battery is included in your request.');
    button.fire('click');
    assert.equal(button.attributes['aria-pressed'], 'true');
    button.fire('pointerup');
    assert.equal(button.attributes['aria-pressed'], 'false');
});
