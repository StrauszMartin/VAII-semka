<?php

function getTrainers(): array
{
    return [
        [
            "meno" => "Tomáš Blažek",
            "typ"  => "ŠTT",
            "mail" => "tomas.blazek@topdance.sk",
            "tel"  => "+421 900 111 222",
            "foto" => "img/defaulttrpng.png",
        ],
        [
            "meno" => "Jana Nováková",
            "typ"  => "LAT",
            "mail" => "jana.novakova@topdance.sk",
            "tel"  => "+421 900 333 444",
            "foto" => "img/defaulttrpng.png",
        ],
        [
            "meno" => "Peter Kováč",
            "typ"  => "ŠTT",
            "mail" => "peter.kovac@topdance.sk",
            "tel"  => "+421 900 555 666",
            "foto" => "img/defaulttrpng.png",
        ],
        [
            "meno" => "Lucia Mrázová",
            "typ"  => "LAT",
            "mail" => "lucia.mrazova@topdance.sk",
            "tel"  => "+421 900 777 888",
            "foto" => "img/defaulttrpng.png",
        ],
    ];
}


function handleKontaktForm(string $toEmail): array
{
    $formSuccess = "";
    $formError = "";

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $formError = "Vyplň všetky polia.";
        return [$formSuccess, $formError, $name, $email, $message];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = "Zadaj platný e-mail.";
        return [$formSuccess, $formError, $name, $email, $message];
    }

    $subject = "Kontakt formulár – Top Dance Žilina";
    $body =
        "Meno a priezvisko: $name\n" .
        "E-mail: $email\n\n" .
        "Správa:\n$message";

    $headers =
        "From: noreply@topdance.local\r\n" .
        "Reply-To: $email\r\n" .
        "Content-Type: text/plain; charset=UTF-8";

    if (@mail($toEmail, $subject, $body, $headers)) {
        $formSuccess = "Správa bola úspešne odoslaná.";
        $name = "";
        $email = "";
        $message = "";
    } else {
        $formError = "Správu sa nepodarilo odoslať.";
    }

    return [$formSuccess, $formError, $name, $email, $message];
}
