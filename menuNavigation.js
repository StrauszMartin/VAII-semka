document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.getElementById("overlay");

    if (!menuToggle || !sidebar || !overlay) return;

    function toggleMenu() {
        sidebar.classList.toggle("open");
        overlay.classList.toggle("active");
        menuToggle.classList.toggle("open");  // ← prepína burger <-> X
    }

    menuToggle.addEventListener("click", toggleMenu);
    overlay.addEventListener("click", toggleMenu);
});
