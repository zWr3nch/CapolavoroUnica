<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Ospedale | Home Page</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav.php' ?>
        </nav>
        
        <div class="container">
            <h2 class="titolo-homepage">Benvenuto nel portale dell'ospedale!</h2>
            <p class="testo-homepage"><a href="accesso.php">Accedi</a> per visualizzare le tue prenotazioni</p>
            <p class="testo-homepage">Richiedi una nuova prenotazione al personale del pronto soccorso.</p>
        </div>

        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>