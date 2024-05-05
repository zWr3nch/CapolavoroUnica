<?php include 'verifica-loggato.php';?>
<?php include 'verifica-paziente.php';?>
<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Area riservata</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/area-paziente.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav-riservato.php' ?>
        </nav>
        
        <div class="container">
           <ul> 
                <a href="menu1.php"><li>Posti letto liberi</li></a>
                <a href="menu2.php"><li>Elenco degenze</li></a>
                <a href="menu3.php"><li>Numero letti occupati per reparto</li></a>
                <a href="menu4.php"><li>Ricerca reparto e letto di un paziente</li></a>
           </ul>
        </div>

        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>