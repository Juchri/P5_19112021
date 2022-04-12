<?php
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère ID de post et comment avec GET
$post_id = $_GET[post_id] ;
$comment_id = $_GET[comment_id] ;

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("UPDATE coment SET is_published = '2' WHERE id = $comment_id");
if ($query){
    header("Location: show_post.php?id=".$post_id);
}else{
    echo 'Erreur';
}