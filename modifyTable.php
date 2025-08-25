<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedali - modifica</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div id="pagebox">
        <div class="navbar nvb">pagina di Modifica tabelle

            <a href="index.php" style="color:white">Indietro</a>
        </div>


        <div class="pageblock">

            <form action="modifyTable.php" method="get">
                <label for="table">Seleziona la tabella da modificare</label>
                <select name="operation" id="table">
                    <option value="struttura">Struttura Ospedaliera</option>
                    <option value="personale_struttura">Personale Organico nei reparti di una struttura</option>
                    <option value="esami_generico">Esami</option>
                    <option value="pazienti">Pazienti</option>
                    <option value="prenotazioni_paziente">Prenotazioni dei pazienti</option>

                </select>
                <input class="buttongenerale" type="submit" value="Visualizza">
            </form>

        </div>
        <div class="pageblocktable">

            <?php
            session_start();

            include_once 'utils.php';

            if (isset($_GET['operation'])) {

                $operazione = $_GET['operation'];
                include_once 'modifyfiles/' . $operazione . '.php';
            } else {
                echo "Nessuna Operazione selezionata!";
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