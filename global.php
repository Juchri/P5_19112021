<?php
session_start();

include_once "librairies/config_db.php";

// DETERMINE A VALID LOGIN
$isLoggedIn = $_SESSION['username'];

function getCommentList($postId, $isPublished){

        print_r ($postId);
        print_r ($isPublished);
}


?>