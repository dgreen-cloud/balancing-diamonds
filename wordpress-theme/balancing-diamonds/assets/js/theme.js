(function () {
	'use strict';

	const root = document.documentElement;
	const toggle = document.querySelector('.mode-toggle');
	const storageKey = 'balancing-diamonds-theme';
	const storedTheme = window.localStorage.getItem(storageKey);

	if (storedTheme === 'night') {
		root.dataset.theme = 'night';
	}

	if (!toggle) {
		return;
	}

	const syncToggle = function () {
		const night = root.dataset.theme === 'night';
		toggle.setAttribute('aria-pressed', String(night));
		toggle.setAttribute('aria-label', night ? 'Use Parchment Maison mode' : 'Use Night Library mode');
	};

	syncToggle();

	toggle.addEventListener('click', function () {
		const nextTheme = root.dataset.theme === 'night' ? 'parchment' : 'night';
		if (nextTheme === 'night') {
			root.dataset.theme = 'night';
		} else {
			delete root.dataset.theme;
		}
		window.localStorage.setItem(storageKey, nextTheme);
		syncToggle();
	});
})();

