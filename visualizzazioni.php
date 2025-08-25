<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedali - Visualizzazioni Organiche</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div id="pagebox">
        <div class="navbar nvb">Visualizzazioni per strutture ospedaliere
            <a href="index.php" style="color:white">Indietro</a>
        </div>

        <div class="pageblock">

            <form name="formModifica" action="visualizzazioni.php" method="POST">

                <label for="codice_ospedale">Visualizza personale ordinato per reparto nella struttura inserita. (nome reparto facoltativo, se non inserito si considerano tutti i reparti)</label><br>
                <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="3" placeholder="Codice ospedale">
                <input type="text" <?php echo (isset($nome_reparto)) ? 'value="' . $nome_reparto . '"'  : "" ?> name="nome_reparto" maxlength="30" placeholder="Nome reparto">
                <input class="buttongenerale" name="nometasto" type="submit" value="VisualizzaPersonale">
            </form>

        </div>

        <div class="pageblock">

            <form name="formModifica" action="visualizzazioni.php" method="POST">

                <label for="codice_ospedale"> Visualizza lo storico dei ricoveri di un paziente in una struttura. (Codice fiscale paziente facoltativo, se non inserito si considerato tutti i pazienti)</label><br>
                <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="3" placeholder="Codice ospedale">
                <input type="text" <?php echo (isset($cf)) ? 'value="' . $cf . '"'  : "" ?> name="cf" maxlength="16" placeholder="Codice fiscale paziente">
                <input class="buttongenerale" name="nometasto" type="submit" value="VisualizzaStorico">
            </form>

        </div>

        <div class="pageblocktable">

            <?php
            session_start();
            include_once 'utils.php';
            //testUtils('ospedalo!');



            if (isset($_POST['nometasto'])) {

                switch ($_POST['nometasto']) {
                    case 'VisualizzaPersonale':
                        $codice_ospedale = addslashes($_POST['codice_ospedale']);
                        $nome_reparto = addslashes($_POST['nome_reparto']);
                        if ($codice_ospedale != "") {

                            if ($nome_reparto == "") {
                                $query = "SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personaleinfermiere WHERE codice_ospedale='$codice_ospedale'
                                        UNION
                                        SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personalemedico WHERE codice_ospedale='$codice_ospedale'
                                        UNION
                                        SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personaleamministrazione WHERE codice_ospedale='$codice_ospedale'
                                        order by lavora_reparto asc"; 
                            } else {
                                $query = "SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personaleinfermiere WHERE codice_ospedale='$codice_ospedale' AND lavora_reparto='$nome_reparto'
                                        UNION
                                        SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personalemedico WHERE codice_ospedale='$codice_ospedale' AND lavora_reparto='$nome_reparto'
                                        UNION
                                        SELECT cf,nome,cognome,data_nascita,residenza,telefono,lavora_reparto,codice_ospedale FROM personaleamministrazione WHERE codice_ospedale='$codice_ospedale' AND lavora_reparto='$nome_reparto'
                                        order by cognome asc"; 
                            }
                    


                            $resoult = databaseQuery($query);
                            if (!$resoult) {
                                exit('Errore: query non andata a buon fine :(');
                            } else {
                                echo '<table>';

                                echo '<tr>
                                            <th> Codice Fiscale </th>
                                            <th> Nome </th>
                                            <th> Cognome </th>
                                            <th> Data di nascita </th>
                                            <th> Residenza </th>
                                            <th> Telefono </th>
                                            <th> lavora nel reparto </th>
                                            <th> codice ospedale - reparto </th>
                                            </tr>';
                                while ($row = pg_fetch_array($resoult)) {
                                    echo '<tr>
                                                <td>' . $row['cf'] . '</td>
                                                <td>' . $row['nome'] . '</td>
                                                <td>' . $row['cognome'] . '</td>
                                                <td>' . $row['data_nascita'] . '</td>
                                                <td>' . $row['residenza'] . '</td>
                                                <td>' . $row['telefono'] . '</td>
                                                <td>' . $row['lavora_reparto'] . '</td>
                                                <td>' . $row['codice_ospedale'] . '</td>
                                                </tr>';
                                }
                                echo '</table>';
                            }
                        }else{
                            echo "Errore: dati mancanti";
                        }
                        break;


                    case 'VisualizzaStorico':
                        $codice_ospedale = addslashes($_POST['codice_ospedale']);
                        $cf = addslashes($_POST['cf']);
                        if ($codice_ospedale != "") {

                            if ($cf == "") {
                                $query = "SELECT storicoricoveri.cf, storicoricoveri.inizio_ricovero, storicoricoveri.fine_ricovero, storicoricoveri.malattia_ricovero, storicoricoveri.stanza_ricovero, stanza.nome_reparto, stanza.codice_ospedale FROM storicoricoveri INNER JOIN stanza ON storicoricoveri.stanza_ricovero = stanza.numero_stanza WHERE codice_ospedale = '$codice_ospedale'
                                        order by storicoricoveri.cf asc";
                            } else {
                                $query = "SELECT storicoricoveri.cf, storicoricoveri.inizio_ricovero, storicoricoveri.fine_ricovero, storicoricoveri.malattia_ricovero, storicoricoveri.stanza_ricovero, stanza.nome_reparto, stanza.codice_ospedale FROM storicoricoveri INNER JOIN stanza ON storicoricoveri.stanza_ricovero = stanza.numero_stanza WHERE codice_ospedale = '$codice_ospedale' AND cf = '$cf'
                                        order by storicoricoveri.cf asc";
                            }



                            $resoult = databaseQuery($query);
                            if (!$resoult) {
                                exit('Errore: query non andata a buon fine :(');
                            } else {
                                echo '<table>';

                                echo '<tr>
                                            <th> Codice Fiscale </th>
                                            <th> Inizio ricovero </th>
                                            <th> Fine ricovero </th>
                                            <th> Motivo - malattia </th>
                                            <th> Stanza ricoverato </th>
                                            <th> Nome reparto ricoverato </th>
                                            <th> Codice ospedale ricoverato </th>
                                            </tr>';
                                while ($row = pg_fetch_array($resoult)) {
                                    echo '<tr>
                                                <td>' . $row['cf'] . '</td>
                                                <td>' . $row['inizio_ricovero'] . '</td>
                                                <td>' . $row['fine_ricovero'] . '</td>
                                                <td>' . $row['malattia_ricovero'] . '</td>
                                                <td>' . $row['stanza_ricovero'] . '</td>
                                                <td>' . $row['nome_reparto'] . '</td>
                                                <td>' . $row['codice_ospedale'] . '</td>
                                                </tr>';
                                }
                                echo '</table>';
                            }
                        } else {
                            echo "Errore: dati mancanti";
                        }
                        break;

                    default:            // Defaut - nulla di selezionato
                        echo "Opzione non valida - Campo vuoto";
                }
            }



            ?>

        </div>

        <!-- 2) Visualizzazione
a. Del personale in organico nei reparti della struttura
b. Dello storico dei ricoveri di un paziente in una struttura -->

    </div><!-- pagebox -->



</body>



</html>


