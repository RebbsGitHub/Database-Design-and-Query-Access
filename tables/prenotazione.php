
<?php

// SELECT * FROM prenotazione
echo '<table>';

echo '<tr>
<th> Codice Esame </th>
<th> Codice Fiscale paziente </th>
<th> Data fissata esame </th>
<th> Ora fissata esame </th>
<th> Urgenza</th>
<th> Data della prenotazione </th>

<th> Codice Ospedale</th>
<th> Nome Laboratorio del esame </th>
</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['codice_esame'] . '</td>
    <td>' . $row['cf_paziente'] . '</td>
    <td>' . $row['data_esame'] . '</td>
    <td>' . $row['ora_esame'] . '</td>
    <td>' . $row['urgenza'] . '</td>
    <td>' . $row['data_prenotazione'] . '</td>
    
    <td>' . $row['cod_osp_lab'] . '</td>
    <td>' . $row['nome_lab'] . '</td>
    </tr>';
}
echo '</table>';

?>