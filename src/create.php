<?php
require_once './connexion.php';
 
if (!empty($_POST)) {
    $titreAlbum = $_POST['titreAlbum'];
    $dateAlbum = $_POST['dateAlbum'];
    $streamsAlbum = $_POST['streamsAlbum'];
    $genreAlbum = $_POST['genreAlbum'];
    $paysAlbum = $_POST['paysAlbum'];
    $single = $_POST['single'];
  
    if(empty($_FILES['coverAlbum'])){
      $cover = " ";
    } else{
      $cover = basename($_FILES['coverAlbum']['name']);
    }  
    $err = 0;
    if (empty($titreAlbum))
      $err = 1;
    if (empty($dateAlbum))
      $err = 1;
    if (empty($streamsAlbum))
      $err = 1;
    if (empty($genreAlbum))
      $err = 1;
    if (empty($paysAlbum))
      $err = 1;
    if (empty($single))
      $err = 1;

    if ($err == 0) {
      $cover = str_replace(" ", "", $cover);
      $sql = $dbh->prepare("INSERT INTO `ALBUM` (`nom`, `date_de_sortie`, `cover`, `nombre_ecoutes`, `genre`, `pays`, `single`) VALUES (:nom, :date_de_sortie, :cover, :nombre_ecoutes, :genre, :pays, :single)");
      $sql->bindParam(':nom', $titreAlbum);
      $sql->bindParam(':date_de_sortie', $dateAlbum);
      $sql->bindParam(':cover', $cover);
      $sql->bindParam(':nombre_ecoutes', $streamsAlbum);
      $sql->bindParam(':genre', $genreAlbum);
      $sql->bindParam(':pays', $paysAlbum);
      $sql->bindParam(':single', $single);
      
      if (!empty($_FILES['cover'])) {
        $uploadDir = '../uploads/';
        move_uploaded_file($_FILES['cover']['tmp_name'],$uploadDir.$cover);
      }
      if ($sql->execute()) {
        header("Location:./admin.php");
      } else {
        exit('Erreur bdd');
      }
    } else {
      $msg = "Veuillez remplir tout les champs";
      header("Location:./admin.php?msg=$msg");
    }
  }
  ?>