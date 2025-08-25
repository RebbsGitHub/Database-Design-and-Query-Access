<?php

// SELECT * FROM reparto
echo '<table>';

echo '<tr>
<th> Codice Ospedale </th>
<th> Nome reparto</th>
<th> Telefono </th>
<th> Inizio orari visite </th>
<th> Fine orari visite </th>

</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['codice_ospedale'] . '</td>
    <td>' . $row['nome_reparto'] . '</td>
    <td>' . $row['telefono'] . '</td>
    <td>' . $row['orari_visite_inizio'] . '</td>
    <td>' . $row['orari_visite_fine'] . '</td>
    </tr>';
}
echo '</table>';
