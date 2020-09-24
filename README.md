# Formula1DataBase

Pornind de la ideea de Formula 1, am gandit acest proiect in felul urmator: ca prin ceea ce
voi realiza, un utilizator sa poata accesa anumite detalii despre curse, pilotii, dar si echipe, in
vederea informarii sale asupra acestora . Am inceput de la un user de acces si o parola prin tabela
user_acc si profilul unui utilizator prin user_profile1 . Utilizatorul isi poate accesa contul prin
user si parola.
Tabelul user_acc l-am utilizat pentru implementarea paginii de login, in acesta fiind cautate
combinatiile de username si parola care permit autentificarea.
De asemenea, am legat DATE de USER_PROFILE printr-o relatie one-to-many care semnifica
faptul ca un utilizator are acces la mai multe zile, mai exact la toate zilele.
Am creat tabelele races, driver si tickets.
Tabela driver reprezinta pilotii existenti si activi in cursele de Formula 1 actuale , si este
legata de tabela echipa printr-o relatie one-to-one deoarece un pilot poate apartine unei singure
echipe, dar si de tabela date_curse printr-o relatie one-to-many deoarece un pilot a putut
participa la mai multe curse in trecut.
Tabela races reprezinta cursele ce vor avea loc in viitor.
Tabela tickets reprezinta biletele ce vor fi puse in vanzare pentru anumite curse.
Tabele:

· DATE-CURSE
ID_date int(11)not null primary key autoincrementat
Data date not null
Race_name varchar(45) not null
Race_country varchar(45) not null
ID_user int(11) not null

· DRIVER
ID_driver int(11) not null PRIMARY KEY autoincrementat
Nume varchar(50) not null
Prenume varchar(50) not null
Echipa varchar(50) not null
Puncte int(100) not null
Cursa int(11) not null

· ECHIPA
ID_echipa int(11) not null PRIMARY KEY autoincrementat
Nume_echipa varchar(45) not null
Tara varchar(35) not null
Titluri int(11) not null
Anul_aparitiei int(4) not null
Nr_piloti int(11) not null

· RACES
ID_race int(11) not null PRIMARY KEY autoincrement
Race_name varchar(50) not null
Race_country varchar(50) not null
Race_date date not null
Cursa int(11) not null

· TICKETS
ID_ticket int(11) not null PRIMARY KEY autoincrement
Race_ticket varchar(50) not null
Country_ticket varchar(50) not null
Data_ticket date not null
Price_ticket double not null

· USER_ACC
id int(11) not null PRIMARY KEY autoincrement
username varchar(50) not null
password varchar(50) not null

· USER_PROFILE1
ID_user int(11) not null PRIMARY KEY autoincrement
Nume varchar(45) not null
Prenume varchar(45) not null
Email varchar(45) not null
Telefon varchar(15) not null
Sex char(1) not null
Tara varchar(35) not null
Oras varchar(35) not null

Interfata:
Baza de date a fost creata folosind aplicatia XAMPP , iar interfata am implementat-o
folosind limbajul PHP.
Conectarea dintre baza de date si interfata am realizat-o cu ajutorul sintaxei:
$db = mysqli_connect('localhost', 'root', '', 'formula1');
‘formula1’ fiind denumirea bazei de date si, astfel, conectandu-ma pe serverul local.
Pentru inceput am realizat pagina prin care utilizatorul se poate loga, “Login”, dar si pagina prin
care se pot inregistra noi utilizatori, “Register”.

In urma autentificarii, utilizatorului i se va afisa pagina de intro in care el deja poate
observa toate actiunile pe care le poate face. In prima parte se poate observa ca acesta va putea
adauga, sterge, dar si edita , anumite detalii despre curse, piloti sau bilete.
Folosind butonul “Cauta” , utilizatorul poate cauta ceva anume, pentru ca mai apoi sa
decida de va vrea sa faca in continuare.

Interogari SQL folosite:
· Pentru cautare:
SELECT * FROM races WHERE ID_race='$info[0]' OR Race_name = '$info[1]' OR
Race_country='$info[2]' OR Race_date='$info[3]' OR Cursa='$info[4]'
SELECT * FROM driver WHERE ID_driver='$info[0]' OR Nume = '$info[1]' OR
Prenume='$info[2]' OR Echipa='$info[3]' OR Puncte='$info[4]'
SELECT * FROM tickets WHERE ID_ticket='$info[0]' OR Race_ticket = '$info[1]' OR
Country_ticket='info[2]' OR Price_ticket='$info[3]'

· Pentru inserare:
INSERT INTO races (Race_name, Race_country, Race_date, Cursa) VALUES
('$info[1]','$info[2]','$info[3]','$info[4]')
INSERT INTO driver (Nume, Prenume, Echipa, Puncte, Cursa) VALUES
('$info[1]','$info[2]','$info[3]', '$info[4]', '$info[5]')
INSERT INTO tickets (Race_ticket, Country_ticket, Price_ticket) VALUES
('$info[1]','$info[2]','$info[3]')

