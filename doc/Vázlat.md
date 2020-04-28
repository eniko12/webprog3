## Cél:
Kvíz weboldal készítése. 3 típusú kérdés jelenhet meg egy kvíz során.
Véletlenszerű kérdések jelennek meg, egymás után x db.
A kvíz végén a felhasználó megnézheti az eredményeket, a helyes és az elhibázott válaszokat.
- (A profilján megjelenik valamilyen típusú számláló. pl.: helyes megoldás/kitöltött.)
- (Esetleg szintek megjelenése)

## Adatbázis táblák:
- HaromFelelet: A 3 válaszlehetőséges kérdések
- Kifejtos: önállóan beírt válaszokkal
- IgenNemFelelet: eldöntendő kérdések
- Osszes: A 3 kérdés típusból az összes kérdés egyben
- KerdesTipus: A különböző kérdéseket kapcsolja össze az összes kérdéssel
- User: adminok és felhasználók

## Jogosultsági szintek
- egyszerű felhasználó: hozzáfér a kész kvízekhez, és a profiljához
- szuper admin: Hozzáfér az összes kérdéshez (új hozzáadása, törlése, módosítás), feladata a felhasználók kezelése.
