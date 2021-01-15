<?php       require_once('./src/includes/connexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Musicologie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="/mspr-musiques/assets/css/style.css">

  </head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Musicologie</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Prochaines sorties</a>
      <a class="nav-item nav-link" href="#">Nouveautés</a>
      <a class="nav-item nav-link" href="#">Tendances</a>
      <a class="nav-item nav-link" href="#">Classement</a>
      <a class="nav-item nav-link" href="#">Certifications</a>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="700px" src="./assets/img/slides.jpg" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <div class="row rowNew">
    <h2>Dernières sorties</h2>
    <?php       
      $sql = "SELECT * FROM ALBUM ORDER BY `date_de_sortie` DESC LIMIT 3";
      $nouveautes = $dbh->query($sql);   

      // ini_set('display_errors', 1);
      // error_reporting(E_ALL);

      echo "<div class=\"new\">";
      foreach ($nouveautes->fetchAll(PDO::FETCH_ASSOC) as $n) { 
        echo "<div>";
        echo "<img class='newImg' src=\"./assets/uploads/" . $n['cover'] . "\">";
        echo "<h5>" . $n['nom'] . "</h5>";
        echo "<p>artiste</p>";
        echo "<p>" . $n['date_de_sortie'] . "</p>";
        echo "</div>";
      }
      echo "</div>";
    ?>
  </div>

  <div class="row">
    <h2>Clip du moment</h2>
    <iframe width="auto" height="700" src="https://www.youtube.com/embed/" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <div class="row">
    <h2>Dernières certifications</h2>
  <?php       
      $sql = "SELECT * FROM CERTIFICATION ORDER BY `certification_id` DESC LIMIT 3";
      $certifs = $dbh->query($sql);   

      echo "<div class=\"certifs\">";
      foreach ($certifs->fetchAll(PDO::FETCH_ASSOC) as $n) { 
        echo "<div>";
        
        if ($n['titre'] == "Or") {
          echo "<img class='newImg' src=\"./assets/img/or.png\">";
        } else if ($n['titre'] == "Platine") {
          echo "<img class='newImg' src=\"./assets/img/platine.png\">";
        } else {
          echo "<img class='newImg' src=\"./assets/img/diamant.jpg\">";
        }
        echo "<h5>artiste</h5>";
        echo "<p>single/album</p>";
        echo "<p>" . $n['date_obtention'] . "</p>";
        echo "</div>";
      }
      echo "</div>";
    ?>
  </div>
</div>

<footer class="pt-4 my-md-5 pt-md-5 border-top">
  <div class="row">
    <div class="col-5">
      <h5>Musicologie</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Accueil</a></li>
        <li><a class="text-muted" href="#">Tendances</a></li>
        <li><a class="text-muted" href="#">Classement</a></li>
        <li><a class="text-muted" href="#">Nouveautés</a></li>
        <li><a class="text-muted" href="#">Prochaines sorties</a></li>
        <li><a class="text-muted" href="#">Certifications</a></li>
      </ul>
    </div>
    <div class="col-5">
      <h5>Réseaux sociaux</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Twitter</a></li>
        <li><a class="text-muted" href="#">Instagram</a></li>
      </ul>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>