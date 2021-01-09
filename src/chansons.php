<?php include './includes/header.php' ?>

<?php
function table_tpl($thead,$rows){
$html = <<<EOT
 
<div class="col-lg-7">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">$thead[0]</th>
      <th scope="col">$thead[1]</th>
      <th scope="col">$thead[2]</th>
      <th scope="col">$thead[3]</th>
      <th scope="col">$thead[4]</th>
      <th scope="col">$thead[5]</th>
    </tr>
  </thead>
    <tbody>
        $rows
    </tbody>
  </table>
</a>
  </div>
EOT;
 
return $html;
 
}
 
function echo_ligne_modeles($donnee)
{
  $html = <<<EOT
      <tr>
        <th scope="row">{$donnee['nom']}</th>
        <td>{$donnee['date_de_sortie']}</td>
        <td>{$donnee['cover']}</td>
        <td>{$donnee['nombre_ecoutes']}</td>
        <td>{$donnee['genre']}</td>
        <td>{$donnee['pays']}</td>
        <td><a href="update.php?table=CHANSON&id={$donnee['chanson_id']}"><button class="btn btn-success">Modifier</button></a></td>
        <td><a href="crud.php?deleteChanson&table=CHANSON&id={$donnee['chanson_id']}"><button class="btn btn-danger">Supprimer</button></a></td>
      </tr>
EOT;
  return $html;
}

$table = $_GET['table'];

function chanson($table) {
  $albumID = $_GET['id'];
  $html = <<<EOT
      <form class="col-5" method="post" action="crud.php?createChanson&table={$table}&albumID={$albumID}" enctype="multipart/form-data">
  <h1>Ajouter une chanson à l'album</h1>

        <div class="row">
          <div class="form-group col-12">
            <label name="nom">Nom de la chanson</label>
            <input name="nom" class="form-control" required>
          </div>
          <div class="form-group col-12">
            <label name="dateSortie">Date de sortie</label>
            <input name="dateSortie" type="date" class="form-control" required>
          </div>
          <div class="form-group col-12">
            <label name="cover">Cover</label>
            <input type="file" name="cover" class="form-control-file" required>
          </div>
          <div class="form-group col-12">
            <label name="ecoutes">Nombre d'écoutes</label>
            <input type="number" name="ecoutes" class="form-control" required>
          </div>
          <div class="form-group col-12">
            <label name="genre">Genre</label>
            <select name="genre" class="form-control" required>
              <option value="RAPFR">Rap FR</option>
              <option value="RAPUS">Rap US</option>
              <option value="POP">Pop</option>
              <option value="JAZZ">Jazz</option>
              <option value="R&B">R&B</option>
            </select>
          </div>
          <div class="form-group col-12">
          <label name="pays">Pays</label>
          <select name="pays" class="form-control" required>
            <option value="FR">France</option>
            <option value="USA">États-Unis</option>
            <option value="ESP">Espagne</option>
            <option value="IT">Italie</option>
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
  $album = $_GET['id'];
  require_once "connexion.php";
  $rows = "";
  $donnees = $dbh->query("SELECT * FROM CHANSON WHERE album_id = $album");

  foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
      $rows .= echo_ligne_modeles($n);
  }
  
  ?>
  <div style="display: flex;">
  
<?php
echo table_tpl(['Chansons de l\'album', 'Date de sortie', 'Cover', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows);
echo chanson($table);
  ?>

</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
 
</html>