· Pentru stergere:
DELETE FROM races WHERE ID_race = '$info[0]'
DELETE FROM driver WHERE ID_driver = '$info[0]'
DELETE FROM tickets WHERE ID_ticket = '$info[0]'

· Pentru update:
UPDATE races SET Race_name='$info[1]' WHERE ID_race = '$info[0]'
UPDATE races SET Race_country='$info[2]' WHERE ID_race = '$info[0]'
UPDATE races SET Race_date='$info[3]' WHERE ID_race = '$info[0]'
UPDATE races SET Cursa='$info[4]' WHERE ID_race = '$info[0]'
UPDATE driver SET Nume='$info[1]' WHERE ID_driver = '$info[0]'
UPDATE driver SET Prenume='$info[2]' WHERE ID_driver = '$info[0]'
UPDATE driver SET Echipa='$info[3]' WHERE ID_driver = '$info[0]'
UPDATE driver SET Puncte='$info[4]' WHERE ID_driver = '$info[0]'
UPDATE driver SET Cursa='$info[5]' WHERE ID_driver = '$info[0]'
UPDATE tickets SET Country_ticket='$info[2]' WHERE ID_ticket = '$info[0]'
UPDATE tickets SET Price_ticket='$info[3]' WHERE ID_ticket = '$info[0]'
UPDATE tickets SET Race_ticket='$info[1]' WHERE ID_ticket = '$info[0]'
UPDATE tickets SET Race_ticket='$info[1]', Country_ticket='$info[2]' WHERE ID_ticket =
'$info[0]'
UPDATE tickets SET Race_ticket='$info[1]', Price_ticket='$info[3]' WHERE ID_ticket =
'$info[0]'
UPDATE tickets SET Country_ticket='$info[2]', Price_ticket='$info[3]' WHERE ID_ticket =
'$info[0]'
UPDATE task SET Denumire='$info[1]', Locatie='$info[2]', Observatii='$info[3]' WHERE
ID_task = '$info[0]'

Cea de-a doua parte , denumita si “Cauta🏎️ “ are rolul de a usura utilizatorului modul
de cauta a detaliilor referitoare la o cursa, un pilot sau un bilet , cautand dupa anumite cuvinte
cheie, precum “Nume Pilot”, “Tara Cursa” sau “Nume Cursa”.

SELECT ID_driver, Nume, Prenume, Echipa, Puncte, Cursa FROM `driver` WHERE
driver.nume='$info'

SELECT ID_race, Race_name, Race_country, Race_date, Cursa FROM `races`WHERE
races.race_country='$info'

SELECT ID_ticket, Race_ticket, Country_ticket, Price_ticket FROM `tickets` WHERE
tickets.race_ticket='$info'

Cea de-a treia parte in schimb vine cu ceva diferit, si anume cautari mai ample, precum
pilotii participanti la o anumita cursa, sau cursele la care a participat un anumit pilot si chiar
detaliile echipei din care face parte un anumit pilot.

SELECT Nume, Prenume, Echipa, Puncte FROM `driver` JOIN `date_curse` ON
date_curse.ID_date=driver.cursa WHERE driver.cursa='$info'

SELECT Data, Race_name , Race_country FROM `date_curse` JOIN `driver` ON
date_curse.ID_date=driver.cursa WHERE driver.nume='$info'

SELECT Nume_echipa, Tara, Titluri, Anul_aparitiei, Nr_piloti FROM `echipa` JOIN
`driver` ON echipa.nume_echipa=driver.echipa WHERE driver.nume='$info'

Ultima parte este partea vizibila doar adminului si prezinta urmatoarele:

SELECT Nume , Prenume, Tara, Oras FROM user_profile1 WHERE tara IN(SELECT
race_country FROM races) ORDER BY Tara
 Pentru aceasta interogatie am folosit o subcerere pentru a afla toate persoanele din tabela
‘user_profile1’ care isi au tara de origine aceeasi cu cea in care va avea loc o cursa din tabela
‘races’ , ordonand totul in functie de tara.

SELECT Nume , Prenume, Tara, Oras FROM user_profile1 WHERE ID_user NOT IN
( SELECT ID_user FROM date_curse) ORDER BY Nume
Pentru aceasta interogatie am folosit o subcerere pentru a afla toati utilizatorii din tabela
‘user_profile’ care nu au introdus curse in trecut in tabela ‘date_curse’ , ordonandu-i alfabetic.

SELECT Nume, Prenume, Email, Telefon, Sex, Tara, Oras FROM user_profile1 WHERE
Tara IN (SELECT Race_country FROM Date_curse )ORDER BY Nume
Am folosit o subcerere pentru a afisa totate persoanele din tabela ‘user_profile1’ care isi
gasesc tara de origine in locurile in care s-au desfasurat cursele in trecut, ordonate in functie de
nume.

SELECT Data, Race_name, Race_country FROM date_curse WHERE ID_user IN
(SELECT ID_user='$info' FROM user_profile1 )
Am folosit o subcerere pentru a afisa cursele din trecut pe care un utilizator dat le-a
adaugat in baza de date.
Apasarea butonului Logout duce la deconectarea utilizatorului.
