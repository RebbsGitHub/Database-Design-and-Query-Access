<?php

// SELECT * FROM stanza
echo '<table>';

echo '<tr>
<th> Numero Stanza </th>
<th> Reparto </th>
<th> Piano </th>
<th> tipo di stanza </th>
<th> Letti totali </th>
<th> Letti liberi </th>
<th> Codice ospedale </th>
</tr>';

while ($row = pg_fetch_array($resoult)) {

    echo '<tr>
    <td>' . $row['numero_stanza'] . '</td>
    <td>' . $row['nome_reparto'] . '</td>
    <td>' . $row['piano'] . '</td>
    <td>' . boolWriter($row['stanza_ricovero']) . '</td>
    <td>' . $row['letti_tot'] . '</td>
    <td>' . $row['letti_liberi'] . '</td>
    <td>' . $row['codice_ospedale'] . '</td>
    </tr>';
}
echo '</table>';

function boolWriter($text)
{
    if ($text == "t") {
        return 'Stanza per il ricovero';
    } else {
        return 'Stanza Privata';
    }
}