<?php
require_once ('head_nav.php');
require_once ('librairies/config_db.php');

// Récupère ID de post et comment avec GET
$post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_SPECIAL_CHARS);
$comment_id = filter_input(INPUT_GET, 'comment_id', FILTER_SANITIZE_SPECIAL_CHARS);

// Puis supprime le post lié à cet id
$query = $db -> query("UPDATE coment SET is_published = '0' WHERE id = $comment_id");
if ($query){
     header("Location: show_post.php?id=".$post_id);
}
