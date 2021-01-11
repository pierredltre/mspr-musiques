<?php
include('./includes/header.php');

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
        <td><a href="chansons.php?table=CHANSON&id={$donnee['album_id']}"><button class="btn btn-primary">Gérer chanson(s)</button></a></td>
        <td><a href="crud.php?delete&table=ALBUM&id={$donnee['album_id']}"><button class="btn btn-success">Supprimer</button></a></td>
        <td><a href="update.php?table=ALBUM&albumID={$donnee['album_id']}"><button class="btn btn-danger">Modifier</button></a></td>
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

<?php include('./includes/footer.php'); ?>