<?php

require_once('connexion.php');
$tables = ['ALBUM', 'ARTISTE', 'CHANSON', 'COMPOSE', 'ECRIT'];
$sql = "";

// foreach ($tables as $table) {
//     $sql .= "SELECT * FROM :tableaux";
//     $result = $dbh->prepare($sql);
//     $result->bindParam(':tableaux', $table);
// }

// $result->execute();
// echo "<pre>";
// echo($result);
// echo "</pre>";

foreach ($tables as $table) {
    $donnees = $dbh->query("SELECT * FROM $table");
    echo $table;
    echo("<pre>");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $colonnes) {
        // print_r(array_keys($colonnes));
        print_r($colonnes);
        // echo $colonnes['nom'];

        if (array_key_exists("chanson_id", $colonnes)) {
            formulaireChanson();
        }

        if ($table == "CHANSON") {
            formulaireChanson();
        } else if ($table == "ALBUM") {
            // formulaireChanson();
        } else if ($table == "ARTISTE") {
            // formulaireChanson();
        }
    }
    echo("<pre>");
}
// Refaire function

// function formulaireChanson() {
//     echo "<br>";
//     echo "<h3>Ajouter une chanson</h3>";
//     echo "<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\">";
//     echo "<label>Nom de la chanson</label> <br>";
//     echo "<input></input> <br>";
//     echo "<label>Date de sortie</label> <br>";
//     echo "<input type=\"date\"></input> <br>";
//     echo "<label>Cover</label> <br>";
//     echo "<input type=\"file\"></input> <br>";
//     echo "<label>Nombre d'écoutes</label> <br>";
//     echo "<input></input> <br>";
//     echo "<input type=\"submit\"></select> <br>";
//     echo "</form>";
//     echo "<br>";
// }