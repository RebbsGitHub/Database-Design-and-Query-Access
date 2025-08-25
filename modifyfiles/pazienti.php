<br>
<h4>Area selezionata: Paziente</h4><br>


<form name="formModifica" action="" method="POST">

    <label for="cf">Codice Fiscale</label>
    <input type="text" <?php echo (isset($cf)) ? 'value="' . $cf . '"'  : "" ?> name="cf" maxlength="16"><br>
    <label for="nome">Nome</label>
    <input type="text" <?php echo (isset($nome)) ? 'value="' . $nome . '"'  : "" ?> name="nome" maxlength="100"><br>
    <label for="cognome">Cognome</label>
    <input type="text" <?php echo (isset($cognome)) ? 'value="' . $cognome . '"'  : "" ?> name="cognome" maxlength="100"><br>
    <label for="data_nascita">Data di nascita</label>
    <input type="date" <?php echo (isset($data_nascita)) ? 'value="' . $data_nascita . '"'  : "" ?> name="data_nascita" maxlength="100"><br>
    <label for="residenza">Residenza</label>
    <input type="text" <?php echo (isset($residenza)) ? 'value="' . $residenza . '"'  : "" ?> name="residenza" maxlength="100"> <br>
    <label for="telefono">Telefono</label>
    <input type="text" <?php echo (isset($telefono)) ? 'value="' . $telefono . '"'  : "" ?> name="telefono" maxlength="10"> <br>


    <label for="ricoverato">Ricoverato</label><br>
    <input type="radio" name="ricoverato" value=TRUE>
    <label>Attualmente ricoverato</label><br>
    <input type="radio" name="ricoverato" value=FALSE>
    <label>Non ricoverato attualemente</label><br>

    <label for="inizio_ricovero">Data inizio Ricovero </label>
    <input type="date" <?php echo (isset($inizio_ricovero)) ? 'value="' . $inizio_ricovero . '"'  : "" ?> name="inizio_ricovero" maxlength="100"> (Campo non considerato se il paziente non è ricoverato)<br>
    <label for="malattia">Motivo ricovero (Malattia) </label>
    <input type="text" <?php echo (isset($malattia)) ? 'value="' . $malattia . '"'  : "" ?> name="malattia" maxlength="100"> (Campo non considerato se il paziente non è ricoverato)<br>
    <label for="stanza_ricoverato">Stanza del paziente </label>
    <input type="text" <?php echo (isset($stanza_ricoverato)) ? 'value="' . $stanza_ricoverato . '"'  : "" ?> name="stanza_ricoverato" maxlength="10"> (Campo non considerato se il paziente non è ricoverato)<br>

    <input name="nometasto" type="submit" value="Salva">
    <input name="nometasto" type="submit" value="Modifica">
</form>

<?php

//testUtils('ospedalo!');

