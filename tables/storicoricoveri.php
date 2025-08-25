
<?php

// SELECT * FROM storicoricoveri
echo '<table>';

echo '<tr>
<th> Codice Fiscale paziente </th>
<th> Data inizio ricovero </th>
<th> Data fine ricovero </th>
<th> Causa del ricovero </th>
<th> Stanza occupata durante il ricovero</th>

</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['inizio_ricovero'] . '</td>
    <td>' . $row['fine_ricovero'] . '</td>
    <td>' . $row['malattia_ricovero'] . '</td>
    <td>' . $row['stanza_ricovero'] . '</td> 

    </tr>';
}
echo '</table>';


?>