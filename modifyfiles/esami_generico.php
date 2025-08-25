<br>
<h4>Area selezionata: Esami</h4><br>


<form name="formModifica" action="" method="POST">
    <label for="codice_esame">Codice Esame</label>
    <input type="text" <?php echo (isset($codice_esame)) ? 'value="' . $codice_esame . '"'  : "" ?> name="codice_esame" maxlength="3"> (non considerato per l'inserimento - considerato solo per la modifica)<br>

    <label for="descrizione">Descrizione</label>
    <input type="text" <?php echo (isset($descrizione)) ? 'value="' . $descrizione . '"'  : "" ?> name="descrizione" maxlength="100"><br>
    <label for="costo">Costo Esame</label>
    <input type="text" <?php echo (isset($costo)) ? 'value="' . $costo . '"'  : "" ?> name="costo" maxlength="100"><br>

    <label for="pubblico">Tipologia di esame</label><br>
    <input type="radio" name="pubblico" value=TRUE>
    <label>Esame Pubblico</label><br>
    <input type="radio" name="pubblico" value=FALSE>
    <label>Esame Privato</label><br>


    <label for="referto">Referto esame</label>
    <input type="text" <?php echo (isset($referto)) ? 'value="' . $referto . '"'  : "" ?> name="referto" maxlength="200"><br>

    <label for="livello_accesso">Modalità d'esame</label><br>
    <input type="radio" name="esame_specialistico" value=TRUE>
    <label>Specialistico</label><br>
    <input type="radio" name="esame_specialistico" value=FALSE>
    <label>Standard</label><br>

    <label for="appunti_specialistici">Appunti Specialistici</label>
    <input type="text" <?php echo (isset($appunti_specialistici)) ? 'value="' . $appunti_specialistici . '"'  : "" ?> name="appunti_specialistici" maxlength="100"> (Campo non considerato se l'esame non è specialistico)<br>
    <label for="cf_prescrizione_medico">Codice fiscale medico della prescrizione </label>
    <input type="text" <?php echo (isset($cf_prescrizione_medico)) ? 'value="' . $cf_prescrizione_medico . '"'  : "" ?> name="cf_prescrizione_medico" maxlength="16"> (Campo non considerato se l'esame non è specialistico)<br>





    <input name="nometasto" type="submit" value="Salva">
    <input name="nometasto" type="submit" value="Modifica">
</form>

<?php

//testUtils('ospedalo!');

if (isset($_POST['nometasto'])) {
    $_GET['operation'] = "esami_generico"; //struttura


    $codice_esame = $_POST['codice_esame'];
    $descrizione = addslashes($_POST['descrizione']);
    $costo = $_POST['costo'];
    $pubblico = addslashes($_POST['pubblico']);
    $referto = addslashes($_POST['referto']);

    $esame_specialistico = $_POST['esame_specialistico'];
    $appunti_specialistici = addslashes($_POST['appunti_specialistici']);
    $cf_prescrizione_medico = addslashes($_POST['cf_prescrizione_medico']);
    


    switch ($_POST['nometasto']) {

        case 'Salva':       // INSERT 
        echo "DATI inseriti INSERT: codice_esame -- $descrizione -- $costo -- $pubblico -- $referto -- $esame_specialistico -- $appunti_specialistici -- $cf_prescrizione_medico <br><br>";
        if($esame_specialistico == 'TRUE'){
            //echo "SPECIALISTICO";
            $query = "INSERT INTO esame (descrizione, costo, pubblico, referto, esame_specialistico, appunti_specialistici, cf_prescrizione_medico) VALUES ('$descrizione', '$costo', '$pubblico', '$referto', '$esame_specialistico', '$appunti_specialistici', '$cf_prescrizione_medico');";
            if (databaseQuery($query) != false) {
                echo '<p>Operazione riuscita - inserimento effettuato</p>';
                exit();
            } else {
                echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                exit();
            }
        }else{
            //echo "non speciale";
            $query = "INSERT INTO esame (descrizione, costo, pubblico, referto, esame_specialistico,appunti_specialistici, cf_prescrizione_medico) VALUES ('$descrizione', '$costo', '$pubblico', '$referto', '$esame_specialistico', NULL, NULL);";
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
            if (isset($codice_esame) && isset($descrizione) && isset($costo) && isset($pubblico) && isset($pubblico) && isset($esame_specialistico)) {

                echo "DATI inseriti UPDATE: $codice_esame -- $descrizione -- $costo -- $pubblico -- $referto -- $esame_specialistico -- $appunti_specialistici -- $cf_prescrizione_medico <br><br>";

                if ($esame_specialistico == 'TRUE') {
                    //echo "SPECIALISTICO";
                    $query = "UPDATE esame SET descrizione='$descrizione', costo='$costo', pubblico='$pubblico', referto='$referto', esame_specialistico='$esame_specialistico', appunti_specialistici='$appunti_specialistici', cf_prescrizione_medico='$cf_prescrizione_medico' WHERE codice_esame='$codice_esame'; ";
                    if (databaseQuery($query) != false) {
                        echo '<p>Operazione riuscita - Update effettuato</p>';
                        exit();
                    } else {
                        echo '<p>Operazione non riuscita - errore Update </p>';
                        exit();
                    }
                } else {
                    //echo "non speciale";
                    $query = "UPDATE esame SET descrizione='$descrizione', costo='$costo', pubblico='$pubblico', referto='$referto', esame_specialistico='$esame_specialistico', appunti_specialistici=NULL , cf_prescrizione_medico=NULL WHERE codice_esame='$codice_esame'; ";
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