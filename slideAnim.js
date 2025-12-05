// Simple toggle: clicking a `.sidebar-group-toggle` will add/remove `active` on the
// corresponding `.sidebar-sublist` and switch its display between `none` and `block`.
document.querySelectorAll('.sidebar-group-toggle').forEach((btn) => {
    const group = btn.closest('.sidebar-group') || btn.parentElement;
    const ul = group ? group.querySelector('.sidebar-sublist') : null;
    if (!ul) return;

    // ensure initial aria state
    if (!btn.hasAttribute('aria-expanded')) btn.setAttribute('aria-expanded', 'false');

    // preserve existing computed hidden state if present
    const computed = window.getComputedStyle(ul);
    if (computed.display === 'none' && !ul.style.display) {
        ul.style.display = 'none';
    }

    btn.addEventListener('click', (e) => {
        const isActive = ul.classList.toggle('active');
        ul.style.display = isActive ? 'block' : 'none';
        btn.setAttribute('aria-expanded', isActive ? 'true' : 'false');

        // toggle active state on the chevron inside the button so CSS can rotate it
        const chev = btn.querySelector('.chev');
        if (chev) {
            if (isActive) chev.classList.add('active'); else chev.classList.remove('active');
        }

        e.stopPropagation();
    });
});
