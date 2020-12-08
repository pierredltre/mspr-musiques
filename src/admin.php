<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<div class="container">

<?php

require_once('connexion.php');
$tables = ['ALBUM', 'ARTISTE', 'CHANSON', 'COMPOSE', 'ECRIT'];
$sql = "";

foreach ($tables as $table) {
    echo "<div class=\"row\">";
    $donnees = $dbh->query("SELECT * FROM $table");
    echo "<div class=\"col-lg-6\">";
    echo $table;
    
    echo("<pre>");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $colonnes) {
        // print_r(array_keys($colonnes));
        print_r($colonnes);
        echo "</div>";
        echo "<div class=\"col-lg-6\">";
        // if (array_key_exists("chanson_id", $colonnes) && array_key_exists("chanson_id", $colonnes)) {
        //     formChanson();
        // }
        if ($table == "CHANSON") {
            // echo(formChanson());
        } else if ($table == "ALBUM") {
            echo(formAlbum());
        } else if ($table == "ARTISTE") {
            // formulaireChanson();
        }
        echo "</div>";
    }
    echo("<pre>");
    echo "</div>";
}

function formAlbum() {
    // HEREDOC php
    $html = <<<EOT
        <form action="create.php" method="post" enctype="multipart/form-data">
        <br>
        <h3>Ajouter un Album</h3>
        <label>Nom de l'album</label> <br>
        <input name="titreAlbum" class="form-control" required></input> <br>
        <label>Date de sortie</label> <br>
        <input name="dateAlbum" class="form-control" type="date" required></input> <br>
        <label>Cover</label> <br>
        <input name="coverAlbum" class="form-control-file" type="file"></input> <br>
        <label>Nombre d'écoutes</label> <br>
        <input name="streamsAlbum" class="form-control" type="number" required></input> <br>
        <label>Genre</label>
        <select class="form-control" name="genreAlbum">
            <option value="rapfr">Rap FR</option>
            <option value="rapus">Rap US</option>
            <option value="rnb">RNB</option>
            <option value="jazz">Jazz</option>
        </select> <br>
        <label>Pays</label>
        <select class="form-control" name="paysAlbum">
            <option value="FR">France</option>
            <option value="US">États-Unis</option>
            <option value="IT">Italie</option>
            <option value="DE">Allemagne</option>
            <option value="UK">Royaume-Uni</option>
        </select> <br>
        <label>Single</label>
        <select class="form-control" name="single">
            <option value="true">Oui</option>
            <option value="false">Non</option>
        </select><br>
        <input type="submit"></select> <br>
        </form>
        <br>
    EOT;
 
    return $html;
 }

?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
</body>
</html>