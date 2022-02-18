<?php
session_start();

  require ('config_db.php');
  require ('head_nav.php');

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

mysqli_close($db); // fermer la connexion