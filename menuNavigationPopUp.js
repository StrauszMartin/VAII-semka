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

    if (!editPopup) return;

    // Delegovaný handler (funguje aj keď sa tlačidlá vyrenderujú neskôr alebo sa menia)
    document.addEventListener("click", (e) => {
        const btn = e.target.closest?.(".edit-btn");
        if (!btn) return;

        const byId = (id) => document.getElementById(id);

        byId("edit-id").value = btn.dataset.id || "";
        byId("edit-nadpis").value = btn.dataset.nadpis || "";
        byId("edit-datum").value = btn.dataset.datum || "";
        byId("edit-cas").value = btn.dataset.cas || "";
        byId("edit-kde").value = btn.dataset.kde || "";
        byId("edit-kolko").value = btn.dataset.kolko || "";
        byId("edit-popis").value = btn.dataset.popis || "";

        editPopup.style.display = "flex";
    });

    // Zavrieť popup
    if (editCloseBtn) {
        editCloseBtn.addEventListener("click", () => {
            editPopup.style.display = "none";
        });
    }
});