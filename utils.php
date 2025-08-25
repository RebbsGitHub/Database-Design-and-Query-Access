<?php

function testUtils($variable){
    echo "test variable $variable - utils.php";
}


function databaseQuery(string $query)
{
    $conn = pg_connect("host=localhost port=5432 dbname=Ospedali user=postgres password=admin");
    if (!$conn) {
        return false;
    }
    $result = pg_query($conn, $query);

    if (!$result) {
        return false;
    }
    return $result;
}

function cameraLibera(string $stanza){

    $query= "SELECT stanza_ricovero,letti_liberi FROM stanza WHERE numero_stanza='$stanza'";
    $conn = pg_connect("host=localhost port=5432 dbname=Ospedali user=postgres password=admin");
    if (!$conn) {
        return false;
    }
    $result = pg_query($conn, $query);
    if (!$result) {
        //return "ERRORE: la QUERY non è andata";
        return false;
    }

    $row = pg_fetch_assoc($result);
    pg_close($conn);
    if ($row) {
        $stanza_ricovero = $row['stanza_ricovero'];
        $letti_liberi = $row['letti_liberi'];
        if($stanza_ricovero== 'f'){
            echo "STANZA NON PER PAZIENTI";
            return false;
        }else{
            if ($letti_liberi > 0) {
                echo "Nella stanza ci sono $letti_liberi letti liberi.";
                return true;
            } else {
                echo "Nella stanza non ci sono letti liberi.";
                return false;
            }
        }
        
    } else {
        echo "ERRORE: nessuna camera trovata!";
        return false;
    }

     
}

function diminuisciCamera(string $stanza){

    $query = "UPDATE stanza SET letti_liberi = letti_liberi - 1 WHERE numero_stanza='$stanza'; ";
    $conn = pg_connect("host=localhost port=5432 dbname=Ospedali user=postgres password=admin");
    if (!$conn) {
        return false;
    }
    $result = pg_query($conn, $query);
    if (!$result) {
        return false;
    }
    return true;
}


?>