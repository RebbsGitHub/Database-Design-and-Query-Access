
<?php

// SELECT * FROM prontosoccorso
echo '<table>';

echo '<tr>
<th> Codice Ospedale </th>
<th> Numero Ambulanze </th>


</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['codice_ospedale'] . '</td>
    <td>' . $row['numero_ambulanze'] . '</td>


    </tr>';
}
echo '</table>';
?>