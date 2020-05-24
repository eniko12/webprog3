## Cél:
Kvíz weboldal készítése. 2 típusú kérdés jelenhet meg egy kvíz során.
Véletlenszerű kérdések jelennek meg, egymás után x db.
A kvíz végén a felhasználó megnézheti az eredményeket, százalékot.

## Adatbázis táblák:
- Harom: A 3 válaszlehetőséges kérdések
- Valsz: a Harom tábla válaszait tartalmazza
- Eldontendo: eldöntendő kérdések
- Kerdesek: A 3 kérdés típusból az összes kérdés egyben
- Tipus: A különböző kérdéseket kapcsolja össze az összes kérdéssel
- User: adminok és felhasználók

## Jogosultsági szintek
- egyszerű felhasználó: hozzáfér a kész kvízekhez, és a profiljához
- szuper admin: Hozzáfér az összes kérdéshez (új hozzáadása, törlése, módosítás), feladata a felhasználók kezelése.
