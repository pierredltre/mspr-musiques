<?php
$title = "Gérer les albums";

include('./includes/header.php');

function table_tpl($thead,$rows){
$html = <<<EOT
 
<table class="table table-striped table-sm">
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
      <th scope="col">$thead[8]</th>
      <th scope="col">$thead[9]</th>
      <th scope="col">$thead[10]</th>
      <th scope="col">$thead[11]</th>
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
        <td><img src="../assets/uploads/{$donnee['cover']}" height="40px" ></td>
        <td>{$donnee['nombre_ecoutes']}</td>
        <td>{$donnee['genre']}</td>
        <td>{$donnee['pays']}</td>
        <td><a href="chansons.php?table=CHANSON&id={$donnee['album_id']}"><button class="btn btn-primary">Gérer chanson(s)</button></a></td>
        <td><a href="certifications.php?id={$donnee['album_id']}"><button class="btn btn-primary">Certifications</button></a></td>
        <td><a href="update.php?table=ALBUM&albumID={$donnee['album_id']}"><button class="btn btn-success">Modifier</button></a></td>
        <td><a href="crud.php?delete&table=ALBUM&id={$donnee['album_id']}"><button class="btn btn-danger">Supprimer</button></a></td>
      </tr>
EOT;
  return $html;
}
 
function album($table) {
  $html = <<<EOT
      <form style="padding-left:10px" class="col-12" method="post" action="crud.php?create&table={$table}" enctype="multipart/form-data">
    <h2>Ajouter un album/single</h2>

        <div class="row">
          <div class="form-group col-lg-4 col-sm-12">
            <label name="nom">Nom de l'album</label>
            <input name="nom" class="form-control" required>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label name="dateSortie">Date de sortie</label>
            <input name="dateSortie" type="date" class="form-control" required>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label name="cover">Cover</label>
            <input type="file" name="cover" class="form-control-file" required>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label name="ecoutes">Nombre d'écoutes</label>
            <input type="number" name="ecoutes" class="form-control" required>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label name="genre">Genre</label>
            <select name="genre" class="form-control" required>
              <option value="RAPFR">Rap FR</option>
              <option value="RAPUS">Rap US</option>
              <option value="POP">Pop</option>
              <option value="JAZZ">Jazz</option>
              <option value="R&B">R&B</option>
            </select>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
          <label name="pays">Pays</label>
          <select name="pays" class="form-control" required>
            <option value="FR">France</option>
            <option value="USA">États-Unis</option>
            <option value="ESP">Espagne</option>
            <option value="IT">Italie</option>
          </select>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label name="single">Single</label>
            <select name="single" class="form-control" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
          </select>
          </div>
          <div class="form-group col-12">
          <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
EOT;
  return $html;
}
?>
 
<body>
  <?php
    require_once "./includes/connexion.php";
    $rows = "";
    $single = $_GET['single'];
    if(!isset($single)){
      $donnees = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 0");
    } else {
      $donnees = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 1");
    }
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        $rows .= echo_ligne_modeles($n);
    }

    ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <?php

    echo album('ALBUM');
    echo "<br>";
    echo table_tpl(['IDs', 'Noms', 'Date de sortie', 'Cover', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows);
?>
</main>
<?php include('./includes/footer.php'); ?>