<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('librairies/config_db.php');

session_start();

// DETERMINE A VALID LOGIN
$isLoggedIn = $_SESSION['username'];

function getPosts()
{
      $db = dbConnect();
      $req = $db->query("SELECT * FROM post ORDER BY created_at DESC");
      return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM post WHERE id= ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId, $status)
{
    $db = dbConnect();
    $req="SELECT * FROM coment WHERE post_id= $postId AND is_published= $status ORDER BY published_at DESC";
    $comments = $db->prepare($req);
    $comments->execute(array($postId));
    return $comments;
}


