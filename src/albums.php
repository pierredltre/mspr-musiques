<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        td{
            border : 1px solid black;
        }
    </style>
</head>

<?php
function table_tpl($thead,$rows){
$html = <<<EOT
 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">$thead[0]</th>
      <th scope="col">$thead[1]</th>
      <th scope="col">$thead[2]</th>
      <th scope="col">$thead[3]</th>
      <th scope="col">$thead[4]</th>
      <th scope="col">$thead[5]</th>
      <th scope="col">$thead[6]</th>
      <th scope="col">$thead[7]</th>
    </tr>
  </thead>
    <tbody>
        $rows
    </tbody>
  </table>
EOT;
 
return $html;
 
}
 
function echo_ligne_modeles($donnee)
{
  $html = <<<EOT
      <tr>
        <th scope="row">{$donnee['album_id']}</th>
        <td>{$donnee['nom']}</td>
        <td>{$donnee['date_de_sortie']}</td>
        <td>{$donnee['cover']}</td>
        <td>{$donnee['nombre_ecoutes']}</td>
        <td>{$donnee['genre']}</td>
        <td>{$donnee['pays']}</td>
        <td>{$donnee['single']}</td>
        <td><a href="chansons.php?table=CHANSON&id={$donnee['album_id']}"><button class="btn btn-primary">Ajouter chanson(s)</button></a></td>
        <td><a href="crud.php?delete&table=ALBUM&id={$donnee['album_id']}"><button class="btn btn-success">Supprimer</button></a></td>
        <td><a href="update.php?table=ALBUM&id={$donnee['album_id']}"><button class="btn btn-danger">Modifier</button></a></td>
      </tr>
EOT;
  return $html;
}
 
?>
 
<body>
  <?php

  require_once "connexion.php";
  $rows = "";
  $donnees = $dbh->query("SELECT * FROM ALBUM");
  foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
      $rows .= echo_ligne_modeles($n);
  }
  echo table_tpl(['IDs', 'Liste des albums', 'Date de sortie', 'Cover', 'Nombre d\'écoutes', 'Genre', 'Pays', 'Single'], $rows);
  ?>
  <a href="create.php?create&table=ALBUM">
    <button>Ajouter un album</button>
  </a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
 
</html>