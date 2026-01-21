document.addEventListener("DOMContentLoaded", () => {

    const popup = document.getElementById("oznam-popup");
    const closeBtn = document.getElementById("popup-close");

    // Kliknutie na "Pridať oznam"
    const addBtn = document.querySelector(".sidebar-subitem-add");
    if (addBtn) {
        addBtn.addEventListener("click", () => {
            popup.style.display = "flex";
        });
    }

    // Zavrieť popup
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            popup.style.display = "none";
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {

    const editPopup = document.getElementById("oznam-edit-popup");
    const editCloseBtn = document.getElementById("popup-edit-close");

    // Po kliknutí na Upraviť
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", () => {

            document.getElementById("edit-id").value = btn.dataset.id;
            document.getElementById("edit-nadpis").value = btn.dataset.nadpis;
            document.getElementById("edit-datum").value = btn.dataset.datum;
            document.getElementById("edit-cas").value = btn.dataset.cas;
            document.getElementById("edit-kde").value = btn.dataset.kde;
            document.getElementById("edit-kolko").value = btn.dataset.kolko;
            document.getElementById("edit-popis").value = btn.dataset.popis;

            editPopup.style.display = "flex";
        });
    });

    // Zavrieť popup
    if (editCloseBtn) {
        editCloseBtn.addEventListener("click", () => {
            editPopup.style.display = "none";
        });
    }
});
