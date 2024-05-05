<?php
    session_start();
    
    if(isset($_SESSION['Loggato'])){
        if($_SESSION['Loggato'] === true){
            if($_SESSION['Livello'] == 1){
            header("location: area-riservata-personale.php");
        }else
            if($_SESSION['Livello'] == 0)
            header("location: area-riservata-paziente.php");
        }
    }
    
        
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Ospedale | Accesso</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/accesso.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>

        <nav>
            <?php include 'nav.php' ?>
        </nav>

        <div class="container">
                <div class="div-form-login">
                    <form action="verifica-accesso.php" method="post">
                            <img src="img/login3.png" alt="">
                            <input type="text" name="Username" id="" class="input-box" required placeholder="Username">
                            <br>
                            <input type="password" name="Password" id="" class="input-box" required placeholder="Password">
                            <br>
                            <input type="submit" value="Accedi" class="invio-btn">
                    </form>

                    <p>Non sei ancora registrato? <a href="registrazione.php">Registrati</a></p>
                </div>
        </div>
    </body>
</html>