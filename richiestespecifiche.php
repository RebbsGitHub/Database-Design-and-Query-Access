<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedali - Query specifiche</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div id="pagebox">
        <div class="navbar nvb"> Area Richieste specifiche
            <a href="index.php" style="color:white">Indietro</a>
        </div>

        <div class="pageblock">
            <form name="formModifica" action="" method="POST">

                <label for="richiestasql"><h6>Seleziona la richiesta</h6></label><br>
                
                <input type="radio" name="richiestasql" value=1>
                <label>Determinare i vice primari che hanno sostituito esattamente una volta il proprio primario</label><br>
                <input type="radio" name="richiestasql" value=2>
                <label>Determinare i vice primari che hanno sostituito almeno due volte il proprio primario</label><br>
                <input type="radio" name="richiestasql" value=3>
                <label>Determinare i vice primari che non hanno mai sostituito il proprio primario</label><br>

                <input name="nometasto" type="submit" value="Visualizza">



        </div>

        <div class="pageblocktable">

            <?php
            session_start();
            include_once 'utils.php';
            //testUtils('ospedalo!');



            if (isset($_POST['richiestasql'])) {



                switch ($_POST['richiestasql']) {
                    case 1:     // Determinare i vice primari che hanno sostituito esattamente una volta il proprio primario
                        $query = "SELECT storicoveci.viceprimario as cf,personalemedico.nome,personalemedico.cognome, count(*) AS numeroVeci from storicoveci INNER JOIN personalemedico ON storicoveci.viceprimario = personalemedico.cf 
                                    group by  storicoveci.viceprimario,personalemedico.nome,personalemedico.cognome
                                    HAVING count(*) =1";
                        $resoult = databaseQuery($query);
                        if (!$resoult) {
                            exit('Errore: query non andata a buon fine :(');
                        } else {
                            echo '<table>';

                            echo '<tr>
                                            <th> Codice Fiscale </th>
                                            <th> Nome </th>
                                            <th> Cognome </th>
                                            <th> n veci </th>
                                            </tr>';
                            while ($row = pg_fetch_array($resoult)) {
                                echo '<tr>
                                                <td>' . $row['cf'] . '</td>
                                                <td>' . $row['nome'] . '</td>
                                                <td>' . $row['cognome'] . '</td>
                                                <td>' . $row['numeroveci'] . '</td>
                                                </tr>';
                            }
                            echo '</table>';
                        }

                        break;

                    case 2:     // Determinare i vice primari che hanno sostituito almeno due volte il proprio primario
                        $query = "SELECT storicoveci.viceprimario as cf,personalemedico.nome,personalemedico.cognome, count(*) AS numeroVeci from storicoveci INNER JOIN personalemedico ON storicoveci.viceprimario = personalemedico.cf 
                                    group by  storicoveci.viceprimario,personalemedico.nome,personalemedico.cognome
                                    HAVING count(*) >=2";
                        $resoult = databaseQuery($query);
                        if (!$resoult) {
                            exit('Errore: query non andata a buon fine :(');
                        } else {
                            echo '<table>';

                            echo '<tr>
                                            <th> Codice Fiscale </th>
                                            <th> Nome </th>
                                            <th> Cognome </th>
                                            <th> n veci </th>
                                            </tr>';
                            while ($row = pg_fetch_array($resoult)) {
                                echo '<tr>
                                                <td>' . $row['cf'] . '</td>
                                                <td>' . $row['nome'] . '</td>
                                                <td>' . $row['cognome'] . '</td>
                                                <td>' . $row['numeroveci'] . '</td>
                                                </tr>';
                            }
                            echo '</table>';
                        }

                        break;
    
                    case 3:     // Determinare i vice primari che non hanno mai sostituito il proprio primario
                        $query = "SELECT viceprimario.cf,personalemedico.nome,personalemedico.cognome from viceprimario INNER JOIN personalemedico ON viceprimario.cf = personalemedico.cf 
                                    except
                                    select storicoveci.viceprimario,personalemedico.nome,personalemedico.cognome from storicoveci INNER JOIN personalemedico ON storicoveci.viceprimario = personalemedico.cf 
                                    group by  storicoveci.viceprimario,personalemedico.nome,personalemedico.cognome
                                    HAVING count(*) >=1";
                        $resoult = databaseQuery($query);
                        if (!$resoult) {
                            exit('Errore: query non andata a buon fine :(');
                        } else {
                            echo '<table>';

                            echo '<tr>
                                            <th> Codice Fiscale </th>
                                            <th> Nome </th>
                                            <th> Cognome </th>
                                            
                                            </tr>';
                            while ($row = pg_fetch_array($resoult)) {
                                echo '<tr>
                                                <td>' . $row['cf'] . '</td>
                                                <td>' . $row['nome'] . '</td>
                                                <td>' . $row['cognome'] . '</td>
                                                
                                                </tr>';
                            }
                            echo '</table>';
                        }
                        break;

                    default:    // Defaut
                        echo "Opzione non valida, riprovare";
                }
                
            } else {
                echo "Errore: selezionare un'opzione";
            }



            ?>

        </div>

        <!-- 3) Interrogazioni
a. Determinare i vice primari che hanno sostituito esattamente una volta il proprio
primario
b. Determinare i vice primari che hanno sostituito almeno due volte il proprio primario
c. Determinare i vice primari che non hanno mai sostituito il proprio primario -->

    </div><!-- pagebox -->



</body>



</html>