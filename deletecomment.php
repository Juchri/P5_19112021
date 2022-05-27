<?php
require_once 'head_nav.php';
require_once 'librairies/config_db.php';
require_once 'global.php';


// Récupère ID avec GET
$post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_SPECIAL_CHARS);
$comment_id = filter_input(INPUT_GET, 'comment_id', FILTER_SANITIZE_SPECIAL_CHARS);

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("DELETE FROM coment WHERE id = $comment_id");
if ($query){
    header("Location: show_post.php?id=".$post_id);
}else{
    print_r ('Erreur');
}
