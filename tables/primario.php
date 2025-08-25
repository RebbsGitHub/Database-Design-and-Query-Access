<?php

// SELECT * FROM primario
echo '<table>';

echo '<tr>
<th> Codice Fiscale </th>
<th> Specializzazione </th>
<th> Dirige il reparto: </th>
<th> Codice ospedale </th>

</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['specializzazione'] . '</td>
    <td>' . $row['dir_nome_reparto'] . '</td>
    <td>' . $row['dir_codice_ospedale'] . '</td>
    </tr>';
}
echo '</table>';


