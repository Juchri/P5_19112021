<?php 
require ('global.php');
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title> Blog </title>

	<script src="https://kit.fontawesome.com/27350ed8ab.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


</head>

<?php
      if ($isLoggedIn){
            ?>
        <nav class="navbar navbar-expand-md fixed-top navbar-light my-bg-light">
          <?php
            }else{
          ?>
        <nav class="navbar navbar-expand-md fixed-top navbar-light my-bg-muted">
          <?php
            }
          ?>

      <div class="container">
        <a class="navbar-brand text-uppercase fw-bold" href="#">
          <span class="my-my-bg-primary my-bg-primary p-1 rounded-3 text-light">Diagon</span> Alley
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Accueil </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                Blog
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posts.php">
                Tous les posts
              </a>
            </li>

<?php
            if ($isLoggedIn){
            ?>

            <li class="nav-item">
              <a class="nav-link" href="creation_post.php">
                <i class=" my-text-primary fas fa-feather"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="fas fa-solid fa-user my-text-primary"></i>  Log out</a>
            </li>
          <?php
            }else{
            ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-solid fa-user my-text-primary"></i>  Log in</a>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="login.php">Log-in</a></li>
                <li><a class="dropdown-item" href="creation_account.php">Création de compte</a></li>
              </ul>
            </li>
            <?php }
            ?>
          </ul>
        </div>
      </div>
    </nav>

</header>

<body style="margin-top: 5rem">