if (isset($_POST['nometasto'])) {
    $_GET['operation'] = "pazienti"; //struttura


    $cf = $_POST['cf'];
    $nome = addslashes($_POST['nome']);
    $cognome = addslashes($_POST['cognome']);
    $data_nascita = $_POST['data_nascita'];
    $residenza = addslashes($_POST['residenza']);
    $telefono = $_POST['telefono'];
    $ricoverato = $_POST['ricoverato'];

    $inizio_ricovero = $_POST['inizio_ricovero'];
    $malattia = addslashes($_POST['malattia']);
    $stanza_ricoverato = $_POST['stanza_ricoverato'];



    switch ($_POST['nometasto']) {

        case 'Salva':       // INSERT 
            echo "DATI inseriti INSERT:  $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $ricoverato -- $inizio_ricovero -- $malattia -- $stanza_ricoverato<br><br>";
            
            if ($ricoverato == 'TRUE') {
                //echo "ricoverato";

                // controllo che la camera è libera
                if(cameraLibera($stanza_ricoverato)){

                    $dateTimeBirth = new DateTime($data_nascita);
                    $dateTimeRicovero = new DateTime($inizio_ricovero);
                    if ($dateTimeRicovero < $dateTimeBirth) {
                        echo "ERRORE: Date inserite non consistenti, la data di ricovero è venuta prima della nascita";
                    } else {
                        //date OK
                        $query = "INSERT INTO paziente (cf, nome, cognome, data_nascita, residenza, telefono, ricoverato, inizio_ricovero, malattia, stanza_ricoverato) VALUES ('$cf', '$nome', '$cognome', '$data_nascita', '$residenza', '$telefono', '$ricoverato', '$inizio_ricovero', '$malattia', '$stanza_ricoverato');";
                        if (databaseQuery($query) != false) {
                            echo '<p>Operazione riuscita - inserimento effettuato</p>';
                            if(diminuisciCamera($stanza_ricoverato)){
                                echo "DEBUG: aggiornamento camera eseguito<br>";
                            }else{
                                echo "ERRORE: camera non aggiornata correttamente!";
                            }
                            exit();
                        } else {
                            echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                            exit();
                        }
                    }

                }else{
                    echo "ERRORE:stanza non selezionabile!";
                }

                
                
                
            } else {
                //echo "non ricoverato";

                $query = "INSERT INTO paziente (cf, nome, cognome, data_nascita, residenza, telefono, ricoverato, inizio_ricovero, malattia, stanza_ricoverato) VALUES ('$cf', '$nome', '$cognome', '$data_nascita', '$residenza', '$telefono', '$ricoverato', NULL, NULL, NULL);";
                if (databaseQuery($query) != false) {
                    echo '<p>Operazione riuscita - inserimento effettuato</p>';
                    exit();
                } else {
                    echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                    exit();
                }
            }
            break;

        case 'Modifica':    // UPDATE 

            //
            // FARE la cosa che se non è più ricoverato torna libero un letto della stanza
            //
            if (isset($cf) && isset($nome) && isset($cognome) && isset($data_nascita) && isset($residenza)&& isset($telefono) && isset($ricoverato)) {

                echo "DATI inseriti UPDATE: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $ricoverato -- $inizio_ricovero -- $malattia -- $stanza_ricoverato<br><br>";

                if ($ricoverato == 'TRUE') {
                    //echo "ricoverato";

                    // controllo che la camera è libera
                    if (cameraLibera($stanza_ricoverato)) {
                        $dateTimeBirth = new DateTime($data_nascita);
                        $dateTimeRicovero = new DateTime($inizio_ricovero);
                        if ($dateTimeRicovero < $dateTimeBirth) {
                            echo "ERRORE: Date inserite non consistenti, la data di ricovero è venuta prima della nascita";
                        } else {
                            //date OK
                            $query = "UPDATE paziente SET nome='$nome', cognome='$cognome', data_nascita='$data_nascita', residenza='$residenza', telefono='$telefono', ricoverato='$ricoverato', inizio_ricovero='$inizio_ricovero', malattia='$malattia', stanza_ricoverato='$stanza_ricoverato' WHERE cf='$cf'; ";
                            if (databaseQuery($query) != false) {
                                echo '<p>Operazione riuscita - Update effettuato</p>';
                                exit();
                            } else {
                                echo '<p>Operazione non riuscita - errore Update </p>';
                                exit();
                            }
                        }
                    } else {
                        echo "ERRORE:stanza non selezionabile!";
                    }

                } else {
                    //echo "non ricoverato";
                    $query = "UPDATE paziente SET nome='$nome', cognome='$cognome', data_nascita='$data_nascita', residenza='$residenza', telefono='$telefono', ricoverato='$ricoverato', inizio_ricovero=NULL, malattia=NULL, stanza_ricoverato=NULL WHERE cf='$cf'; ";
                    if (databaseQuery($query) != false) {
                        echo '<p>Operazione riuscita - Update effettuato</p>';
                        exit();
                    } else {
                        echo '<p>Operazione non riuscita - errore Update </p>';
                        exit();
                    }
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