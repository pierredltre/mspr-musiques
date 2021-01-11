  <?php
  include('./includes/header.php');
    require_once('connexion.php');

    $table = $_GET['table'];

    echo(album($table));

    function album($table) {
      $html = <<<EOT
          <form class="col-6" method="post" action="crud.php?create&table={$table}" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-12">
                <label name="nom">Nom de l'album</label>
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
                <label name="single">Single</label>
                <select name="single" class="form-control" required>
                <option value="true">Oui</option>
                <option value="false">Non</option>
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
    include('./includes/footer.php');
    ?>