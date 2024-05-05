CREATE TABLE IF NOT EXISTS Prenotazioni(
IDPrenotazione int PRIMARY KEY auto_increment,
DataInizio DATE NOT NULL,
DataFine DATE NOT NULL,
NumeroLetto int NOT NULL,
NomeReparto ENUM("Pronto Soccorso", "Medicina", "Chirurgia", "Gastroenterologia", "Dietologia") NOT NULL,
IDPersonale int NOT NULL,
IDPaziente int NOT NULL,
FOREIGN KEY(NumeroLetto NomeReparto) REFERENCES Letti(NumeroLetto),
FOREIGN KEY(NomeReparto) REFERENCES Reparti(NomeReparto),
FOREIGN KEY(IDPersonale) REFERENCES Utenti(IDUtente),
FOREIGN KEY(IDPaziente) REFERENCES Utenti(IDUtente)
);