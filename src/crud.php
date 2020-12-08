<?php
require_once('connexion.php');

$table = $_GET['table'];
$id = $_GET['id'];

if(isset($_GET['delete']) && !empty($table) && !empty($id)) {

  $sql = 'DELETE FROM ' . $table . ' WHERE album_id = ' . $id;
  if($query = $dbh->query($sql)) {
    echo 'Album supprimé';
  }
}

if(isset($_GET['update']) && !empty($table) && !empty($id)) {

  $sql = 'UPDATE ' . $table . ' WHERE album_id = ' . $id;
  if($query = $dbh->query($sql)) {
    echo 'Album supprimé';
  }
}
?>