# Disclaimer - AI
Počas tvorby tejto webovej aplikácie bola použitá generatívna AI. Používal som ju na konzultáciu, na učenie sa, pomohla s JS funkciami, na identifikáciu inych problémov. Ako daľšie zdroje na vzdelávanie som používal aj stack-overflow, w3schools alebo youtube tutorialy na pochopenie problematiky.

# Top Dance Žilina – Semestrálna práca (VAII)

Webová aplikácia pre tanečný klub **Top Dance Žilina** určená na správu oznamov, preferovaných súťaží, tanečných párov a komunikáciu s členmi. Projekt bol vypracovaný v rámci predmetu **VAII**.

---

## Funkcionalita

### Autentifikácia a roly

* Prihlásenie a registrácia používateľov
* Roly používateľov:

  * **user** – bežný tanečník
  * **trener** – tréner
  * **admin** – administrátor

### Oznamy

* Zobrazenie hlavných a skupinových oznamov
* Nahrávanie obrázkov k oznamom

### Preferované súťaže

* Zoznam súťaží odporúčaných trénermi
* Používateľ sa môže **zúčastniť / zrušiť účasť** (AJAX bez reloadu)

### Tanečné páry

* Evidencia tanečných párov (2 používatelia s rolou *user*)
* Výpis párov
* Pridanie / vymazanie páru (admin, tréner)
* Výber používateľov zo zoznamu (nie ručné zadávanie)

### Kontakt

* Kontaktný formulár
* Odosielanie správy **cez AJAX** bez obnovy stránky
* Zobrazenie úspechu / chyby

---

## Použité technológie

* **PHP 8.x**
* **MySQL / MariaDB**
* **HTML5, CSS3**
* **Vanilla JavaScript (AJAX – fetch API)**
* **Bootstrap 5**
* **phpMyAdmin**

---

## Databázový model

### Hlavné entity

* `users` – používatelia (login, roly)
* `oznamy` – oznamy
* `sutaze` – preferované súťaže
* `ucast_na_sutazi` – účasť používateľov na súťažiach (M:N)
* `tancne_pary` – tanečné páry (samoväzba users)

---

## Inštalácia projektu

### 1. Klonovanie projektu

Skopíruj projekt do adresára servera :

```
C:\xampp\htdocs\semka
```

### 2. Import databázy

1. Otvor **phpMyAdmin**
2. Vytvor novú databázu (napr. `semka`)
3. Prejdi na **Import**
4. Nahraj súbor `database.sql`
5. Potvrď import


### 3. Spustenie aplikácie

V prehliadači otvor:

```
http://localhost/semka
```

---

## Testovacie účty

| Rola   | Email                                   | Heslo  |
| ------ | --------------------------------------- | ------ |
| admin  | [admin@test.sk](mailto:admin@test.sk)   | adminadmin  |
| trener | [trener@test.sk](mailto:trener@test.sk) | trener |
| user   | [user@test.sk](mailto:user@test.sk)     | useruser   |

*(Ak účty neexistujú, je možné ich vytvoriť registráciou alebo doplniť priamo v DB.)*

---

## AJAX funkcionalita

V projekte sú implementované **AJAX volania**:

1. **Prihlásenie / zrušenie účasti na súťaži** – bez reloadu stránky
2. **Odoslanie kontaktného formulára** – bez reloadu stránky


