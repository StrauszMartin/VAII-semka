// mobilnƒý sidebar: hamburger prepƒðnaƒõ a overlay
const bodyEl = document.body;
const menuToggleBtn = document.querySelector('.menu-toggle');
const sidebarEl = document.querySelector('.sidebar');
const sidebarOverlay = document.querySelector('.sidebar-overlay');

const closeSidebar = () => bodyEl.classList.remove('sidebar-open');
const toggleSidebar = () => bodyEl.classList.toggle('sidebar-open');

if (menuToggleBtn && sidebarEl) {
    menuToggleBtn.addEventListener('click', toggleSidebar);
}

if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', closeSidebar);
}

document.querySelectorAll('.sidebar button').forEach((btn) => {
    btn.addEventListener('click', () => {
        if (window.innerWidth <= 900) {
            closeSidebar();
        }
    });
});

// jednoduchý accordion pre Individuálne lekcie a Skupiny
document.querySelectorAll('.accordion-toggle').forEach((btn) => {
    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        const content = btn.nextElementSibling;
        content.classList.toggle('open');
    });
});

// príprava na prepínanie view podľa sidebaru
// (momentálne iba konzola – môžeš neskôr napojiť na filter oznamov / redirect)
document.querySelectorAll('[data-view]').forEach((el) => {
    el.addEventListener('click', () => {
        const view = el.getAttribute('data-view');
        console.log('prepni na view:', view);
        // sem neskôr: filtrovanie oznamov, načítanie inej podstránky, atď.
    });
});

// príklad: klik na "Pridať oznam" – neskôr formulár, ktorý môžu používať iba tréneri
const addAnnouncementBtn = document.querySelector('.main-header__add-announcement');
if (addAnnouncementBtn) {
    addAnnouncementBtn.addEventListener('click', () => {
        // v produkcii: kontrola role trénera, otvorenie modalu/formulára
        alert('Tu bude formulár na pridanie oznamu (len pre trénerov).');
    });
}
