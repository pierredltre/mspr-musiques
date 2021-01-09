<?php
require_once('connexion.php');

$table = $_GET['table'];
$nom = $_POST['nom'];
$date = $_POST['dateSortie'];
$cover = $_FILES['cover']['name'];
$ecoutes = $_POST['ecoutes'];
$genre = $_POST['genre'];
$pays = $_POST['pays'];

if(isset($_GET['delete']) && !empty($table) && !empty($GET['id'])) {
  $id = $_GET['id'];
  $single = $_POST['single'];
  $sql = 'DELETE FROM ' . $table . ' WHERE album_id = ' . $id;
  if($query = $dbh->query($sql)) {
    echo 'Album supprimé';
  }
}

if(isset($_GET['update']) && !empty($table) && !empty($id)) {
  
  $sql = 'UPDATE ' . $table . ' SET nom = :nom, date_de_sortie = :date, cover = :cover, nombre_ecoutes = :ecoutes, genre = :genre, pays = :pays, single = :single WHERE album_id = ' . $id;
  $id = $_GET['id'];
  $single = $_POST['single'];
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

if (isset($_GET['create']) && !empty($table)) {
  $sql = "INSERT INTO ALBUM (album_id, nom, date_de_sortie, cover, nombre_ecoutes, genre, pays, single) values (:id, :nom, :date_de_sortie, :cover, :nombre_ecoutes, :genre, :pays, :single)";
  $idAlbum = $_GET['id'];
  $idChanson = $_GET['idChanson'];
  $single = $_POST['single'];
  $create = $dbh->prepare($sql);
  $create->bindParam(':id', $idAlbum);
  $create->bindParam(':nom', $nom);
  $create->bindParam(':date', $date);
  $create->bindParam(':cover', $cover);
  $create->bindParam(':ecoutes', $ecoutes);
  $create->bindParam(':genre', $genre);
  $create->bindParam(':pays', $pays);
  $create->bindParam(':single', $single);

  if($create->execute()) {
    header('Location:./albums.php');
  }
}

if (isset($_GET['createChanson']) && !empty($album) && !empty($table) == "CHANSON") {
  $albumID = $_GET['album'];
  $sql = "INSERT INTO CHANSON (nom, date_de_sortie, cover, nombre_ecoutes, genre, pays, album_id) values (:nom, :date_de_sortie, :cover, :nombre_ecoutes, :genre, :pays, :id)";
  $create = $dbh->prepare($sql);
  $create->bindParam(':nom', $nom);
  $create->bindParam(':date', $date);
  $create->bindParam(':cover', $cover);
  $create->bindParam(':ecoutes', $ecoutes);
  $create->bindParam(':genre', $genre);
  $create->bindParam(':pays', $pays);
  $create->bindParam(':id', $albumID);

  if($create->execute()) {
    header('Location:./chansons.php');
  } else {
    'erreur';
  }
}