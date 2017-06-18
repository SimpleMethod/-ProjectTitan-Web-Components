# API serwerowe projektu Titan #
Komponent sieciowy umożliwia gromadzenie danych o graczach w trybie online.
- - - -
## Użycie ##
'http://127.0.0.1/?hash=3616D7A34B1B20A48E29AD4D910D6CED&opt=1&nick=6594'
Gdzie: **hash**, jest to suma MD5 elementów aktualnego roku oraz miesiąc w formacie *yyyy.MM* i dodatkowo indentyfikatora użytkownika.
**opt**, wybór opcji takich jak:
1. Wyświetlenie danych użytkownika,
2. Dodanie nowego użytkownika,
3. Aktualizacja ilości zabójstw,
4. Aktualizacja ilość zgonów,
5. Aktualizacja ilości zgromadzonych punktów doświadczenia

**nick** identyfikator użytkownika,
**value** opcjonalny argument dla opcji 3,4,5.
**debugmode** opcjonalny wyświetlający tabelę z danymi do debugowania API.
- - - -
Całość projektu dostępna tutaj: https://github.com/SimpleMethod/-Retail-version-ProjectTitan-
