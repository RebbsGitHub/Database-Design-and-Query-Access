<head>
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<br>
<h4>Area selezionata: Personale Organico nei Reparti</h4><br>

<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Medico')">Medico</button>
    <button class="tablinks" onclick="openTab(event, 'Infermiere')">Infermiere</button>
    <button class="tablinks" onclick="openTab(event, 'Amministrazione')">Amministrazione</button>
</div>

<div id="Medico" class="tabcontent">
    <h3>Medico</h3>
    <form name="formModifica" action="" method="POST">

        <label for="cf">Codice Fiscale</label>
        <input type="text" <?php echo (isset($cf)) ? 'value="' . $cf . '"'  : "" ?> name="cf" maxlength="16"> <br>

        <label for="nome">Nome</label>
        <input type="text" <?php echo (isset($nome)) ? 'value="' . $nome . '"'  : "" ?> name="nome" maxlength="100"><br>

        <label for="cognome">Cognome</label>
        <input type="text" <?php echo (isset($cognome)) ? 'value="' . $cognome . '"'  : "" ?> name="cognome" maxlength="100"><br>

        <label for="data_nascita">Data di Nascita</label>
        <input type="date" <?php echo (isset($data_nascita)) ? 'value="' . $data_nascita . '"'  : "" ?> name="data_nascita" maxlength="100"><br>

        <label for="residenza">Residenza</label>
        <input type="text" <?php echo (isset($residenza)) ? 'value="' . $residenza . '"'  : "" ?> name="residenza" maxlength="100"><br>

        <label for="telefono">Telefono</label>
        <input type="text" <?php echo (isset($telefono)) ? 'value="' . $telefono . '"'  : "" ?> name="telefono" maxlength="10"><br>

        <label for="anzianita">Anzianità</label>
        <input type="text" <?php echo (isset($anzianita)) ? 'value="' . $anzianita . '"'  : "" ?> name="anzianita" maxlength="100"><br>

        <label for="lavora_reparto">nome reparto dove lavora</label>
        <input type="text" <?php echo (isset($lavora_reparto)) ? 'value="' . $lavora_reparto . '"'  : "" ?> name="lavora_reparto" maxlength="100"><br>

        <label for="codice_ospedale">Codice Ospedale</label>
        <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="100"><br>

        <input name="nometasto" type="submit" value="SalvaMedico">
        <input name="nometasto" type="submit" value="ModificaMedico">
    </form>
</div>

<div id="Infermiere" class="tabcontent">
    <h3>Infermiere</h3>
    <form name="formModifica" action="" method="POST">

        <label for="cf">Codice Fiscale</label>
        <input type="text" <?php echo (isset($cf)) ? 'value="' . $cf . '"'  : "" ?> name="cf" maxlength="16"> <br>

        <label for="nome">Nome</label>
        <input type="text" <?php echo (isset($nome)) ? 'value="' . $nome . '"'  : "" ?> name="nome" maxlength="100"><br>

        <label for="cognome">Cognome</label>
        <input type="text" <?php echo (isset($cognome)) ? 'value="' . $cognome . '"'  : "" ?> name="cognome" maxlength="100"><br>

        <label for="data_nascita">Data di Nascita</label>
        <input type="date" <?php echo (isset($data_nascita)) ? 'value="' . $data_nascita . '"'  : "" ?> name="data_nascita" maxlength="100"><br>

        <label for="residenza">Residenza</label>
        <input type="text" <?php echo (isset($residenza)) ? 'value="' . $residenza . '"'  : "" ?> name="residenza" maxlength="100"><br>

        <label for="telefono">Telefono</label>
        <input type="text" <?php echo (isset($telefono)) ? 'value="' . $telefono . '"'  : "" ?> name="telefono" maxlength="100"><br>


        <input type="radio" id="reperibilitaSI" name="libera_reperibilita" value=TRUE>
        <label for="reperibilitaSI">Libera Reperibilità</label><br>
        <input type="radio" id="reperibilitaNO" name="libera_reperibilita" value=FALSE>
        <label for="reperibilitaNO">Reperibilità LIMITATA</label><br>

        <label for="lavora_reparto">Nome reparto dove lavora</label>
        <input type="text" <?php echo (isset($lavora_reparto)) ? 'value="' . $lavora_reparto . '"'  : "" ?> name="lavora_reparto" maxlength="100"><br>

        <label for="codice_ospedale">Codice Ospedale</label>
        <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="100"><br>

        <input name="nometasto" type="submit" value="SalvaInfermiere">
        <input name="nometasto" type="submit" value="ModificaInfermiere">
    </form>
