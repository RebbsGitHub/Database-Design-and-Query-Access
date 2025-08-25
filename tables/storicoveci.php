
<?php

// SELECT * FROM storicoveci
echo '<table>';

echo '<tr>
<th> Primario </th>
<th> Vice primario </th>
<th> Giorno inizio Veci </th>
<th> Giorno fine Veci </th>


</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['primario'] . '</td>
    <td>' . $row['viceprimario'] . '</td>
    <td>' . $row['inizio_veci'] . '</td>
    <td>' . $row['fine_veci'] . '</td>
    
    </tr>';
}
echo '</table>';

// non ho inserito il prograssivo
// progressivo_storico_v

?>