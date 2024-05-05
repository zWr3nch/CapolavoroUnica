<?php include 'verifica-loggato.php'?>
<?php include 'verifica-paziente.php';?>

<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Elenco degenze</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/query4.css">
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

                $data = $_GET['Data'];
                $id = $_GET['id'];

                $query = "SELECT l.NomeReparto, p.NumeroLetto, p.IDPaziente, p.DataInizio, p.DataFine
                        FROM prenotazioni p INNER JOIN letti l ON p.NumeroLetto=l.NumeroLetto
                        WHERE p.IDPaziente='$id' AND '$data' BETWEEN p.DataInizio AND p.DataFine;";

                if($result = $connessione->query($query)){
                    if($result->num_rows>0){
                        echo '  <table>
                                    <tr>
                                        <th>Reparto</th>
                                        <th>Numero Letto</th>
                                        <th>ID Paziente</th>
                                    </tr>
                            ';
                        foreach($result as $row):
                            echo '
                                <tr>
                                    <td>'. $row["NomeReparto"] . '</td>
                                    <td>'. $row["NumeroLetto"] .'</td>
                                    <td>'. $row["IDPaziente"] . '</td>
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