</div>

<div id="Amministrazione" class="tabcontent">
    <h3>Amministrazione</h3>
    <form name="formModifica" action="" method="POST">

        <label for="cf">Codice Fiscale</label>
        <input type="text" <?php echo (isset($cf)) ? 'value="' . $cf . '"'  : "" ?> name="cf" maxlength="16"> <br>

        <label for="nome">Nome</label>
        <input type="text" <?php echo (isset($nome)) ? 'value="' . $nome . '"'  : "" ?> name="nome" maxlength="100"><br>

        <label for="cognome">Cognome</label>
        <input type="text" <?php echo (isset($cognome)) ? 'value="' . $cognome . '"'  : "" ?> name="cognome" maxlength="100"><br>

        <label for="data_nascita">Data di Nascita</label>
        <input type="date" <?php echo (isset($data_nascita)) ? 'value="' . $data_nascita . '"'  : "" ?> name="data_nascita" maxlength="100"><br>

        <label for="residenza">Residenza</label>
        <input type="text" <?php echo (isset($residenza)) ? 'value="' . $residenza . '"'  : "" ?> name="residenza" maxlength="100"><br>

        <label for="telefono">Telefono</label>
        <input type="text" <?php echo (isset($telefono)) ? 'value="' . $telefono . '"'  : "" ?> name="telefono" maxlength="10"><br>

        <label for="livello_accesso">Livello di accesso</label><br>
        <input type="radio" name="livello_accesso" value=1>
        <label>Livello 1</label><br>
        <input type="radio" name="livello_accesso" value=2>
        <label>Livello 2</label><br>
        <input type="radio" name="livello_accesso" value=3>
        <label>Livello 3</label><br>

        <label for="lavora_reparto">nome reparto dove lavora</label>
        <input type="text" <?php echo (isset($lavora_reparto)) ? 'value="' . $lavora_reparto . '"'  : "" ?> name="lavora_reparto" maxlength="100"><br>

        <label for="codice_ospedale">Codice Ospedale</label>
        <input type="text" <?php echo (isset($codice_ospedale)) ? 'value="' . $codice_ospedale . '"'  : "" ?> name="codice_ospedale" maxlength="100"><br>

        <input name="nometasto" type="submit" value="SalvaAmministrazione">
        <input name="nometasto" type="submit" value="ModificaAmministrazione">
</div>

<script>
    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>





