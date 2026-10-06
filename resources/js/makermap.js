const makerMap = document.querySelector('.makermap-page');

if (makerMap) {
	const filterChips = [...makerMap.querySelectorAll('[data-filter]')];
	const spaceCards = [...makerMap.querySelectorAll('[data-space-card]')];
	const filterNote = makerMap.querySelector('.maker-filter-note');
	const activeFilters = new Set();

	const updateSpaceFilters = () => {
		let visibleCount = 0;

		for (const card of spaceCards) {
			const capabilities = card.dataset.capabilities.split(' ');
			const matches = activeFilters.size === 0 || [...activeFilters].some((filter) => capabilities.includes(filter));

			card.hidden = !matches;
			visibleCount += Number(matches);
		}

		filterNote.textContent = activeFilters.size === 0
			? `Showing all ${visibleCount} creative spaces.`
			: `${visibleCount} ${visibleCount === 1 ? 'space matches' : 'spaces match'} your filters.`;
	};

	for (const chip of filterChips) {
		chip.addEventListener('click', () => {
			const { filter } = chip.dataset;

			if (activeFilters.has(filter)) {
				activeFilters.delete(filter);
				chip.classList.remove('is-active');
				chip.setAttribute('aria-pressed', 'false');
			} else {
				activeFilters.add(filter);
				chip.classList.add('is-active');
				chip.setAttribute('aria-pressed', 'true');
			}

			updateSpaceFilters();
		});
	}

	for (const button of makerMap.querySelectorAll('[data-save-space]')) {
		button.addEventListener('click', () => {
			button.setAttribute('aria-pressed', String(button.getAttribute('aria-pressed') !== 'true'));
		});
	}

	for (const button of makerMap.querySelectorAll('[data-disclosure]')) {
		button.addEventListener('click', () => {
			const panel = makerMap.querySelector(`#${button.dataset.disclosure}`);
			const isOpening = panel.hidden;

			panel.hidden = !isOpening;
			button.classList.toggle('is-open', isOpening);
		});
	}

	const form = makerMap.querySelector('#orientation-form');
	const errorSummary = makerMap.querySelector('#form-error-summary');
	const errorList = makerMap.querySelector('#form-error-list');
	const successMessage = makerMap.querySelector('#form-success');
	const fieldRules = [
		{
			control: makerMap.querySelector('#full-name'),
			container: makerMap.querySelector('#full-name').closest('.maker-field'),
			error: makerMap.querySelector('#full-name-error'),
			message: 'Enter your full name.',
			invalid: (formData, control) => !String(formData.get('fullName') || '').trim() || !control.validity.valid,
		},
		{
			control: makerMap.querySelector('#university-email'),
			container: makerMap.querySelector('#university-email').closest('.maker-field'),
			error: makerMap.querySelector('#university-email-error'),
			message: 'Enter a valid university email address.',
			invalid: (formData, control) => !String(formData.get('email') || '').trim() || !control.validity.valid,
		},
		{
			control: makerMap.querySelector('#experience-new'),
			controls: [...makerMap.querySelectorAll('input[name="experienceLevel"]')],
			container: makerMap.querySelector('#experience-group'),
			error: makerMap.querySelector('#experience-error'),
			message: 'Choose your experience level.',
			invalid: (formData) => !formData.get('experienceLevel'),
		},
		{
			control: makerMap.querySelector('#orientation-time'),
			container: makerMap.querySelector('#orientation-time').closest('.maker-field'),
			error: makerMap.querySelector('#orientation-time-error'),
			message: 'Select a preferred orientation time.',
			invalid: (formData) => !formData.get('orientationTime'),
		},
	];
	const preferredSpaceGroup = makerMap.querySelector('#preferred-space-group');
	const preferredSpaceInputs = [...preferredSpaceGroup.querySelectorAll('input[name="preferredSpace"]')];

	const updateErrorSummary = () => {
		if (errorList.children.length === 0 && !preferredSpaceGroup.classList.contains('has-error')) {
			errorSummary.hidden = true;
		}
	};

	const clearErrors = () => {
		for (const rule of fieldRules) {
			rule.container.classList.remove('has-error');
			for (const control of rule.controls ?? [rule.control]) {
				control.setAttribute('aria-invalid', 'false');
			}
			rule.error.hidden = true;
		}

		preferredSpaceGroup.classList.remove('has-error');
		preferredSpaceGroup.querySelector('#preferred-space-error').hidden = true;
		errorSummary.hidden = true;
		errorList.replaceChildren();
	};

	const clearFieldError = (rule) => {
		if (rule.invalid(new FormData(form), rule.control)) {
			return;
		}

		rule.container.classList.remove('has-error');
		for (const control of rule.controls ?? [rule.control]) {
			control.setAttribute('aria-invalid', 'false');
		}
		rule.error.hidden = true;

		for (const item of errorList.querySelectorAll('li')) {
			if (item.querySelector('a')?.getAttribute('href') === `#${rule.control.id}`) {
				item.remove();
			}
		}

		updateErrorSummary();
	};

	form.addEventListener('submit', (event) => {
		event.preventDefault();
		clearErrors();
		successMessage.hidden = true;

		const formData = new FormData(form);
		const errors = [];

		for (const rule of fieldRules) {
			if (rule.invalid(formData, rule.control)) {
				rule.container.classList.add('has-error');
				for (const control of rule.controls ?? [rule.control]) {
					control.setAttribute('aria-invalid', 'true');
				}
				rule.error.hidden = false;
				errors.push({ control: rule.control, message: rule.message });
			}
		}

		if (!formData.get('preferredSpace')) {
			preferredSpaceGroup.classList.add('has-error');
			errors.push({ control: preferredSpaceInputs[0], message: null });
		}

		if (errors.length > 0) {
			for (const error of errors) {
				if (error.message) {
					const item = document.createElement('li');
					const link = document.createElement('a');
					link.href = `#${error.control.id}`;
					link.textContent = error.message;
					item.append(link);
					errorList.append(item);
				}
			}

			errorSummary.hidden = false;
			errorSummary.focus();
			return;
		}

		successMessage.hidden = false;
		successMessage.scrollIntoView({ block: 'nearest' });
	});

	for (const rule of fieldRules) {
		for (const control of rule.controls ?? [rule.control]) {
			const eventName = control.type === 'radio' || control.tagName === 'SELECT' ? 'change' : 'input';

			control.addEventListener(eventName, () => clearFieldError(rule));
		}
	}

	for (const input of preferredSpaceInputs) {
		input.addEventListener('change', () => {
			preferredSpaceGroup.classList.remove('has-error');
			updateErrorSummary();
		});
	}

	makerMap.querySelector('#reset-maker-map').addEventListener('click', () => {
		form.reset();
		clearErrors();
		successMessage.hidden = true;
		activeFilters.clear();

		for (const chip of filterChips) {
			chip.classList.remove('is-active');
			chip.setAttribute('aria-pressed', 'false');
		}

		for (const button of makerMap.querySelectorAll('[data-save-space]')) {
			button.setAttribute('aria-pressed', 'false');
		}

		for (const button of makerMap.querySelectorAll('[data-disclosure]')) {
			makerMap.querySelector(`#${button.dataset.disclosure}`).hidden = true;
			button.classList.remove('is-open');
		}

		updateSpaceFilters();
	});
}