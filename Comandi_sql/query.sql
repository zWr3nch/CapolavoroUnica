-- registrazione di un paziente con i dati precedentemente indicati

INSERT INTO Utenti(Cognome, Nome, Username, Password, Livello, CodiceFiscale, DataNascita, LuogoNascita, Indirizzo, Cellulare) VALUES
("Cognome", "Nome", "Username", "password", 0, "CodiceFiscale", 2005-03-06, "Casarano", "Via Roma 1", "3334445556");

-- fornire l’elenco di tutti i posti letto liberi dello stesso reparto in un certo giorno; 
SELECT DISTINCT l.NumeroLetto, l.NomeReparto 
FROM Letti l LEFT JOIN prenotazioni p ON l.NumeroLetto=p.NumeroLetto 
WHERE (l.NomeReparto = "Pronto soccorso") AND ("2024-03-03" NOT BETWEEN p.DataInizio AND p.DataFine OR p.DataInizio IS NULL);

-- visualizzare l’elenco di tutti i periodi di degenza (in ordine cronologico) fatti dallo stesso paziente (anche in reparti diversi)
SELECT p.IDPaziente, u.Cognome, u.Nome, p.DataInizio, p.DataFine
FROM prenotazioni p INNER JOIN Utenti u ON p.IDPaziente=u.IDUtente
WHERE p.IDPaziente="2"
ORDER BY p.DataInizio;

-- calcolare il numero dei letti occupati in ogni reparto in un determinato giorno; 

SELECT COUNT(p.NumeroLetto) as 'Numero letti occupati', r.NomeReparto, p.DataInizio, p.DataFine
FROM Reparti r LEFT JOIN Letti l USING(NomeReparto) LEFT JOIN Prenotazioni p USING(NumeroLetto)
GROUP BY r.NomeReparto
HAVING ("2024-04-04" BETWEEN p.DataInizio AND p.DataFine) OR p.DataInizio IS NULL;

--  effettuare la ricerca del reparto e del letto in cui è ricoverato un paziente in una certa data. 

SELECT l.NomeReparto, p.NumeroLetto
FROM prenotazioni p INNER JOIN letti l ON p.NumeroLetto=l.NumeroLetto
WHERE p.IDPaziente="2" AND "2024-02-02" BETWEEN p.DataInizio AND p.DataFine;