<?php 
    include 'verifica-loggato.php';
    include 'verifica-loggato.php';
    require_once 'accessoDB.php';
    
    $idpaziente = $_POST["idpaziente"];
    $nLetto = $_POST["numLetto"];
    $dataI = $_POST["dataInizio"];
    $dataF = $_POST["dataFine"];


    $query = "INSERT INTO prenotazioni(DataInizio, DataFine, IDPersonale, IDPaziente, NumeroLetto)
            VALUES (?,?,?,?,?)";


    $query_verifica = "SELECT * FROM prenotazioni p WHERE p.NumeroLetto = '$nLetto' AND '$dataI' BETWEEN p.dataInizio AND p.dataFine";

    $result = $connessione->query($query_verifica);
    if($result->num_rows == 0){
        if($statement = $connessione->prepare($query)){
            $statement->bind_param('ssiii', $dataI, $dataF, $_SESSION['id'], $idpaziente, $nLetto);

            $idpaziente = $_POST["idpaziente"];
            $nLetto = $_POST["numLetto"];
            $dataI = $_POST["dataInizio"];
            $dataF = $_POST["dataFine"];

            $statement->execute();
            
            echo '<h2>Prenotazione corretta</h2>
                <a href="area-riservata-personale.php">torna indietro</a>   
            ';
            $statement->close();
        }else{
            echo "Non e' stato possibile eseguire la query: $sql. " . $connessione->error;
        }
    }else{
        echo "Il letto non e' disponibile in quel giorno.";
    }
    
    
    $connessione->close();

?>