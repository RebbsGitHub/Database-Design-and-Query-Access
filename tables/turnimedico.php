
<?php

// SELECT * FROM turnimedico
echo '<table>';

echo '<tr>
<th> Codice Fiscale medico </th>
<th> Giorno della settimana </th>
<th> Inizio turno </th>
<th> Fine turno </th>
<th> Codice Ospedale </th>
</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['giorno'] . '</td>
    <td>' . $row['inizio_turno'] . '</td>
    <td>' . $row['fine_turno'] . '</td>
    <td>' . $row['codice_ospedale'] . '</td>
    </tr>';
}
echo '</table>';


?>