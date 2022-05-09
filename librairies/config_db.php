<?php
  $servername = 'localhost';
  $username = 'root';
  $password = 'root';

  try{
      $db = new PDO(
        "mysql:host=$servername;dbname=blog",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
      );

      //On définit le mode d'erreur de PDO sur Exception
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
  catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }


  function dbConnect()
{
  $servername = 'localhost';
  $username = 'root';
  $password = 'root';

    try
    {
      $db = new PDO(
        "mysql:host=$servername;dbname=blog",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
      );
       return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

