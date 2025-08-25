<?php

// SELECT * FROM personaleinfermiere
echo '<table>';

echo '<tr>
<th> Codice Fiscale </th>
<th> Nome </th>
<th> Cognome </th>
<th> Data di nascita </th>
<th> Residenza </th>
<th> Telefono </th>
<th> Libera reperibilità </th>
<th> lavora nel reparto </th>
<th> codice ospedale - reparto </th>
</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['cf'] . '</td>
    <td>' . $row['nome'] . '</td>
    <td>' . $row['cognome'] . '</td>
    <td>' . $row['data_nascita'] . '</td>
    <td>' . $row['residenza'] . '</td>
    <td>' . $row['telefono'] . '</td>
    <td>' . boolWriter($row['libera_reperibilita']) . '</td>
    <td>' . $row['lavora_reparto'] . '</td>
    <td>' . $row['codice_ospedale'] . '</td>
    </tr>';
}
echo '</table>';

function boolWriter($text){
    if($text == "t")
    {return 'SI';}
    else
    {return 'no';}
}