<?php
//testUtils('ospedalo!');
if (isset($_POST['nometasto'])) {
    $_GET['operation'] = "personale_struttura"; //struttura


    switch ($_POST['nometasto']) {
        case 'SalvaMedico':       // INSERT medico

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $anzianita = $_POST['anzianita'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti INSERT: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $anzianita -- $lavora_reparto -- $codice_ospedale<br><br>";

            $query = "INSERT INTO Personalemedico (cf, nome, cognome, data_nascita, residenza, telefono, anzianita, lavora_reparto, codice_ospedale) VALUES ('$cf', '$nome', '$cognome', '$data_nascita', '$residenza', '$telefono', '$anzianita', '$lavora_reparto', '$codice_ospedale');";
            if (databaseQuery($query) != false) {
                echo '<p>Operazione riuscita - inserimento effettuato</p>';
                exit();
            } else {
                echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                exit();
            }

            break;


        case 'ModificaMedico':    // UPDATE medico - chiave cf

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $anzianita = $_POST['anzianita'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti UPDATE: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $anzianita -- $lavora_reparto -- $codice_ospedale<br><br>";

            if (isset($cf) && isset($nome) && isset($cognome) && isset($data_nascita) && isset($residenza) && isset($telefono) && isset($anzianita) && isset($lavora_reparto) && isset($codice_ospedale)) {

                $query = "UPDATE Personalemedico SET nome='$nome', cognome='$cognome', data_nascita='$data_nascita', residenza='$residenza', telefono='$telefono', anzianita='$anzianita',lavora_reparto='$lavora_reparto',codice_ospedale='$codice_ospedale' WHERE cf='$cf';";
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
            //------------------------- infermiere
        case 'SalvaInfermiere':       // INSERT Infermiere

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $libera_reperibilita = $_POST['libera_reperibilita'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti INSERT: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $libera_reperibilita -- $lavora_reparto -- $codice_ospedale<br><br>";
            
            $query = "INSERT INTO personaleinfermiere (cf, nome, cognome, data_nascita, residenza, telefono, libera_reperibilita, lavora_reparto, codice_ospedale) VALUES ('$cf', '$nome', '$cognome', '$data_nascita', '$residenza', '$telefono', '$libera_reperibilita', '$lavora_reparto', '$codice_ospedale');";
            if (databaseQuery($query) != false) {
                echo '<p>Operazione riuscita - inserimento effettuato</p>';
                exit();
            } else {
                echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                exit();
            }

            break;


        case 'ModificaInfermiere':    // UPDATE Infermiere - chiave cf

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $libera_reperibilita = $_POST['libera_reperibilita'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti UPDATE: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $libera_reperibilita -- $lavora_reparto -- $codice_ospedale<br><br>";
            
            if (isset($cf) && isset($nome) && isset($cognome) && isset($data_nascita) && isset($residenza) && isset($telefono) && isset($libera_reperibilita) && isset($lavora_reparto) && isset($codice_ospedale)) {

                $query = "UPDATE personaleinfermiere SET nome='$nome', cognome='$cognome', data_nascita='$data_nascita', residenza='$residenza', telefono='$telefono', libera_reperibilita='$libera_reperibilita', lavora_reparto='$lavora_reparto',codice_ospedale='$codice_ospedale' WHERE cf='$cf';";
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
            //-------------------------amministrazione
        case 'SalvaAmministrazione':       // INSERT amministrazione

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $livello_accesso = $_POST['livello_accesso'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti INSERT: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $livello_accesso -- $lavora_reparto -- $codice_ospedale<br><br>";

            $query = "INSERT INTO personaleamministrazione (cf, nome, cognome, data_nascita, residenza, telefono, livello_accesso, lavora_reparto, codice_ospedale) VALUES ('$cf', '$nome', '$cognome', '$data_nascita', '$residenza', '$telefono', '$livello_accesso', '$lavora_reparto', '$codice_ospedale');";
            if (databaseQuery($query) != false) {
                echo '<p>Operazione riuscita - inserimento effettuato</p>';
                exit();
            } else {
                echo '<p>Operazione non riuscita - errore generazione t-upla</p>';
                exit();
            }

            break;


        case 'ModificaAmministrazione':    // UPDATE amministrazione - chiave cf

            $cf = $_POST['cf'];
            $nome = addslashes($_POST['nome']);
            $cognome = addslashes($_POST['cognome']);
            $data_nascita = $_POST['data_nascita'];
            $residenza = addslashes($_POST['residenza']);
            $telefono = $_POST['telefono'];
            $livello_accesso = $_POST['livello_accesso'];
            $lavora_reparto = $_POST['lavora_reparto'];
            $codice_ospedale = $_POST['codice_ospedale'];


            echo "DATI inseriti UPDATE: $cf -- $nome -- $cognome -- $data_nascita -- $residenza -- $telefono -- $livello_accesso -- $lavora_reparto -- $codice_ospedale<br><br>";

            if (isset($cf) && isset($nome) && isset($cognome) && isset($data_nascita) && isset($residenza) && isset($telefono) && isset($livello_accesso) && isset($lavora_reparto) && isset($codice_ospedale)) {

                $query = "UPDATE personaleamministrazione SET nome='$nome', cognome='$cognome', data_nascita='$data_nascita', residenza='$residenza', telefono='$telefono', livello_accesso='$livello_accesso', lavora_reparto='$lavora_reparto',codice_ospedale='$codice_ospedale' WHERE cf='$cf';";
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