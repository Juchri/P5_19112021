<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once ('librairies/config_db.php');
  require_once ('head_nav.php');
  require_once ('global.php');

   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if($username !== "" && $password !== ""){

      $stmt = $db->prepare("SELECT * FROM user where username = :username");
      $stmt->bindParam('username', $username);
      $stmt->execute();

      $user = $stmt->fetch();

        if($user && password_verify($_POST['password'], $user['hash'])) {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else{
          header('Location: erreur.php');
        }
    }

//mysqli_close($db); // fermer la connexion

//Session set -> récupérer les infos stcokées de l'utilisateur connecté dans la session

include_once ('footer.php');
