document.addEventListener("DOMContentLoaded", () => {
  // ===== POPUP: PRIDAŤ SÚŤAŽ =====
  const addBtn = document.getElementById("openAddSutazPopup");
  const addPopup = document.getElementById("sutaz-popup");
  const addClose = document.getElementById("sutaz-popup-close");

  if (addBtn && addPopup) {
    addBtn.addEventListener("click", () => {
      addPopup.style.display = "flex";
    });
  }

  if (addClose && addPopup) {
    addClose.addEventListener("click", () => {
      addPopup.style.display = "none";
    });
  }

  if (addPopup) {
    addPopup.addEventListener("click", (e) => {
      if (e.target === addPopup) addPopup.style.display = "none";
    });
  }

  // ===== POPUP: EDITOVAŤ SÚŤAŽ =====
  const editPopup = document.getElementById("sutaz-edit-popup");
  const editClose = document.getElementById("sutaz-edit-close");

  const editId = document.getElementById("edit-sutaz-id");
  const editNazov = document.getElementById("edit-sutaz-nazov");
  const editMesto = document.getElementById("edit-sutaz-mesto");
  const editAdresa = document.getElementById("edit-sutaz-adresa");
  const editTypy = document.getElementById("edit-sutaz-typy");

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

  // ===== AJAX =====
  document.querySelectorAll(".ucast-toggle-form").forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const btn = form.querySelector(".ucast-toggle-btn");
      if (!btn) return;

      btn.disabled = true;

      try {
        const res = await fetch(form.action, {
          method: "POST",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json",
          },
          body: new FormData(form),
        });

        const data = await res.json();

        if (!data.ok) {
          alert("Chyba pri zmene účasti.");
          return;
        }

        if (data.joined) {
          btn.textContent = "Zrušiť účasť";
          btn.classList.remove("btn-success");
          btn.classList.add("btn-danger");
        } else {
          btn.textContent = "Zúčastním sa";
          btn.classList.remove("btn-danger");
          btn.classList.add("btn-success");
        }
      } catch (err) {
        console.error(err);
        alert("Chyba pripojenia (AJAX).");
      } finally {
        btn.disabled = false;
      }
    });
  });
});
