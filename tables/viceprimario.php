<?php

// SELECT * FROM viceprimario
echo '<table>';

echo '<tr>
<th> Codice Fiscale </th>
<th> Data assunzione ruolo </th>
<th> Codice Fiscale del Primario </th>
<th> Reparto del Primario </th>
<th> Codice ospedale </th>

</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['data_assunzione_ruolo'] . '</td>
    <td>' . $row['cf_veci'] . '</td>
    <td>' . $row['dir_nome_reparto'] . '</td>
    <td>' . $row['dir_codice_ospedale'].'</td>

    </tr>';
}
echo '</table>';
?>
