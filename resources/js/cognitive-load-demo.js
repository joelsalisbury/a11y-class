const taskRequirements = {
    project: 'documentary',
    crew: '3',
    kit: 'camera',
    tripod: true,
    day: 'thursday',
    period: 'morning',
    return: 'next-day',
};

const fieldLabels = {
    project: 'Project type',
    crew: 'Crew size',
    kit: 'Equipment kit',
    tripod: 'Tripod',
    day: 'Pickup day',
    period: 'Pickup time',
    return: 'Return',
};

const fieldValues = {
    project: { documentary: 'Documentary', interview: 'Interview', performance: 'Performance' },
    crew: { 1: '1 person', 2: '2 people', 3: '3 people', 4: '4 people' },
    kit: { camera: 'Camera Kit', audio: 'Audio Kit', lighting: 'Lighting Kit' },
    day: { thursday: 'Thursday', friday: 'Friday' },
    period: { morning: 'Morning', afternoon: 'Afternoon' },
    return: { 'next-day': 'The next day', 'two-days': 'In two days' },
};

const editGroups = [
    { step: 0, fields: ['project', 'crew'], label: 'Edit project and crew' },
    { step: 1, fields: ['kit', 'tripod'], label: 'Edit equipment and accessories' },
    { step: 2, fields: ['day', 'period', 'return'], label: 'Edit pickup and return' },
];

function displayValue(field, value) {
    if (field === 'tripod') {
        return value ? 'Included' : 'Not included';
    }

    return fieldValues[field][value] ?? 'Not selected';
}

