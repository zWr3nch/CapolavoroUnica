<?php
    if($_SESSION["Livello"] == 1){

    }else{
        if($_SESSION["Livello"] == 0){
            header("location: area-riservata-paziente.php");
        }
    }
?>