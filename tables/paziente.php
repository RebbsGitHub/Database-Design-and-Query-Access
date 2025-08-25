
<?php

// SELECT * FROM paziente
echo '<table>';

echo '<tr>
<th> Codice Fiscale </th>
<th> Nome </th>
<th> Cognome </th>
<th>Data di nascita</th>
<th> Residenza </th>
<th> Telefono</th>
<th> Stato Paziente </th>
<th> Inizio ricovero</th>
<th> Malattia ricovero</th>
<th> Stanza paziente</th>

</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['nome'] . '</td>
    <td>' . $row['cognome'] . '</td>
    <td>' . $row['data_nascita'] . '</td>
    <td>' . $row['residenza'] . '</td>
    <td>' . $row['telefono'] . '</td>
    <td>' . boolWriter($row['ricoverato']) . '</td>
    <td>' . $row['inizio_ricovero'] . '</td>
    <td>' . $row['malattia'] . '</td>
    <td>' . $row['stanza_ricoverato'] . '</td>
    </tr>';
}
echo '</table>';

function boolWriter($text)
{
    if ($text == "t") {
        return 'Attualmente ricoverato';
    } else {
        return 'Non ricoverato';
    }
}

?>