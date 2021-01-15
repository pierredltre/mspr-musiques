<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$title = "CRUD";
require_once "./includes/connexion.php";

// Déclarations
$table = $_GET['table'];
$nom = $_POST['nom'];
$date = $_POST['dateSortie'];

if(empty($_FILES['cover'])){
  $cover = "empty.png";
} else{
  $cover = basename($_FILES['cover']['name']);
}  

$ecoutes = $_POST['ecoutes'];
$genre = $_POST['genre'];
$pays = $_POST['pays'];
$albumID = $_GET['albumID'];
$chansonID = $_GET['chansonID'];

// Supprimer Album
if(isset($_GET['delete']) && !empty($table) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = 'DELETE FROM ALBUM WHERE album_id = ' . $id;
  if($query = $dbh->query($sql)) {
    header('Location:./albums.php');
    echo 'Album supprimé';
  }
}

// Modifier Album
if(isset($_GET['update']) && !empty($table) && !empty($albumID)) {
  $sql = 'UPDATE ' . $table . ' SET nom = :nom, date_de_sortie = :date, cover = :cover, nombre_ecoutes = :ecoutes, genre = :genre, pays = :pays, single = :single WHERE album_id = ' . $albumID;
  $single = $_POST['single'];

  if ($single == true) {
    $single = 1;
  } else {
    $single = 0;
  }

  $update = $dbh->prepare($sql);
  $update->bindParam(':nom', $nom);
  $update->bindParam(':date', $date);
  $update->bindParam(':cover', $cover);
  $update->bindParam(':ecoutes', $ecoutes);
  $update->bindParam(':genre', $genre);
  $update->bindParam(':pays', $pays);
  $update->bindParam(':single', $single);

  
  if($update->execute()) {
    echo 'Album mis à jour';
    header('Location:./albums.php');
  }
}

// Créer Album
if (isset($_GET['create']) && !empty($table)) {

  if (!empty($_FILES['cover'])) {
    $uploadDir = '../assets/uploads/';
    move_uploaded_file($_FILES['cover']['tmp_name'],$uploadDir.$cover);
  }

  $sql = "INSERT INTO ALBUM (`nom`, `date_de_sortie`, `cover`, `nombre_ecoutes`, `genre`, `pays`, `single`) values (:nom, :date_de_sortie, :cover, :ecoutes, :genre, :pays, :single)";
  $single = $_POST['single'];

  $create = $dbh->prepare($sql);
  $create->bindParam(':nom', $nom);
  $create->bindParam(':date_de_sortie', $date);
  $create->bindParam(':cover', $cover);
  $create->bindParam(':ecoutes', $ecoutes);
  $create->bindParam(':genre', $genre);
  $create->bindParam(':pays', $pays);
  $create->bindParam(':single', $single);

  if($create->execute()) {
    header('Location:./albums.php');
  }
}

// Ajouter une chanson à un album / single
if (isset($_GET['createChanson']) && !empty($_GET['albumID']) && !empty($table)) {
  
  $sql = "INSERT INTO CHANSON (`nom`, `date_de_sortie`, `cover`, `nombre_ecoutes`, `genre`, `pays`, `album_id`) values (:nom, :date_de_sortie, :cover, :nombre_ecoutes, :genre, :pays, :album_id);";
  $create = $dbh->prepare($sql);
  $create->bindParam(':nom', $nom);
  $create->bindParam(':date_de_sortie', $date);
  $create->bindParam(':cover', $cover);
  $create->bindParam(':nombre_ecoutes', $ecoutes);
  $create->bindParam(':genre', $genre);
  $create->bindParam(':pays', $pays);
  $create->bindParam(':album_id', $albumID);

  if($create->execute()) {
    header('Location:./chansons.php?table=CHANSON&id=' . $albumID);
  } else {
    'erreur';
  }
}

// Supprimer Chanson
if (isset($_GET['deleteChanson']) && !empty($_GET['chansonID']) && !empty($table)) { 
  echo "ok";
  $id = $_GET['chansonID'];
  $sql = 'DELETE FROM ' . $table . ' WHERE chanson_id = ' . $id;
  if($query = $dbh->query($sql)) {
    header('Location:./albums.php');
  }
}

// Modifier Chanson
if(isset($_GET['updateChanson']) && !empty($table) && !empty($chansonID)) {
  $sql = 'UPDATE `CHANSON` SET `nom` = :nom, `date_de_sortie` = :dateSortie, `cover` = :cover, `nombre_ecoutes` = :ecoutes, `genre` = :genre, `pays` = :pays WHERE chanson_id = ' . $chansonID;
  $update = $dbh->prepare($sql);
  $update->bindParam(':nom', $nom);
  $update->bindParam(':dateSortie', $date);
  $update->bindParam(':cover', $cover);
  $update->bindParam(':ecoutes', $ecoutes);
  $update->bindParam(':genre', $genre);
  $update->bindParam(':pays', $pays);

  if($update->execute()) {
    echo 'Chanson mise à jour';
    header('Location:./chansons.php?table=CHANSON&id=' . $albumID);
  }
}

// Attribuer certification
if (isset($_GET['certif']) && !empty($_GET['albumID'])) {
  
  $sql = "INSERT INTO CERTIFICATION (`titre`, `date_obtention`, `single`) values (:titre, :date_obtention, :single);";
  $create = $dbh->prepare($sql);
  $titre = $_POST['certif'];
  $date_obtention = $_POST['obtention'];
  $single = $_POST['single'];
  $id = $_GET['id'];

  $create->bindParam(':titre', $titre);
  $create->bindParam(':date_obtention', $date_obtention);
  $create->bindParam(':single', $single);

  if($create->execute()) {
    $donnees = $dbh->query("SELECT certification_id FROM `CERTIFICATION` ORDER BY `certification_id` DESC LIMIT 1;");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $donnee) {
      $id = $_GET['albumID'];

      $sql = "INSERT INTO EST_DELIVREE_A (`album_id`, `certification_id`) values (:id, :certif_ID)";
      $addC = $dbh->prepare($sql);
      $addC->bindParam(':id', $id);
      $addC->bindParam(':certif_ID', $donnee['certification_id']);
    }

    if($addC->execute()) {
      header('Location:./certifications.php?all');
    }
  } else {
    'erreur';
  }
}

// Supprimer Certification
if (isset($_GET['deleteCertif']) && !empty($_GET['id'])) { 
  echo "ok";
  $id = $_GET['id'];
  $sql = 'DELETE FROM EST_DELIVREE_A WHERE certification_id = ' . $id;

  if($query = $dbh->query($sql)) {
    $sql = 'DELETE FROM CERTIFICATION WHERE certification_id = ' . $id;
    if($query = $dbh->query($sql)) {
      header('Location:./certifications.php');

    }
  }
}