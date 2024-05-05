<?php include 'verifica-loggato.php';?>
<?php include 'verifica-paziente.php';?>
<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Elenco degenze</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/menu2.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav-riservato.php' ?>
        </nav>
        
        <div class="container">
           <?php
                require_once('accessoDB.php');
                
                $query = "SELECT p.IDPrenotazione, p.DataInizio, p.DataFine, p.NumeroLetto, p.IDPaziente, u.Cognome, u.Nome
                          FROM prenotazioni p INNER JOIN utenti u ON p.IDPaziente=u.IDUtente
                          WHERE p.IDPaziente = '$_SESSION[id]'
                          ORDER BY p.DataInizio ;";
                
                if($result = $connessione->query($query)){
                    if($result->num_rows>0){
                        echo "  <table>
                                    <tr>
                                        <th>ID Prenotazione</th>
                                        <th>ID Paziente</th>
                                        <th>Cognome</th>
                                        <th>Nome</th>
                                        <th>Numero Letto</th>
                                        <th>Data Inizio</th>
                                        <th>Data Fine</th>
                                    </tr>
                        ";
                        foreach($result as $row):
                            echo "
                                <tr>
                                    <td> $row[IDPrenotazione] </td>
                                    <td> $row[IDPaziente] </td>
                                    <td> $row[Cognome] </td>
                                    <td> $row[Nome] </td>
                                    <td> $row[NumeroLetto] </td>
                                    <td> $row[DataInizio] </td>
                                    <td> $row[DataFine] </td>
                                </tr>    
                            ";
                        endforeach;
                        echo "</table>";
                    }else{
                        echo "
                            <h2>Nessun risultato</h2>
                        ";
                    }
                }else{
                    echo "
                            <h2>Errore $connessione->error </h2>
                        ";
                }
                echo '<a href="area-riservata-paziente.php" class="link-indietro">Torna indietro</a>';
                $connessione->close();
           ?>
        </div>

        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>