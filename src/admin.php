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
    echo("<pre>");
    foreach ($donnees as $colonnes) {
        print_r($colonnes);
        // echo $colonnes['nom'];
    }
    echo("<pre>");
}

// function form() {
//     echo "<form>";
//     echo "<label></label>";
//     echo "</form>";
// }