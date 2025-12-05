document.addEventListener("DOMContentLoaded", () => {

    const popup = document.getElementById("oznam-popup");
    const closeBtn = document.getElementById("popup-close");

    // Kliknutie na "Pridať oznam"
    document.querySelector(".sidebar-subitem-add").addEventListener("click", () => {
        popup.style.display = "flex";
    });

    // Zavrieť popup
    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", () => {

    const editPopup = document.getElementById("oznam-edit-popup");
    const editCloseBtn = document.getElementById("popup-edit-close");

    // Po kliknutí na Upraviť
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", () => {

            // naplnenie formulára dátami z tlačidla
            document.getElementById("edit-id").value = btn.dataset.id;
            document.getElementById("edit-nadpis").value = btn.dataset.nadpis;
            document.getElementById("edit-datum").value = btn.dataset.datum;
            document.getElementById("edit-cas").value = btn.dataset.cas;
            document.getElementById("edit-kde").value = btn.dataset.kde;
            document.getElementById("edit-kolko").value = btn.dataset.kolko;
            document.getElementById("edit-popis").value = btn.dataset.popis;
            document.getElementById("edit-autor").value = btn.dataset.autor;

            // zobraz popup
            editPopup.style.display = "flex";
        });
    });

    // Zavrieť popup
    editCloseBtn.addEventListener("click", () => {
        editPopup.style.display = "none";
    });

});