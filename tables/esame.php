
<?php

// SELECT * FROM esame
echo '<table>';

echo '<tr>
<th> Codice Esame </th>
<th> Descrizione </th>
<th> Costo </th>
<th> Tipologia </th>
<th> Referto (se già eseguito) </th>
<th> Esame specialistico </th>
<th> Appunti del medico (esame specialistico)</th>
<th> Codice Fiscale medio (esame specialistico) </th>
</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['codice_esame'] . '</td>
    <td>' . $row['descrizione'] . '</td>
    <td>' . $row['costo'] . '</td>
    <td>' . boolWriterPubblico($row['pubblico']) . '</td>
    <td>' . $row['referto'] . '</td>
    <td>' . boolWriterSpecialistico($row['esame_specialistico']) . '</td>
    <td>' . $row['appunti_specialistici'] . '</td>
    <td>' . $row['cf_prescrizione_medico'] . '</td>
    </tr>';
}
echo '</table>';

function boolWriterPubblico($text)
{
    if ($text == "t") {
        return 'Esame Pubblico';
    } else {
        return 'Esame Privato';
    }
}
function boolWriterSpecialistico($text)
{
    if ($text == "t") {
        return 'SI';
    } else {
        return 'no';
    }
}
?>