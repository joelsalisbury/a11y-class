export function initSessionPresentation(root, browser = window) {
    const slides = [...root.querySelectorAll('[data-session-slide]')];
    if (!slides.length) return;
    const deck = root.querySelector('[data-presentation-deck]');
    const review = root.querySelector('[data-session-review]');
    const previous = root.querySelector('[data-slide-previous]');
    const next = root.querySelector('[data-slide-next]');
    const viewAll = root.querySelector('[data-view-all]');
    const present = root.querySelector('[data-present]');
    const progress = root.querySelector('[data-slide-progress]');
    const announcement = root.querySelector('[data-slide-announcement]');
    let current = 0;

    function render(index, all = false, focusHeading = false) {
        current = Math.max(0, Math.min(slides.length - 1, index));
        deck.hidden = all;
        review.hidden = !all;
        viewAll.hidden = all;
        present.hidden = !all;
        slides.forEach((slide, position) => { slide.hidden = all || position !== current; });
        previous.disabled = current === 0;
        next.disabled = current === slides.length - 1;
        progress.textContent = `${current + 1} of ${slides.length}`;
        const heading = slides[current].querySelector('h2');
        announcement.textContent = all ? '' : `Slide ${current + 1} of ${slides.length}: ${heading.textContent}`;
        if (!all && (focusHeading || (previous.disabled && browser.document.activeElement === previous) || (next.disabled && browser.document.activeElement === next))) heading.focus();
    }

    function navigate(index, focusHeading = false) {
        render(index, false, focusHeading);
        const hash = `#slide-${current + 1}`;
        if (browser.location.hash !== hash) browser.history.pushState(null, '', hash);
    }

    function syncHash() {
        const hash = browser.location.hash;
        const match = /^#slide-(\d+)$/.exec(hash);
        const target = browser.document.getElementById(hash.slice(1));
        if (match) {
            render(Number(match[1]) - 1);
            if (hash !== `#slide-${current + 1}`) browser.history.replaceState(null, '', `#slide-${current + 1}`);
        } else if (hash === '#view-all' || (target && review.contains(target))) {
            render(current, true);
            if (target) browser.requestAnimationFrame(() => target.scrollIntoView());
        } else if (!hash) {
            render(0);
            browser.history.replaceState(null, '', '#slide-1');
        }
    }

    previous.addEventListener('click', () => navigate(current - 1));
    next.addEventListener('click', () => navigate(current + 1));
    viewAll.addEventListener('click', () => {
        render(current, true);
        browser.history.pushState(null, '', '#view-all');
        present.focus();
    });
    present.addEventListener('click', () => {
        navigate(current);
        viewAll.focus();
    });
    browser.addEventListener('hashchange', syncHash);
    browser.addEventListener('keydown', event => {
        if (deck.hidden || event.defaultPrevented || event.altKey || event.ctrlKey || event.metaKey || event.shiftKey || event.target.closest('a, button, input, textarea, select, summary, [contenteditable], [role="slider"], [role="listbox"], [role="tab"]')) return;
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
        event.preventDefault();
        navigate(current + (event.key === 'ArrowRight' ? 1 : -1), true);
    });
    root.querySelector('[data-presentation-controls]').hidden = false;
    render(0);
    syncHash();
}
