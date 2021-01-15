<?php
require_once "../src/includes/connexion.php";
$title = "Back-office";
include './includes/header.php';

function table_tpl($thead,$rows,$classement){
  if ($classement) {
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
      </tr>
    </thead>
      <tbody>
          $rows
      </tbody>
    </table>
  EOT;
  } else {
    $html = <<<EOT
   
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">$thead[0]</th>
        <th scope="col">$thead[1]</th>
        <th scope="col">$thead[2]</th>
        <th scope="col">$thead[3]</th>
        <th scope="col">$thead[4]</th>
      </tr>
    </thead>
      <tbody>
          $rows
      </tbody>
    </table>
  EOT;
  }
   
  return $html;
   
  }
   
  function echo_ligne_modeles($donnee, $nombre, $classement)
  {
    if ($classement) {
      $html = <<<EOT
        <tr>
          <td>{$nombre}</td>
          <td>{$donnee['nom']}</td>
          <td>{$donnee['date_de_sortie']}</td>
          <td>{$donnee['nombre_ecoutes']}</td>
          <td>{$donnee['genre']}</td>
          <td>{$donnee['pays']}</td>
        </tr>
  EOT;
    } else {
      $html = <<<EOT
        <tr>
          <td>{$donnee['nom']}</td>
          <td>{$donnee['date_de_sortie']}</td>
          <td>{$donnee['nombre_ecoutes']}</td>
          <td>{$donnee['genre']}</td>
          <td>{$donnee['pays']}</td>
        </tr>
  EOT;
    }

    return $html;
  }
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container col-12">
  <div class="row">
    <div class="col-6">
      <h2>Derniers albums ajoutés</h2>
      <?php 
        $rows = "";
        $nombre = 0;
        $classement = false;
        $donnees = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 0 ORDER BY `date_de_sortie` DESC LIMIT 10");
        foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);

      ?>
    </div>

    <div class="col-6">
        <h2>Classement global des albums</h2>
      <?php
        $rows = "";
        $nombre = 0;

        $classement = true;
        $donneesF = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 0 ORDER BY `nombre_ecoutes` DESC LIMIT 10");
        foreach ($donneesF->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $nombre++;
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['N°', 'Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h2>Derniers singles ajoutés</h2>
      <?php 
        $rows = "";
        $nombre = 0;
        $classement = false;
        $donnees = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 1 ORDER BY `date_de_sortie` DESC LIMIT 10");
        foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);

      ?>
    </div>

    <div class="col-6">
      <h2>Classement global des singles</h2>

      <?php
        $rows = "";
        $nombre = 0;

        $classement = true;
        $donneesF = $dbh->query("SELECT * FROM ALBUM WHERE `single` = 1 ORDER BY `nombre_ecoutes` DESC LIMIT 10");
        foreach ($donneesF->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $nombre++;
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['N°', 'Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
    <div class="row col-12">
    <h2>Dernières chansons ajoutées</h2>
      </div>
      <?php 
        $rows = "";
        $nombre = 0;
        $classement = false;
        $donnees = $dbh->query("SELECT * FROM CHANSON ORDER BY `date_de_sortie` DESC LIMIT 10");
        foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);

      ?>
    </div>

    <div class="col-6">
      <h2>Classement global des chansons</h2>
      <?php
        $rows = "";
        $nombre = 0;

        $classement = true;
        $donneesF = $dbh->query("SELECT * FROM CHANSON ORDER BY `nombre_ecoutes` DESC LIMIT 10");
        foreach ($donneesF->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $nombre++;
            $rows .= echo_ligne_modeles($n, $nombre, $classement);
        }
        echo table_tpl(['N°', 'Liste des albums', 'Date de sortie', 'Nombre d\'écoutes', 'Genre', 'Pays'], $rows, $classement);
      ?>
    </div>
  </div>
</div>
      </main>
<?php include './includes/footer.php'; ?>