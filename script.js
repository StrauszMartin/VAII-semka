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
