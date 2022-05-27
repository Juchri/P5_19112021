<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>

    <?php
        require_once ('librairies/config_db.php');
        require_once ('head_nav.php');
    ?>

    <body style='background:#fff;'>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    header('Location: index.php');
                }
            ?>

        </div>

        <?php ini_set("session.gc_maxlifetime","3600"); ?>

<?php
require_once ('footer.php');
?>