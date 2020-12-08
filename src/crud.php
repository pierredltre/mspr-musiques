<?php
require_once('connexion.php');

$table = $_GET['table'];
if (isset($_GET['id'])) {
  $id = $_POST['id'];
}
$nom = $_POST['nom'];
$date = $_POST['dateSortie'];
$cover = $_FILES['cover']['name'];
$ecoutes = $_POST['ecoutes'];
$genre = $_POST['genre'];
$pays = $_POST['pays'];
$single = $_POST['single'];

if(isset($_GET['delete']) && !empty($table) && !empty($id)) {

  $sql = 'DELETE FROM ' . $table . ' WHERE album_id = ' . $id;
  if($query = $dbh->query($sql)) {
    echo 'Album supprimé';
  }
}

if(isset($_GET['update']) && !empty($table) && !empty($id)) {
  
  $sql = 'UPDATE ' . $table . ' SET nom = :nom, date_de_sortie = :date, cover = :cover, nombre_ecoutes = :ecoutes, genre = :genre, pays = :pays, single = :single WHERE album_id = ' . $id;
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
    header('Location:./admin.php');
  }

}

if (isset($_GET['create']) && !empty($table)) {
  $sql = "INSERT INTO ALBUM (nom, date_de_sortie, cover, nombre_ecoutes, genre, pays, single) values (:nom, :date_de_sortie, :cover, :nombre_ecoutes, :genre, :pays, :single)";
  $create = $dbh->prepare($sql);
  $create->bindParam(':nom', $nom);
  $create->bindParam(':date', $date);
  $create->bindParam(':cover', $cover);
  $create->bindParam(':ecoutes', $ecoutes);
  $create->bindParam(':genre', $genre);
  $create->bindParam(':pays', $pays);
  $create->bindParam(':single', $single);

  if($create->execute()) {
    header('Location:./admin.php');
  }
}
?>