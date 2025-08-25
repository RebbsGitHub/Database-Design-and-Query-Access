<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedali - home</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div id="pagebox">
        <div class="navbar nvb">Ospedali</div>


        <div class="pageblock">

            <form action="index.php" method="get">
                <label for="table">Seleziona la tabella interessata</label>
                <select name="table" id="table">

                    <option class="firstoption" value="ospedale">Strutture Ospedaliere</option>
                    <option value="laboratorioambulatorio">Laboratori e Ambulatori</option>

                    <option class="firstoption" value="personalemedico">Medici</option>
                    <option value="personaleinfermiere">Infermieri</option>
                    <option value="personaleamministrazione">Personale d'amministrazione</option>

                    <option class="firstoption" value="reparto">Reparti</option>
                    <option value="salaoperatoria">Sale operatorie</option>
                    <option value="stanza">Stanze delle strutture</option>
                    <option value="primario">Lista medici Primari</option>
                    <option value="viceprimario">Lista vicePrimari</option>
                    <option value="storicoveci">Storico veci</option>

                    <option class="firstoption" value="esame">Esami</option>
                    <option value="prenotazione">Lista prenotazioni Esami</option>
                    <option value="paziente">Lista pazienti</option>
                    <option value="storicoricoveri">Storico dei ricoveri</option>

                    <option class="firstoption" value="prontosoccorso">ProntoSoccorsi annessi</option>
                    <option value="turnimedico">Turni Medici - Pronto Soccorso</option>
                    <option value="turniinfermiere">Turni Infermieri - Pronto Soccorso</option>

                </select>
                <input class="buttongenerale" type="submit" value="Visualizza">
            </form>


        </div>
        <div class="pageblock"><button class="buttongenerale" onclick="window.location='modifyTable.php';">1- Inserimento/modifica dati</button></div>
        <div class="pageblock"><button class="buttongenerale" onclick="window.location='visualizzazioni.php';">2- Informazioni della struttura</button></div>
        <div class="pageblock"><button class="buttongenerale" onclick="window.location='richiestespecifiche.php';">3- Richieste specifiche</button></div>
        <div class="pageblocktable">

            <?php
            session_start();

            include_once 'utils.php';

            if (isset($_GET['table'])) {


                $tabella = $_GET['table'];
                echo "<p>Tabella selezionata: $tabella<p>";

                $resoult = databaseQuery("SELECT * FROM $tabella");
                if (!$resoult) {
                    exit('Errore: query non andata a buon fine :(');
                } else {
                    include_once 'tables/' . $tabella . '.php';
                }
            } else {
                echo "Nessuna tabella selezionata";
            }

            ?>

        </div>

        <!-- Inserimento e modifica
        a. Di una struttura
        b. Del personale in organico nei reparti della struttura
        c. Degli esami
        d. Dei pazienti e delle loro prenotazioni -->

    </div><!-- pagebox -->



</body>



</html>