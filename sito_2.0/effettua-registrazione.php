<?php
    require_once('accessoDB.php');

    $query = "INSERT INTO Utenti (Nome, Cognome, Username, Password, Cellulare, CodiceFiscale, Indirizzo, DataNascita, LuogoNascita, Provincia, Livello)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if($statement = $connessione->prepare($query)){
        $statement->bind_param('ssssssssssi', $nome, $cognome, $user, $hashed_pwd, $cellulare, $cf, $indirizzo, $dataNascita, $luogoNascita, $provincia, $livello);

        $nome = $_POST['Nome'];
        $cognome =$_POST['Cognome'];
        $user = $_POST['Username'];
        $pwd = $_POST['Password'];
        $hashed_pwd = md5($pwd);
        $cf = $_POST['CF'];
        $indirizzo = $_POST['Indirizzo'];
        $dataNascita = $_POST['DataNascita'];
        $luogoNascita = $_POST['LuogoNascita'];
        $provincia = $_POST['Provincia'];
        $cellulare = $_POST['Cellulare'];
        $livello = 0;

        $statement->execute();
        
        header("Location: registrazione-corretta.php");
    }else{
        echo "Non e' stato possibile eseguire la query: $sql. " . $connessione->error;
    }

    $statement->close();
    $connessione->close();
?>
    