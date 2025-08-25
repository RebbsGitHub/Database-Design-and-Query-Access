<?php

// SELECT * FROM salaoperatoria
echo '<table>';

echo '<tr>
<th> Codice Sala operatoria </th>
<th> Codice Ospedale </th>
<th> Sala del reparto </th>
<th> Operazione </th>
<th> Giorno Operazione </th>


</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['progressivo_salaoperatoria'] . '</td>
    <td>' . $row['codice_ospedale'] . '</td>
    <td>' . $row['nome_reparto'] . '</td>
    <td>' . $row['tipo_operazione'] . '</td>
    <td>' . $row['giorno_operazione'] . '</td>
    </tr>';
}
echo '</table>';
