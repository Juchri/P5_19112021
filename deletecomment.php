<?php
require_once ('head_nav.php');
require_once ('config_db.php');
require_once ('global.php');


// Récupère ID avec GET
$id = $_GET[id] ;

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("DELETE FROM coment WHERE id = $id");
if ($query){
    header("Location: show_post.php?id=".$id);
}else{
    echo 'Erreur';
}
