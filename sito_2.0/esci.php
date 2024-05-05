<?php
    session_start();
    
    if(session_id() !== ""){
        session_destroy();
        session_abort();
    }
    
    header("location: index.php");