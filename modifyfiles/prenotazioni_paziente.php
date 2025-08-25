<br>
<h4>Area selezionata: Prenotazione esami</h4>
<h6>Se viene generata una prenotazione verrà consecutivamente creato anche un esame senza referto, pronto alla modifica quando sarà eseguito, l'esame avrà come Descrizione codicefiscale del paziente, data e ora dell'esame. <br> La modifica dele eventuali prenotazioni non considererà la data della prenotazione, questa rimarrà invariata rispetto il primo inserimento.</h6>
<br>
<form name="formModifica" action="" method="POST">

    <label for="codice_esame">Codice Esame relativo</label>
    <input type="text" <?php echo (isset($codice_esame)) ? 'value="' . $codice_esame . '"'  : "" ?> name="codice_esame" maxlength="10"> (non considerato per l'inserimento - considerato solo per la modifica)<br>
    <label for="cf_paziente">Codice Fiscale Paziente relativo</label>
    <input type="text" <?php echo (isset($cf_paziente)) ? 'value="' . $cf_paziente . '"'  : "" ?> name="cf_paziente" maxlength="16" required><br>

    <label for="data_prenotazione">Data della prenotazione</label>
    <input type="date" <?php echo (isset($data_prenotazione)) ? 'value="' . $data_prenotazione . '"'  : "" ?> name="data_prenotazione" maxlength="100" required> (Per eseguire la modifica inserire la data originale della prenotazione)<br> 
    <label for="data_esame">Data dell'esame</label>
    <input type="date" <?php echo (isset($data_esame)) ? 'value="' . $data_esame . '"'  : "" ?> name="data_esame" maxlength="200" required><br>
    <label for="ora_esame">Ora dell'esame</label>
    <input type="time" <?php echo (isset($ora_esame)) ? 'value="' . $ora_esame . '"'  : "" ?> name="ora_esame" maxlength="100" required> <br>

    <label for="urgenza">Urgenza</label><br>
    <input type="radio" name="urgenza" value="bassa" required>
    <label>Bassa</label><br>
    <input type="radio" name="urgenza" value="media" required>
    <label>Media</label><br>
    <input type="radio" name="urgenza" value="alta" required>
    <label>Alta</label><br>

    <label for="nome_lab">Nome laboratorio/ambulatorio </label>
    <input type="text" <?php echo (isset($nome_lab)) ? 'value="' . $nome_lab . '"'  : "" ?> name="nome_lab" maxlength="30" required><br>
    <label for="cod_osp_lab">Codice ospedale del laboratorio </label>
    <input type="text" <?php echo (isset($cod_osp_lab)) ? 'value="' . $cod_osp_lab . '"'  : "" ?> name="cod_osp_lab" maxlength="100" required> <br>



    <input name="nometasto" type="submit" value="Salva">
    <input name="nometasto" type="submit" value="Modifica">
</form>

<?php

//testUtils('ospedalo!'); DELETE FROM esame WHERE codice_esame=35;

if (isset($_POST['nometasto'])) {
    $_GET['operation'] = "prenotazioni_paziente"; //struttura


    $codice_esame = $_POST['codice_esame'];
    $cf_paziente = $_POST['cf_paziente'];
    $data_prenotazione = $_POST['data_prenotazione'];
    $data_esame = $_POST['data_esame'];
    $ora_esame = $_POST['ora_esame'];
    $urgenza = $_POST['urgenza'];
    $nome_lab = addslashes($_POST['nome_lab']);
    $cod_osp_lab = $_POST['cod_osp_lab'];





    switch ($_POST['nometasto']) {

        case 'Salva':       // INSERT 

            echo "DATI inseriti INSERT: codice_esame -- $cf_paziente -- $data_prenotazione -- $data_esame -- $ora_esame -- $urgenza -- $nome_lab -- $cod_osp_lab <br><br>";


            $dateTimePrenotazione = new DateTime($data_prenotazione);
            $dateTimeEsame = new DateTime($data_esame);
            if ($dateTimePrenotazione > $dateTimeEsame) {
                echo "ERRORE: Date inserite non consistenti, la data di prenotazione è venuta dopo dell'esame / data posteriore a quella di oggi";
            } else {
                $customDescrizione = $cf_paziente . $data_esame . $ora_esame;
                $query = "INSERT INTO esame (descrizione, costo, pubblico, referto, esame_specialistico, appunti_specialistici, cf_prescrizione_medico) VALUES ('$customDescrizione', '0', 'TRUE', NULL, 'FALSE', NULL, NULL);
                              SELECT codice_esame FROM public.esame where descrizione ='$customDescrizione';";
                $select_result = databaseQuery($query);
                if (!$select_result) {
                    echo '<p>Operazione non riuscita - errore Generazione del esame placeholder </p>';
                    exit();
                } else {
                    echo '<p>Operazione  riuscita - Generazione del esame placeholder avvenuta -> ' . $customDescrizione . ' </p>';
                    $row = pg_fetch_assoc($select_result);
                    if ($row) {
                        $codice_esame = $row['codice_esame'];
                        $pren_query = "INSERT INTO prenotazione (codice_esame,cf_paziente,data_esame,urgenza,data_prenotazione,ora_esame,cod_osp_lab,nome_lab) VALUES ('$codice_esame','$cf_paziente','$data_esame','$urgenza','$data_prenotazione','$ora_esame','$cod_osp_lab','$nome_lab')";
                        if (databaseQuery($pren_query) != false) {
                            echo '<p>Operazione riuscita - Insert prenotazione effettuato</p>';
                            exit();
                        } else {
                            echo '<p>Operazione non riuscita - errore Insert prenotazione! </p>';
                            exit();
                        }
                    }
                }
            }
            break;

        case 'Modifica':    // UPDATE 
            if (isset($codice_esame) && isset($cf_paziente) && isset($data_esame) && isset($ora_esame) && isset($urgenza) && isset($nome_lab) && isset($cod_osp_lab)) {

                echo "DATI inseriti UPDATE: $codice_esame-- $cf_paziente -- data_prenotazione -- $data_esame -- $ora_esame -- $urgenza -- $nome_lab -- $cod_osp_lab <br><br>";

                $query = "UPDATE prenotazione SET cf_paziente='$cf_paziente', data_esame='$data_esame', ora_esame='$ora_esame', urgenza='$urgenza', nome_lab='$nome_lab', cod_osp_lab='$cod_osp_lab' WHERE codice_esame='$codice_esame'; ";
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