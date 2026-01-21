document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("oznam-popup");
    const closeBtn = document.getElementById("popup-close");

    if (!popup) return;

    document.addEventListener("click", (e) => {
        const openBtn =
            e.target.closest?.("#add-oznam-btn") ||
            e.target.closest?.(".btn-add-oznam") ||
            e.target.closest?.(".sidebar-subitem-add");

        if (!openBtn) return;

        e.preventDefault();
        e.stopPropagation();
        popup.style.display = "flex";
    });

    // Zavrieť popup
    if (closeBtn) {
        closeBtn.addEventListener("click", (e) => {
            e.preventDefault();
            popup.style.display = "none";
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const editPopup = document.getElementById("oznam-edit-popup");
    const editCloseBtn = document.getElementById("popup-edit-close");

    if (!editPopup) return;

    document.addEventListener("click", (e) => {
        const btn = e.target.closest?.(".edit-btn");
        if (!btn) return;

        e.preventDefault();
        e.stopPropagation();

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

    if (editCloseBtn) {
        editCloseBtn.addEventListener("click", (e) => {
            e.preventDefault();
            editPopup.style.display = "none";
        });
    }
});
