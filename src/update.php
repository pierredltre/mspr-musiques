
  <?php
    $title = "Update";
    include('./includes/header.php');
    require_once "./includes/connexion.php";

    $table = $_GET['table'];
  
    // Modifier Album
    if ($table == "ALBUM") {
      $albumID = $_GET['albumID'];
      $sql = "SELECT * FROM ALBUM WHERE album_id = $albumID";
      $donnees = $dbh->query($sql);
      foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        
        echo(album($n, $table, $albumID));
      }
    }

    function album($donnee, $table, $id) {
      $html = <<<EOT
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <h2>Modifier l'album {$donnee['nom']}</h2>
          <form class="col-6" method="post" action="crud.php?update&table={$table}&albumID={$id}" enctype="multipart/form-data">
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
                <option value="1">Oui</option>
                <option value="0">Non</option>
              </select>
              </div>
              <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
              </div>
            </div>
          </form>
          </main>
EOT;
      return $html;
    }

    // Modifier chanson
    if ($table == "CHANSON") {
      $chansonID = $_GET['chansonID'];  
      $albumID = $_GET['albumID'];
      $sql = "SELECT * FROM CHANSON WHERE chanson_id = $chansonID";
      $donnees = $dbh->query($sql);
      foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        echo(chanson($n, $table, $chansonID, $albumID));
      }
    }

    function chanson($donnee, $table, $chansonID, $albumID) {
      $html = <<<EOT
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>Modifier la chanson {$donnee['nom']}</h2>
          <form class="col-6" method="post" action="crud.php?updateChanson&table={$table}&chansonID={$chansonID}&albumID={$albumID}" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-12">
                <label name="nom">Titre</label>
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
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
              </div>
            </div>
          </form>
          </main>
EOT;
      return $html;
    }


    include('./includes/footer.php');
?>