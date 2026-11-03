const guided = document.body.classList.contains('cp-guided');
let searchController;
let searchTimer;
const filters = document.querySelector('[data-catalog-filters]');
const toast = (message) => {
    const element = document.querySelector('[data-toast]');
    element.textContent = message;
    element.hidden = false;
};
const updateCount = (count) => { for (const badge of document.querySelectorAll('[data-plan-count]')) badge.textContent = count; };
if (filters) {
    const search = async () => {
        searchController?.abort();
        searchController = new AbortController();
        const url = new URL(filters.action);
        url.search = new URLSearchParams(new FormData(filters)).toString();
        try {
            const response = await fetch(url, { headers: { Accept: 'application/json' }, signal: searchController.signal });
            if (response.redirected) { location.assign(response.url); return; }
            if (!response.ok) throw new Error('Search could not be updated. Use Search Courses to try again.');
            document.querySelector('[data-catalog-results]').innerHTML = await response.text();
            history.replaceState(null, '', url);
            const status = document.querySelector('[data-catalog-status]');
            if (status) status.textContent = document.querySelector('[data-result-count]').textContent;
        } catch (error) { if (error.name !== 'AbortError') toast(error.message); }
    };
    filters.addEventListener('input', (event) => {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(search, event.target.type === 'search' || event.target.name === 'q' ? 300 : 0);
    });
    filters.addEventListener('submit', (event) => { event.preventDefault(); clearTimeout(searchTimer); search(); });
}

for (const choice of document.querySelectorAll('[data-section-choice]')) {
    const field = choice.closest('form').querySelector('[name=section]');
    choice.classList.toggle('is-selected', choice.dataset.sectionChoice === field.value);
    choice.addEventListener('click', () => {
        field.value = choice.dataset.sectionChoice;
        for (const sibling of choice.parentElement.querySelectorAll('[data-section-choice]')) sibling.classList.toggle('is-selected', sibling === choice);
    });
}

for (const prerequisite of document.querySelectorAll('[data-prerequisite-tooltip]')) {
    prerequisite.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            event.preventDefault();
            prerequisite.classList.add('is-dismissed');
        }
    });
    prerequisite.addEventListener('pointerenter', () => prerequisite.classList.remove('is-dismissed'));
    prerequisite.addEventListener('pointerleave', () => prerequisite.classList.remove('is-dismissed'));
    prerequisite.addEventListener('focusin', () => prerequisite.classList.remove('is-dismissed'));
    prerequisite.addEventListener('focusout', event => {
        if (!prerequisite.contains(event.relatedTarget)) prerequisite.classList.remove('is-dismissed');
    });
}

document.addEventListener('submit', async (event) => {
    const form = event.target;
    if (!form.matches('[data-add-course], [data-remove-course]')) return;
    event.preventDefault();
    const button = form.querySelector('button[type=submit]');
    button.disabled = true;
    try {
        const response = await fetch(form.action, { method: 'POST', body: new FormData(form), headers: { Accept: 'application/json' } });
        if (response.redirected) { location.assign(response.url); return; }
        const result = await response.json();
        if (!response.ok) throw new Error(result.message || 'This change could not be saved. Try again.');
        updateCount(result.count);
        if (result.html) {
            document.querySelector('[data-plan-region]').outerHTML = result.html;
            if (guided) document.querySelector('#plan-title').focus();
        } else {
            const checklist = document.querySelector('[data-requirements-checklist]');
            const removeAction = document.querySelector('[data-course-remove-action]');
            if (checklist && result.checklist) checklist.outerHTML = result.checklist;
            if (removeAction && result.removeAction !== undefined) removeAction.innerHTML = result.removeAction;
            const feedback = form.querySelector('[data-add-message]');
            if (feedback) feedback.textContent = result.message;
            button.textContent = 'Update Section';
        }
        toast(result.message || 'Course removed from schedule.');
    } catch (error) { toast(error.message); }
    finally { if (button.isConnected) button.disabled = false; }
});

const modal = document.querySelector('[data-help-modal]');
if (modal) {
    let opener;
    const close = () => { modal.hidden = true; if (guided) opener?.focus(); };
    document.querySelector('[data-help-open]').addEventListener('click', (event) => {
        opener = event.currentTarget;
        modal.hidden = false;
        if (guided) modal.querySelector('h2').focus();
    });
    modal.querySelector('[data-help-close]').addEventListener('click', close);
    modal.addEventListener('click', event => { if (event.target === modal) close(); });
    document.addEventListener('keydown', event => {
        if (modal.hidden) return;
        if (event.key === 'Escape') close();
        if (guided && event.key === 'Tab') {
            const controls = [...modal.querySelectorAll('button, a[href], input, [tabindex="0"]')];
            const first = controls[0];
            const last = controls.at(-1);
            if (event.shiftKey && (document.activeElement === first || document.activeElement === modal.querySelector('h2'))) { event.preventDefault(); last.focus(); }
            else if (!event.shiftKey && (document.activeElement === last || document.activeElement === modal.querySelector('h2'))) { event.preventDefault(); first.focus(); }
        }
    });
}
const sample = document.querySelector('[data-use-sample]');
if (sample) sample.addEventListener('click', () => {
    const form = document.querySelector('[data-student-form]');
    for (const [name, value] of Object.entries({ name: 'Avery North', email: 'avery@example.test', year: 'Second year', major: 'Exploratory Studies', explanation: 'These courses balance my interests with the advising requirements and leave time for independent study.' })) form.elements[name].value = value;
    form.elements.acknowledge.checked = true;
    if (guided) form.elements.name.focus();
});
