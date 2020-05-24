# Weboldal leírása
Random kvízeket generáló weboldal. 2 típusú kérdés jelenhet meg: Igaz-Hamis és Három választási lehetőséges.


## Egyszerű felhasználó
Regisztráció és bejelentkezés után tudunk kvízt kitölteni. Bejelentkezve van lehetőségünk a Profil oldalra lépni, ahol az adataink vannak. Ha **bejelentkezés nélkül** próbálunk ezekhez a funkciókhoz férni **autómatikusan a Bejelentkezéshez ugrik az oldal.**

A kvízek kitöltése végén a kvíz kiértékelődik és egy új oldalon láthatjuk az eredményeket. 

A kvízek kiértékelésekor A **Results mappában lévő fájlba új bejegyzés kerül** az eredményről.

## Admin
A weboldal első betöltésekor generálódik **egy *admin* felhasználónevű felhasználó *admin* jelszóval**. Ezt használhatjuk a késöbbiekben.

Adminként listázni tudjuk a regisztrált felhasználókat, az adatbázisban szereplő kérdéseket, új kérdéseket adhatunk hozzá és a régieket törölhetjük.

Új kérdést **hozzáadhatunk** egyesével vagy a **megfelelő formájú txt fájl feltöltésével** egyszerre a többet is.

Bármilyik admin jogosultsággal rendelkező felhasználó **regisztrálhat új admin jogosultságú felhasználót**, ez csak ilyen módon tehető meg.


### Megvalósítás

 - CodeIgniter keretrendszer az MVC felépítéshez
 - Bootstrap a reszponziv designhoz
 
 ### Adatbázis
 Az adatbázisban 6 tábla van: 
 
 - user: a felhasználók tárolására
 - type: a kérdés típusok tárolására (0: Igaz-Hamis típus, 1: Három-választós típus)
 - threeansq: Három-választós kérdések
 - answer: a Három-választós kérdésekhez tartozó válaszok
 - yesnoq: Eldöntendő kérdések
 - questions: Az összes kérdést tartalmazza, szövegesen

