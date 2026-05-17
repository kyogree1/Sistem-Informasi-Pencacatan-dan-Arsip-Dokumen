import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

const themeKey = 'sipda-theme';

const applyTheme = (theme) => {
	if (theme === 'dark') {
		document.documentElement.classList.add('dark');
	} else {
		document.documentElement.classList.remove('dark');
	}
};

const getPreferredTheme = () => {
	const stored = localStorage.getItem(themeKey);
	if (stored) {
		return stored;
	}

	return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
};

window.toggleSipdaTheme = () => {
	const next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
	localStorage.setItem(themeKey, next);
	applyTheme(next);
};

applyTheme(getPreferredTheme());

Alpine.start();
