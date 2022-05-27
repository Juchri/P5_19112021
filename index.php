<?php
        require_once 'head_nav.php';
        include_once 'librairies/config_db.php';
        require_once 'global.php';
?>

  <body>

    <h1 class="text-center mt-3"> Bienvenue sur le blog, spécialiste d'Harry Potter !</h1>

    <div class="container  mt-3">
      <div class="row align-items-start">
        <div class="col-4">
          <img src="./img/profil_juliette.jpg" width="200px" height="200px" class="img-fluid rounded mx-auto d-block " alt="Responsive image">
        </div>
        <div class="col-8">
          <h2>Juliette Christain</h2>
          <a class="my-text-primary" href=""><i class="fab fa-twitter"></i></a>
          <a class="my-text-primary"  href=""><i class="fab fa-facebook"></i></a><br/>
          <p>Spécialiste d'Harry Potter depuis ma tendre enfance, j'ai décidé de creér ce blog pour pouvoir partager cette passion, non reconnue dans les études supérieures malheureusement, et pouvoir partager nos ressentis, nos déceptions, ou au contraire nos jolies concernant l'univers Harry Potter. Ici, vous êtes accepté comme vous êtes. Vous pouvez donc nous parler de tout, nous ne vous rejeterons pas ! Nous appliquons la devise de Dumbeldore : "Ce ne sont pas vos ressemblances qui comptent Harry, ce sont vos différences." </p>
          <a class="my-text-primary"  href="CV_Christain_Juliette[1265].pdf" download>Téléchargez mon CV !</a> <br/>
        </div>
      </div>
    </div>

<?php
require_once 'footer.php';
?>