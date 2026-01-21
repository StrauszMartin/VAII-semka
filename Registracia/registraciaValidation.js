(function () {
  "use strict";

  const form = document.querySelector("form.needs-validation");
  if (!form) return;

  const mail = document.getElementById("mail");
  const heslo = document.getElementById("heslo");

  form.addEventListener("submit", function (event) {
    // najprv zruš vlastné chyby z minulého pokusu
    if (mail) mail.setCustomValidity("");
    if (heslo) heslo.setCustomValidity("");

    // základná HTML5 validácia
    let ok = form.checkValidity();

    // extra validácia (ak chceš)
    if (mail && mail.value && !mail.value.includes("@")) {
      mail.setCustomValidity("Neplatný e-mail");
      ok = false;
    }

    if (heslo && heslo.value && heslo.value.length < 6) {
      heslo.setCustomValidity("Heslo musí mať aspoň 6 znakov");
      ok = false;
    }

    if (!ok) {
      event.preventDefault();
      event.stopPropagation();
      form.classList.add("was-validated"); // toto spôsobí zobrazenie invalid-feedback
    }
  }, false);
})();
