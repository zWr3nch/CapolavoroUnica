<?php
    if($_SESSION["Livello"] == 0){

    }else{
        if($_SESSION["Livello"] == 1){
            header("location: area-riservata-personale.php");
        }
    }
?>