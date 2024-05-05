<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $nomeDB = "ospedale";

    $connessione = new mysqli($host, $user, $password, $nomeDB);    

    if($connessione === false){
        die("Errore durante la connessione: ". $connessione->connect_error);
    }

?>