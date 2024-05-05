<?php include 'verifica-loggato.php';?>
<?php include 'verifica-paziente.php';?>
<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Posti letto liberi</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/menu3.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav-riservato.php' ?>
        </nav>
        
        <div class="container">
            <form action="query3.php" method="get">
                <div class="input-group">
                    <label for="Data">Giorno</label>
                    <input type="date" name="Data" id="Data" class="input" required>
                </div>
                <input type="submit" value="Ricerca">
            </form> 
        </div>

        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>