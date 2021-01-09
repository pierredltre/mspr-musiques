<!DOCTYPE html>
<html>
  <head>
    <title>Modifications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require_once('connexion.php');

    $table = $_GET['table'];
    $id = $_GET['id'];

    if ($table == "ALBUM") {
      $sql = "SELECT * FROM ALBUM WHERE album_id = $id";
      $donnees = $dbh->query($sql);
      foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        echo(album($n, $table, $id));
      }
    }

    function album($donnee, $table, $id) {
      $html = <<<EOT
          <form class="col-6" method="post" action="crud.php?update&table={$table}&id={$id}" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-12">
                <label name="nom">Nom de l'album</label>
                <input name="nom" class="form-control" value="{$donnee['nom']}" required>
              </div>
              <div class="form-group col-12">
                <label name="dateSortie">Date de sortie</label>
                <input name="dateSortie" type="date" class="form-control" value="{$donnee['date_de_sortie']}" required>
              </div>
              <div class="form-group col-12">
                <label name="cover">Cover</label>
                <input type="file" name="cover" class="form-control-file" value="{$donnee['cover']}" required>
              </div>
              <div class="form-group col-12">
                <label name="ecoutes">Nombre d'écoutes</label>
                <input type="number" name="ecoutes" class="form-control" value="{$donnee['nombre_ecoutes']}" required>
              </div>
              <div class="form-group col-12">
                <label name="genre">Genre</label>
                <select name="genre" class="form-control" value="{$donnee['genre']}" required>
                  <option value="RAPFR">Rap FR</option>
                  <option value="RAPUS">Rap US</option>
                  <option value="POP">Pop</option>
                  <option value="JAZZ">Jazz</option>
                  <option value="R&B">R&B</option>
                </select>
              </div>
              <div class="form-group col-12">
              <label name="pays">Pays</label>
              <select name="pays" class="form-control" value="{$donnee['pays']}" required>
                <option value="FR">France</option>
                <option value="USA">États-Unis</option>
                <option value="ESP">Espagne</option>
                <option value="IT">Italie</option>
              </select>
              </div>
              <div class="form-group col-12">
                <label name="single">Single</label>
                <select name="single" class="form-control" value="{$donnee['single']}" required>
                <option value="true">Oui</option>
                <option value="false">Non</option>
              </select>
              </div>
              <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
              </div>
            </div>
          </form>
EOT;
      return $html;
    }

    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
  </body>
</html>
