<?php include 'verifica-loggato.php';?>
<?php include 'verifica-paziente.php';?>
<!DOCTYPE html>
<html lang="it">
<head>
        <meta charset='utf-8'>
        <title>Ospedale | Posti letto liberi</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="css/main-riservato.css">
        <link rel="stylesheet" href="css/menu1.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav-riservato.php' ?>
        </nav>
        
        <div class="container" id="container">
            <form action="query1.php" method="get">
                    <div class="input-group">
                        <label for="Reparto">Reparto</label>
                        <select name="Reparto" id="Reparto" class="input" required>
                            <option value="Pronto soccorso">Pronto soccorso</option>
                            <option value="Medicina">Medicina</option>
                            <option value="Chirurgia">Chirurgia</option>
                            <option value="Gastroenterologia">Gastroenterologia</option>
                            <option value="Dietologia">Dietologia</option>
                            <option value="Oculistica">Oculistica</option>
                            <option value="Cardiologia">Cardiologia</option>
                            <option value="Oncologia">Oncologia</option>
                            <option value="Neurologia">Neurologia</option>
                            <option value="Pediatria">Pediatria</option>
                            <option value="Ortopedia">Ortopedia</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="Data">Giorno</label>
                        <input type="date" name="Data" class="input" required>
                    </div>

                    <input type="submit" value="Ricerca">
            </form> 
        </div>

        <footer>
            <?php include 'footer.php' ?>
        </footer>
    </body>
</html>