<?php include 'verifica-loggato.php'?>
<?php include 'verifica-paziente.php';?>

<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Elenco degenze</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/query3.css">
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
                include 'verifica-loggato.php';
                require_once('accessoDB.php');

                $data = $_GET["Data"];

                $query = "SELECT COUNT(p.NumeroLetto) as 'Numero letti occupati', r.NomeReparto, p.DataInizio, p.DataFine
                        FROM Reparti r LEFT JOIN Letti l USING(NomeReparto) LEFT JOIN Prenotazioni p USING(NumeroLetto)
                        GROUP BY r.NomeReparto
                        HAVING ('$data' BETWEEN p.DataInizio AND p.DataFine) OR p.DataInizio IS NULL;";

                if($result = $connessione->query($query)){
                    if($result->num_rows>0){
                        echo '  <table>
                                    <tr>
                                        <th>Numero Letti occupati</th>
                                        <th>Reparto</th>
                                    </tr>
                            ';
                        foreach($result as $row):
                            echo '
                                <tr>
                                    <td>'. $row["Numero letti occupati"] . '</td>
                                    <td>'. $row["NomeReparto"] .'</td>
                                </tr>    
                            ';
                        endforeach;
                        echo "</table>";
                    }else{
                        echo "<h2>Nessun risultato trovato</h2>";
                    }
                }else{
                    echo "<h2>Errore</h2>";
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