document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("openAddParPopup");
  const popup = document.getElementById("par-popup");
  const closeBtn = document.getElementById("par-popup-close");

  const sel1 = document.getElementById("par-user1");
  const sel2 = document.getElementById("par-user2");
  const form = document.getElementById("par-form");
  const err = document.getElementById("par-error");

  if (openBtn && popup) {
    openBtn.addEventListener("click", () => {
      popup.style.display = "flex";
      if (err) err.style.display = "none";
    });
  }

  if (closeBtn && popup) {
    closeBtn.addEventListener("click", () => {
      popup.style.display = "none";
    });
  }

  if (popup) {
    popup.addEventListener("click", (e) => {
      if (e.target === popup) popup.style.display = "none";
    });
  }

  function validateDifferent() {
    if (!sel1 || !sel2 || !err) return true;

    if (sel1.value && sel2.value && sel1.value === sel2.value) {
      err.textContent = "Nemôžeš vybrať 2× tú istú osobu.";
      err.style.display = "block";
      return false;
    }

    err.style.display = "none";
    return true;
  }

  if (sel1) sel1.addEventListener("change", validateDifferent);
  if (sel2) sel2.addEventListener("change", validateDifferent);

  if (form) {
    form.addEventListener("submit", (e) => {
      if (!validateDifferent()) e.preventDefault();
    });
  }
});
