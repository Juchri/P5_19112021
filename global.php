<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (file_exists("librairies/config_db.php")) include "librairies/config_db.php";

// DETERMINE A VALID LOGIN
$isLoggedIn = $_SESSION['username'];

function getCommentList($postId, $isPublished){

        echo $postId;
        echo $isPublished;

}


?>