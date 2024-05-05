<?php include 'verifica-loggato.php';?>
<?php include 'verifica-personale.php';?>

<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Area riservata</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/area-personale.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav-riservato2.php' ?>
        </nav>
        
        <div class="container">
           <form action="prenotazione.php" method="post">
                <div>
                    <label for="idpaziente">ID Paziente</label>
                    <input type="text" name="idpaziente" required>
                </div>

                <div>
                    <label for="numLetto">Numero letto</label>
                    <input type="text" name="numLetto" required>
                </div>

                <div>
                    <label for="dataInizio">Data inizio</label>
                    <input type="date" name="dataInizio" required>
                </div>

                <div>
                    <label for="dataFine">Data fine</label>
                    <input type="date" name="dataFine" required>
                </div>
                
                <div>
                    <input type="submit" value="Prenota">
                </div>
                
           </form>
        </div>
        
        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>