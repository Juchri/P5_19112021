 <?php
        require_once ('head_nav.php');
        include_once('librairies/config_db.php');
        require_once ('global.php');
?>

  <body>

    <h1 class="text-center mt-3"> Bienvenue sur le blog !</h1>

    <div class="container  mt-3">
      <div class="row align-items-start">
        <div class="col-4">
          <img src="./img/profil_juliette.jpg" width="200px" height="200px" class="img-fluid rounded mx-auto d-block " alt="Responsive image">
          <div class="col text-center mt-3">
              <input type="submit" class="my-btn-primary my-btn-primary-light" value="Modifier la photo" />
          </div>
        </div>
        <div class="col-8">
          <h2>Juliette Christain</h2>
          <p> Ma phrase d'accroche ? Aucune, je n'ai pas besoin de vous charmer, venez me parler ! </p>
          <a href="">Téléchargez mon CV !</a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-facebook"></i></a>
        <?php
          if ($isLoggedIn){
              echo 'Vous êtes connecté !';
            }
            ?>
        </div>
      </div>
    </div>

<?php
require_once ('footer.php');
?>