document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("kontakt-form");
  const alertBox = document.getElementById("kontakt-ajax-alert");

  if (!form || !alertBox) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    alertBox.innerHTML = "";

    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

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

      if (data.ok) {
        alertBox.innerHTML = `<div class="alert alert-success">${escapeHtml(data.message)}</div>`;
        form.reset();
      } else {
        alertBox.innerHTML = `<div class="alert alert-danger">${escapeHtml(data.message || "Chyba pri odoslaní.")}</div>`;
      }
    } catch (err) {
      console.error(err);
      alertBox.innerHTML = `<div class="alert alert-danger">Chyba pripojenia. Skús znova.</div>`;
    } finally {
      if (submitBtn) submitBtn.disabled = false;
    }
  });

  function escapeHtml(str) {
    return String(str)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }
});
