<?php
require_once ('head_nav.php');
require_once ('librairies/config_db.php');

// Récupère ID de post et comment avec GET
$post_id = isset($_GET[post_id]) ;
$comment_id = isset($_GET[comment_id]) ;

// Puis supprime le post lié à cet id
$query = $db -> query("UPDATE coment SET is_published = '0' WHERE id = $comment_id");
if ($query){
     echo'Commentaire envoyés dans la zone de validation';
     header("Location: show_post.php?id=".$post_id);
}
