<?php
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère ID avec GET
$id = $_GET[id] ;

$stmt = $db->prepare( "SELECT post_id FROM coment WHERE id=$id");
$stmt->execute();
$post_id = $stmt->fetchAll();

// Puis supprime le post lié à cet id
//$redirect = 'showpost.php?id=$post_id';
$query = $db -> query("DELETE FROM coment WHERE id = $id");
if ($query){
    //header('Location: "$redirect");
    echo'Commentaire supprimé !';
}
