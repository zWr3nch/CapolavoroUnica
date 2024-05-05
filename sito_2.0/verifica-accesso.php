<?php
    require_once('accessoDB.php');

    $user = $connessione->real_escape_string($_POST['Username']);
    $pwd = $connessione->real_escape_string($_POST['Password']);

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $query_select = "SELECT * FROM Utenti WHERE Username = '$user'";
        if($result = $connessione->query($query_select)){
            if($result->num_rows == 1){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $hashed_pwd = md5($pwd);

                if($hashed_pwd === $row['Password']){
                    session_start();
                    $_SESSION['Loggato'] = true;
                    $_SESSION['id'] = $row['IDUtente'];
                    $_SESSION['Username'] = $row['Username'];
                    $_SESSION['Nome'] = $row['Nome'];
                    $_SESSION['Cognome'] = $row['Cognome'];
                    $_SESSION['CodiceFiscale'] = $row['CodiceFiscale'];
                    $_SESSION['Indirizzo'] = $row['Indirizzo'];
                    $_SESSION['DataNascita'] = $row['DataNascita'];
                    $_SESSION['LuogoNascita'] = $row['LuogoNascita'];
                    $_SESSION['Provincia'] = $row['Provincia'];
                    $_SESSION['Livello'] = $row['Livello'];
                    $_SESSION['Cellulare'] = $row['Cellulare'];
                    
                    if($row['Livello'] === "0")
                        header("Location: area-riservata-paziente.php");
                    elseif($row['Livello'] === "1")
                        header("Location: area-riservata-personale.php");
                        else{
                            session_abort();
                            header("Location: errore.php");
                        }
                }else{
                    header("Location: accesso-fallito.php");
                }
            }else{
                header("Location: accesso-fallito.php");
            }
        }else{
            header("Location: errore.php");
        }
    }

    $connessione->close();

?>