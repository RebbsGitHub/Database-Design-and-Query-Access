<?php

    // SELECT * FROM ospedale
    echo '<table>';
    echo '<tr><th> Codice Ospedale </th><th> Indirizzo </th><th> Regione </th><th> Nome struttura </th></tr>';
    while ($row = pg_fetch_array($resoult)) {
        echo '<tr><td>' . $row['codiceospedale'] . '</td><td>' . $row['indirizzo'] . '</td><td>' . $row['regione'] . '</td><td>' . $row['nome'] . '</td></tr>';
    }
    echo '</table>';

?>