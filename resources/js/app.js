import { initSessionPresentation } from './session-presentation';
import { initCognitiveLoadDemo } from './cognitive-load-demo';

for (const presentation of document.querySelectorAll('[data-session-presentation]')) {
    initSessionPresentation(presentation);
}

for (const demo of document.querySelectorAll('[data-cognitive-load-demo]')) {
    initCognitiveLoadDemo(demo);
}

const moduleNavLinks = Array.from(document.querySelectorAll('[data-module-nav-link]'));
const defaultModuleNavLinks = new Set(moduleNavLinks.filter(link => link.hasAttribute('aria-current')));

if (moduleNavLinks.length > 0) {
    const updateModuleNavigation = () => {
        const currentUrl = new URL(window.location.href);
        const fragmentLinks = moduleNavLinks.filter(link => {
            const target = new URL(link.getAttribute('href'), currentUrl);

            return target.pathname === currentUrl.pathname && target.hash !== '' && target.hash === currentUrl.hash;
        });
        const activeLinks = fragmentLinks.length > 0 ? new Set(fragmentLinks) : defaultModuleNavLinks;

        for (const link of moduleNavLinks) {
            const active = activeLinks.has(link);
            link.classList.toggle('is-active', active);
            link.querySelector('.module-nav-current-mark').hidden = !active;

            if (active) {
                link.setAttribute('aria-current', fragmentLinks.length > 0 ? 'location' : 'page');
            } else {
                link.removeAttribute('aria-current');
            }
        }
    };

    updateModuleNavigation();
    window.addEventListener('hashchange', updateModuleNavigation);
}

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

		if (!linksById.has(id)) {
			linksById.set(id, []);
		}

		linksById.get(id).push(link);
	}

	const setActiveSection = (id) => {
		for (const [sectionId, links] of linksById.entries()) {
			const isActive = sectionId === id;

			for (const link of links) {
				link.classList.toggle('is-active', isActive);

				if (isActive) {
					link.setAttribute('aria-current', 'location');
				} else {
					link.removeAttribute('aria-current');
				}
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
