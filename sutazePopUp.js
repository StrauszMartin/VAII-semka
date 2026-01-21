document.addEventListener("DOMContentLoaded", () => {
  const addBtn = document.getElementById("openAddSutazPopup");
  const addPopup = document.getElementById("sutaz-popup");
  const addClose = document.getElementById("sutaz-popup-close");

  const editPopup = document.getElementById("sutaz-edit-popup");
  const editClose = document.getElementById("sutaz-edit-close");

  const editId = document.getElementById("edit-sutaz-id");
  const editNazov = document.getElementById("edit-sutaz-nazov");
  const editMesto = document.getElementById("edit-sutaz-mesto");
  const editAdresa = document.getElementById("edit-sutaz-adresa");
  const editTypy = document.getElementById("edit-sutaz-typy");

  // --- OPEN ADD POPUP ---
  if (addBtn && addPopup) {
    addBtn.addEventListener("click", () => {
      addPopup.style.display = "flex";
    });
  }

  // --- CLOSE ADD POPUP ---
  if (addClose && addPopup) {
    addClose.addEventListener("click", () => {
      addPopup.style.display = "none";
    });
  }

  // click mimo box = zavrieť
  if (addPopup) {
    addPopup.addEventListener("click", (e) => {
      if (e.target === addPopup) addPopup.style.display = "none";
    });
  }

  // --- OPEN EDIT POPUP + FILL DATA ---
  document.querySelectorAll(".sutaz-edit-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      if (!editPopup) return;

      editId.value = btn.dataset.id || "";
      editNazov.value = btn.dataset.nazov || "";
      editMesto.value = btn.dataset.mesto || "";
      editAdresa.value = btn.dataset.adresa || "";
      editTypy.value = btn.dataset.typy || "";

      editPopup.style.display = "flex";
    });
  });

  // --- CLOSE EDIT POPUP ---
  if (editClose && editPopup) {
    editClose.addEventListener("click", () => {
      editPopup.style.display = "none";
    });
  }

  if (editPopup) {
    editPopup.addEventListener("click", (e) => {
      if (e.target === editPopup) editPopup.style.display = "none";
    });
  }
});
