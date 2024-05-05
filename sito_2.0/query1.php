<?php include 'verifica-loggato.php';?>
<?php include 'verifica-paziente.php';?>
<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Area riservata</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/query1.css">
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

            $reparto = $_GET['Reparto'];
            $data = $_GET['Data'];

            $query = "SELECT DISTINCT l.NumeroLetto, l.NomeReparto
                    FROM letti l LEFT JOIN prenotazioni p ON l.NumeroLetto=p.NumeroLetto
                    WHERE (l.NomeReparto = '$reparto')
                            AND (('$data' NOT BETWEEN p.DataInizio AND p.DataFine) OR p.DataInizio IS NULL);";

            if($result = $connessione->query($query)){
                if($result->num_rows>0){
                    echo '  <table>
                                <tr>
                                    <th>Numero Letto</th>
                                    <th>Reparto</th>
                                </tr>
                        ';
                    foreach($result as $row):
                        echo '
                            <tr>
                                <td>'. $row["NumeroLetto"] . '</td>
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