export function initCognitiveLoadDemo(root) {
    const screen = name => root.querySelector(`[data-screen="${name}"]`);
    const form = version => root.querySelector(`[data-reservation-form="${version}"]`);
    const field = (version, name) => form(version).querySelector(`[data-field="${name}"]`);
    let interruptionShown = false;

    function currentValues(version) {
        return Object.fromEntries(Object.keys(taskRequirements).map(name => {
            const control = field(version, name);
            return [name, name === 'tripod' ? control.checked : control.value];
        }));
    }

    function renderSummary(version, target) {
        const values = currentValues(version);
        target.replaceChildren();

        for (const [name, label] of Object.entries(fieldLabels)) {
            const term = document.createElement('dt');
            const description = document.createElement('dd');
            term.textContent = label;
            description.textContent = displayValue(name, values[name]);
            target.append(term, description);
        }
    }

    function showScreen(name, focusSelector) {
        for (const item of root.querySelectorAll('[data-screen]')) {
            item.hidden = item !== screen(name);
        }

        root.querySelector(focusSelector)?.focus();
    }

    function showStep(version, step) {
        const steps = form(version).querySelectorAll('[data-step]');

        for (const item of steps) {
            item.hidden = Number(item.dataset.step) !== step;
        }

        if (version === 'low') {
            for (const [index, item] of root.querySelectorAll('[data-progress="low"] li').entries()) {
                if (index === step) {
                    item.setAttribute('aria-current', 'step');
                } else {
                    item.removeAttribute('aria-current');
                }
            }

            updateLiveSummary();
        }

        form(version).querySelector(`[data-step="${step}"] h3`)?.focus();
    }

    function updateLiveSummary() {
        const values = currentValues('low');
        const selected = Object.keys(taskRequirements)
            .filter(name => name === 'tripod' ? values[name] : values[name] !== '')
            .map(name => `${fieldLabels[name]}: ${displayValue(name, values[name])}`);

        root.querySelector('[data-live-summary]').textContent = selected.length
            ? `Selected so far: ${selected.join('; ')}.`
            : 'No reservation choices selected yet.';
    }

    function showError(version, mismatches) {
        const feedback = root.querySelector(`[data-feedback="${version}"]`);
        feedback.hidden = false;

        if (version === 'high') {
            feedback.focus();
            return;
        }

        const list = feedback.querySelector('[data-error-list]');
        list.replaceChildren();

        for (const group of editGroups) {
            const groupMismatches = group.fields.filter(name => mismatches.includes(name));
            if (groupMismatches.length === 0) {
                continue;
            }

            const item = document.createElement('li');
            item.textContent = groupMismatches
                .map(name => `${fieldLabels[name]}: choose ${name === 'tripod' ? 'to include a tripod' : displayValue(name, taskRequirements[name])}`)
                .join('; ');

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'secondary';
            button.dataset.action = 'low-edit';
            button.dataset.targetStep = String(group.step);
            button.textContent = group.label;
            item.append(' ', button);
            list.append(item);
        }

        feedback.focus();
    }

    function mismatches(version) {
        const values = currentValues(version);
        return Object.keys(taskRequirements).filter(name => values[name] !== taskRequirements[name]);
    }

    function restart() {
        for (const version of ['high', 'low']) {
            form(version).reset();
            form(version).querySelectorAll('[data-step]').forEach((item, index) => {
                item.hidden = index !== 0;
            });
        }

        root.querySelector('[data-high-interruption]').hidden = true;
        root.querySelector('[data-feedback="high"]').hidden = true;
        root.querySelector('[data-feedback="low"]').hidden = true;
        interruptionShown = false;
        updateLiveSummary();
        showScreen('brief', '#demo-task-title');
    }

    root.addEventListener('click', event => {
        const button = event.target.closest('[data-action]');
        if (!button || !root.contains(button)) {
            return;
        }

        const action = button.dataset.action;

        if (action === 'start-high') {
            showScreen('high', '#high-title');
            showStep('high', 0);
        } else if (action === 'high-next') {
            const currentStep = Number(button.closest('[data-step]').dataset.step);
            if (currentStep === 1 && !interruptionShown) {
                form('high').querySelector('[data-step="1"]').hidden = true;
                const interruption = root.querySelector('[data-high-interruption]');
                interruption.hidden = false;
                interruption.querySelector('h3').focus();
                interruptionShown = true;
            } else {
                showStep('high', currentStep + 1);
            }
        } else if (action === 'high-resume') {
            root.querySelector('[data-high-interruption]').hidden = true;
            showStep('high', 2);
        } else if (action === 'high-back') {
            const currentStep = Number(button.closest('[data-step]').dataset.step);
            showStep('high', Math.max(0, currentStep - 1));
        } else if (action === 'high-review') {
            renderSummary('high', root.querySelector('[data-summary="high"]'));
            showStep('high', 3);
        } else if (action === 'high-edit') {
            showStep('high', Number(button.dataset.targetStep));
        } else if (action === 'high-submit') {
            const errors = mismatches('high');
            if (errors.length > 0) {
                showError('high', errors);
            } else {
                renderSummary('high', root.querySelector('[data-summary="high-complete"]'));
                showScreen('high-complete', '#high-complete-title');
            }
        } else if (action === 'high-correct') {
            root.querySelector('[data-feedback="high"]').hidden = true;
            showStep('high', 0);
        } else if (action === 'start-low') {
            showScreen('low', '#low-title');
            showStep('low', 0);
        } else if (action === 'low-next') {
            const currentStep = Number(button.closest('[data-step]').dataset.step);
            showStep('low', currentStep + 1);
        } else if (action === 'low-back') {
            const currentStep = Number(button.closest('[data-step]').dataset.step);
            showStep('low', Math.max(0, currentStep - 1));
        } else if (action === 'low-review') {
            renderSummary('low', root.querySelector('[data-summary="low"]'));
            showStep('low', 3);
        } else if (action === 'low-edit') {
            root.querySelector('[data-feedback="low"]').hidden = true;
            showStep('low', Number(button.dataset.targetStep));
        } else if (action === 'low-submit') {
            const errors = mismatches('low');
            if (errors.length > 0) {
                showError('low', errors);
            } else {
                renderSummary('low', root.querySelector('[data-summary="low-complete"]'));
                showScreen('low-complete', '#low-complete-title');
            }
        } else if (action === 'restart') {
            restart();
        }
    });

    form('low').addEventListener('change', updateLiveSummary);
}
