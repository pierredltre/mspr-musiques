<?php include 'src/includes/header.php' ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Prochaines sorties <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#">Nouveautés </a>
                <a class="nav-item nav-link active" href="#">Tendances</a>
                <a class="nav-item nav-link active" href="#">Classements</a>
                <a class="nav-item nav-link active" href="#">Certifications</a>
              
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
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
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
    <div class="container-fluid">
        <div class="row">

        </div>
        <?php
        require "src/connexion.php";
        $donnees = $dbh->query("SELECT * FROM ALBUM");
        echo ("<pre>");
        foreach ($donnees as $n) {
            print_r($n);
        }
        echo ("</pre>");
        ?>


        <div class="row">

          
        </div>
        <div class="row">
            <div class="col-sm-2 offset-sm-2">
                <img src="https://picsum.photos/200/200" alt="">
            </div>
            <div class="col-sm-2 offset-sm-1">
                <img src="https://picsum.photos/200/200" alt="">
            </div>
            <div class="col-sm-2 offset-sm-1">
                <img src="https://picsum.photos/200/200" alt="">
            </div>
            
        </div>
    </div>