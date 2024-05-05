CREATE TABLE IF NOT EXISTS Reparti(
NomeReparto ENUM("Pronto Soccorso", "Medicina", "Chirurgia", "Gastroenterologia", "Dietologia") primary key,
Piano ENUM("Piano terra", "Primo", "Secondo", "Terzo")
);