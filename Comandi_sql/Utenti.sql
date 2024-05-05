CREATE TABLE IF NOT EXISTS Utenti(
IDUtente int PRIMARY KEY auto_increment,
Nome varchar(30) NOT NULL,
Cognome varchar(30) NOT NULL,
Username varchar(15) NOT NULL UNIQUE,
Password varchar(25) NOT NULL,
Livello ENUM("0", "1") NOT NULL,
CodiceFiscale char(16) UNIQUE,
DataNascita DATE,
LuogoNascita varchar(20),
Indirizzo varchar(50),
Cellulare varchar(13)
);


INSERT INTO Utenti(Nome, Cognome, Username, Password, Livello) VALUES
("Simone", "Briganti", "simone.briganti", "b.s1monE05", "1"),
("Alessandro", "Alfarano", "alessandro.alfarano", "a.4less4ndro06", "1");

INSERT INTO Utenti(Nome, Cognome, Username, Password, Livello, CodiceFiscale, DataNascita, LuogoNascita, Indirizzo, Cellulare) VALUE
("Simone", "Briganti", "Simone01", "12345", "0", "BRGSMN05C06B936R", "2005-03-06", "Casarano", "Via Ischia, 23, Marina di Mancaversa", "3518459824");

