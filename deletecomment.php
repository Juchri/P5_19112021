<?php
require_once ('head_nav.php');
require_once ('librairies/config_db.php');
require_once ('global.php');


// Récupère ID avec GET
$post_id = $_GET[post_id] ;
$comment_id = $_GET[comment_id] ;

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("DELETE FROM coment WHERE id = $comment_id");
if ($query){
    header("Location: show_post.php?id=".$post_id);
}else{
    echo 'Erreur';
}
