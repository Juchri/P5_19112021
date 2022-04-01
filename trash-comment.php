<?php
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère ID avec GET
$id = $_GET[id] ;

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("UPDATE coment SET is_published = '2' WHERE id = $id");
if ($query){
    //header('Location: "$redirect");
    echo'Commentaire envoyé à la corbeille';
}
