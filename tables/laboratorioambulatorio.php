<?php

// SELECT * FROM laboratorioambulatorio
echo '<table>';
echo '<tr><th> Codice Ospedale </th><th> Nome </th><th> Numero di Tel. </th><th> Orario di apertura </th><th> Orario di chiusura </th><th> Giorno di riposo </th><th> Indirizzo </th></tr>';
while ($row = pg_fetch_array($resoult)) {
    echo '<tr><td>' . $row['codice_ospedale'] . '</td><td>' . $row['nome'] . '</td><td>' . $row['telefono'] . '</td><td>' . $row['orario_apertura'] . '</td><td>' . $row['orario_chiusura'] . '</td><td>' . $row['giorno_chiuso'] . '</td><td>' . $row['indirizzo'] . '</td></tr>';
}
echo '</table>';
