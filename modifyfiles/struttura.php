<br>
<h4>Area selezionata: Struttura Ospedaliera</h4><br>


<form name="formModifica" action="" method="POST">
    <label for="codice_ospedale">Codice Ospedale</label>
    <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="3"> (non considerato per l'inserimento - considerato solo per la modifica)<br>

    <label for="indirizzo">Indirizzo</label>
    <input type="text" <?php echo (isset($indirizzo)) ? 'value="' . $indirizzo . '"'  : "" ?> name="indirizzo" maxlength="100"><br>

    <label for="regione">Regione</label>
    <input type="text" <?php echo (isset($regione)) ? 'value="' . $regione . '"'  : "" ?> name="regione" maxlength="100"><br>

    <label for="nome">Nome Struttura</label>
    <input type="text" <?php echo (isset($nome)) ? 'value="' . $nome . '"'  : "" ?> name="nome" maxlength="100"><br>

    <input name="nometasto" type="submit" value="Salva">
    <input name="nometasto" type="submit" value="Modifica">
</form>

<?php

//testUtils('ospedalo!');

if (isset($_POST['nometasto'])) {
    $_GET['operation'] = "struttura";


    switch ($_POST['nometasto']) {
        case 'Salva':       // INSERT 

            $indirizzo = addslashes($_POST['indirizzo']);
            $regione = addslashes($_POST['regione']);
            $nome = addslashes($_POST['nome']);

            echo "DATI inseriti: $indirizzo -- $regione -- $nome<br><br>";
            $query = "INSERT INTO Ospedale (indirizzo, regione, nome) VALUES ('$indirizzo', '$regione', '$nome');";
            if (databaseQuery($query) != false) {
                echo '<p>Operazione riuscita - inserimento effettuato</p>';
                exit();
            } else {
                echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                exit();
            }
            break;


        case 'Modifica':    // UPDATE - chiave primaria codice_ospedale

            $codice_ospedale = $_POST['codice_ospedale'];
            $indirizzo = addslashes($_POST['indirizzo']);
            $regione = addslashes($_POST['regione']);
            $nome = addslashes($_POST['nome']);

            if (isset($codice_ospedale) && isset($indirizzo) && isset($regione) && isset($nome)) {
                echo "DATI inseriti: $codice_ospedale -- $indirizzo -- $regione -- $nome<br><br>";
                $query = "UPDATE Ospedale SET indirizzo='$indirizzo', regione='$regione', nome='$nome' WHERE codiceospedale='$codice_ospedale';";
                if (databaseQuery($query) != false) {
                    echo '<p>Operazione riuscita - Update effettuato</p>';
                    exit();
                } else {
                    echo '<p>Operazione non riuscita - errore Update </p>';
                    exit();
                }
            } else {
                echo "ERRORE: valori mancanti per un update!";
            }

            break;

        default:            // Defaut - nulla di selezionato
            echo "Opzione non valida - Campo vuoto";
    }
}

?>