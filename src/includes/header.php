<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/mspr-musiques/assets/css/back.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Back-office</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="home"></span>
                  Tableau de bord <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="albums.php">
                  <span data-feather="disc"></span>
                  Albums
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="albums.php?single">
                  <span data-feather="music"></span>
                  Singles
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="chansons.php?all">
                  <span data-feather="music"></span>
                  Chansons
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="certifications.php">
                  <span data-feather="disc"></span>
                  Certifications
                </a>
              </li>
            </ul>
          </div>
        </nav>