CREATE TABLE IF NOT EXISTS Letti(
NumeroLetto int primary key auto_increment,
Disponibilita BIT(1) NOT NULL,
NomeReparto ENUM("Pronto Soccorso", "Medicina", "Chirurgia", "Gastroenterologia", "Dietologia") NOT NULL,
FOREIGN KEY(NomeReparto) REFERENCES Reparti(NomeReparto)
);


INSERT INTO Letti(NumeroLetto, Disponibilita, NomeReparto) VALUES
(1, 1, "Pronto Soccorso"),
(2, 1, "Pronto Soccorso"),
(3, 1, "Pronto Soccorso"),
(4, 1, "Medicina"),
(5, 1, "Chirurgia");




