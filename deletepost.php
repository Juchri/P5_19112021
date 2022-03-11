<?php
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère ID avec GET
$id = $_GET[id] ;

// Puis supprime le post lié à cet id

$query = $db -> query("DELETE FROM post WHERE id = $id");
if ($query){
    header('Location: posts.php');
}
