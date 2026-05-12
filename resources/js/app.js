import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.openSearch = function () {
    const overlay = document.getElementById('search-overlay');

    overlay.classList.remove('opacity-0', 'pointer-events-none');
    overlay.classList.add('opacity-100');

    setTimeout(() => {
        document.getElementById('search-input')?.focus();
    }, 100);
};

window.closeSearch = function () {
    const overlay = document.getElementById('search-overlay');

    overlay.classList.add('opacity-0', 'pointer-events-none');
    overlay.classList.remove('opacity-100');
};

window.toggleWideMenu = function () {
    const menu = document.getElementById('wide-menu');

    menu.classList.toggle('-translate-y-full');
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('pointer-events-none');
    menu.classList.toggle('translate-y-0');
    menu.classList.toggle('opacity-100');
};

window.toggleMobileMenu = function () {
    const menu = document.getElementById('mobile-menu');

    menu.classList.toggle('-translate-y-full');
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('pointer-events-none');
    menu.classList.toggle('translate-y-0');
    menu.classList.toggle('opacity-100');
};

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {

        closeSearch();

        const wide = document.getElementById('wide-menu');
        const mobile = document.getElementById('mobile-menu');

        [wide, mobile].forEach((m) => {

            if (!m) return;

            m.classList.add(
                '-translate-y-full',
                'opacity-0',
                'pointer-events-none'
            );

            m.classList.remove(
                'translate-y-0',
                'opacity-100'
            );
        });
    }
});
