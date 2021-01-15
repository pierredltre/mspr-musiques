<?php 

require_once('./includes/connexion.php');
$title = "Certifications";
include ('./includes/header.php');

function album($id) {
  $html = <<<EOT
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <h2>Attribuer une certification</h2>
      <form class="col-6" method="post" action="crud.php?certif&albumID={$id}" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col-12">
            <label name="certif">Certification</label>
            <select name="certif" class="form-control" required>
              <option value="Or">Or</option>
              <option value="Platine">Platine</option>
              <option value="Diamant">Diamant</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label name="obtention">Date d'obtention</label>
            <input name="obtention" type="date" class="form-control" required>
          </div>
          <div class="form-group col-12">
            <label name="single">Single</label>
            <select name="single" class="form-control" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
          </select>
          </div>
          <div class="form-group col-12">
          <button type="submit" class="btn btn-primary">Attribuer certification</button>
          </div>
        </div>
      </form>
      </main>
EOT;
  return $html;
}

function table_tpl($thead,$rows){
  $html = <<<EOT
   
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">$thead[0]</th>
        <th scope="col">$thead[1]</th>
        <th scope="col">$thead[2]</th>
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
          <th scope="row">{$donnee['titre']}</th>
          <td>{$donnee['date_obtention']}</td>
          <td><a href="crud.php?deleteCertif&id={$donnee['certification_id']}"><button class="btn btn-danger">Supprimer</button></a></td>
        </tr>
  EOT;
    return $html;
  }

if(isset($_GET['id'])) {
  $albumID = $_GET['id'];
  echo(album($albumID));
  
} 

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<?php
  $rows = " ";
  $donnees = $dbh->query("SELECT * FROM CERTIFICATION");
  foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
    $rows .= echo_ligne_modeles($n);
  }
  echo table_tpl(['Titre', 'Date d\'obtention'], $rows);
?>
</main>

<?php include ('./includes/footer.php'); ?>