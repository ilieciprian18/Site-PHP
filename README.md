# Site-PHP
Site realizat pentru disciplina "Tehnici avansate de dezvoltare web", folosind PHP.
La acest proiect am creeat un site pentru o agentie de turism fictiva, site functional.Acesta este  de asemenea legat la o baza de date.
In intermediul site-ului exista doua categorii de useri:

### Utilizator
 - isi poate creea cont
 - poate creea o rezervare la un hotel
 - poate creea o rezervare intr-o excursie
 - se poate loga pe site
 - poate sa isi vada datele contului la profil
 - poate vizualiza termenii si conditiile agentiei 
 - poate completa un formular de contact (in urma caruia un mail cu formularul completat este trimis automat catre adresa de email a companiei)
 - poate cere dovada rezervarii (din tabil profile) in urma caruia o si poate downloada in format pdf

### Administrator
 - se poate loga pe site
 - are acces la admin control pannel (in loc de profile)
 - are aceleasi beneficii ca utilizatorii
 - nu se pot creea conturi de administratori decat direct din baza de date, acestea find creeate doar pentru angajatii firmei

Utilizatorii nelogati pot accesta termenii si conditiile si de asemenea informatiile despre proiect ( front page, colt dreapta jos, click pe simbolul de share)\
Pentru ca o parola sa fie acceptata aceatsa trebuie sa respecte anumite criterii(de asemenea parolele sunt criptate).\
De asemenea site-ul este https si contine o serie de optimizari de securitate.\
_In general codul contine comentarii sugestive_

## Cerinte Proiect 

### Etapa I
Realizati o pagina/pagini web in care prezentati aplicatia web aleasa ca proiect;\
Realizati o descriere a arhitecturii pentru aplicatia aleasa; (sugestie: identificati rolurile, entitatile si
procesele specifice aplicatiei, precum si relatiile intre acestea; stabiliti componentele principale;
o descriere succinta a bazei de date)\
Prezentati o descriere a solutiei de implementare propuse. (sugestie: puteti folosi UML pentru diverse specificari;)

### Etapa II
Implementati functionalitatile de baza ale aplicatiei descrise la tema 1.\
Daca constatati ca planul de implementare descris in tema 1 necesita modificari, le puteti face.\
Aplicatia trebuie sa contina la acest nivel decat un mecanism simplu de autentificare si interactiuni de tip CRUD cu baza de date proiectata/implementata.\
Restul elementelor care tin de roluri si de securitatea aplicatiei vor fi implementate la tema 3.

### Etapa III
Se cere implementarea actiunilor specifice pentru fiecare categorie de utilizator (se va verifica separarea rolurilor).\
In acest moment trebuie avute in vedere si aspecte cu privire la securizarea aplicației web împotriva atacurilor comune la care ea va fi expusă după lansarea în Internet.\
Se vor lua în considerare următoarele tipuri de atacuri discutate: Form Spoofing, HTTP Request Spoofing, XSS, XRSF, SQL Injection.\
Adițional, toate formularele publice (cum ar fi, spre exemplu, formularul de contact sau orice alt formular care nu necesită privilegii pentru a fi trimis server-ului) să conțină metode de protecție împotriva transmiterii automate (se recomanda utilizarea reCAPTCHA, dar orice soluție validă va fi acceptată).

### Etapa IV
In functie de specificul fiecarei teme trebuie sa introduceti in aplicatie continut parsat/modelat din surse externe (nu direct url, frame etc).\
Pentru diferite situatii: contact, comanda, mesaje este necesar sa implementati o functionalitate de transmitere a mesajelor email.\
Aplicatia va permite importul/exportul in diferite formate (excel, doc, pdf etc) a informatiilor spre/din aplicatie.\
Adaugati aplicatiei un element multimedia si realizati o serie de optimizari SEO.\
Testati functionarea corespunzatoare a aplicatiei indiferent de browser-ul utilizat.
