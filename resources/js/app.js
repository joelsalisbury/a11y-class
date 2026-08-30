const sessionNavLinks = Array.from(document.querySelectorAll('[data-session-nav-link]'));

if (sessionNavLinks.length > 0 && 'IntersectionObserver' in window) {
	const linksById = new Map();
	const visibleSections = new Map();
	const sectionElements = [];

	for (const link of sessionNavLinks) {
		const href = link.getAttribute('href') || '';
		const id = href.startsWith('#') ? href.slice(1) : null;

		if (!id) {
			continue;
		}

		linksById.set(id, link);
	}

	const setActiveSection = (id) => {
		for (const [sectionId, link] of linksById.entries()) {
			const isActive = sectionId === id;
			link.classList.toggle('is-active', isActive);

			if (isActive) {
				link.setAttribute('aria-current', 'location');
			} else {
				link.removeAttribute('aria-current');
			}
		}
	};

	const observer = new IntersectionObserver(
		(entries) => {
			for (const entry of entries) {
				const id = entry.target.id;

				if (entry.isIntersecting) {
					visibleSections.set(id, entry.boundingClientRect.top);
				} else {
					visibleSections.delete(id);
				}
			}

			if (visibleSections.size === 0) {
				return;
			}

			const closest = Array.from(visibleSections.entries())
				.sort((a, b) => Math.abs(a[1]) - Math.abs(b[1]))[0];

			if (closest) {
				setActiveSection(closest[0]);
			}
		},
		{
			rootMargin: '-28% 0px -58% 0px',
			threshold: [0.15, 0.4, 0.65],
		}
	);

	for (const id of linksById.keys()) {
		const section = document.getElementById(id);

		if (section) {
			sectionElements.push(section);
			observer.observe(section);
		}
	}

	const updateFromPosition = () => {
		if (visibleSections.size > 0) {
			return;
		}

		const viewportOffset = window.innerHeight * 0.34;
		let closestId = null;
		let closestDistance = Number.POSITIVE_INFINITY;

		for (const section of sectionElements) {
			const distance = Math.abs(section.getBoundingClientRect().top - viewportOffset);

			if (distance < closestDistance) {
				closestDistance = distance;
				closestId = section.id;
			}
		}

		if (closestId) {
			setActiveSection(closestId);
		}
	};

	const updateFromHash = () => {
		const id = window.location.hash.replace('#', '');

		if (id && linksById.has(id)) {
			setActiveSection(id);
		}
	};

	updateFromHash();
	updateFromPosition();
	window.addEventListener('hashchange', updateFromHash);
	window.addEventListener('scroll', updateFromPosition, { passive: true });
}
