(function () {
	'use strict';

	const toggle = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.primary-navigation');

	if (!toggle || !navigation) {
		return;
	}

	const closeMenu = function () {
		toggle.setAttribute('aria-expanded', 'false');
		navigation.classList.remove('is-open');
	};

	toggle.addEventListener('click', function () {
		const open = toggle.getAttribute('aria-expanded') === 'true';
		toggle.setAttribute('aria-expanded', String(!open));
		navigation.classList.toggle('is-open', !open);
	});

	navigation.addEventListener('click', function (event) {
		if (event.target.closest('a')) {
			closeMenu();
		}
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeMenu();
			toggle.focus();
		}
	});

	window.addEventListener('resize', function () {
		if (window.matchMedia('(min-width: 1121px)').matches) {
			closeMenu();
		}
	});
})();

