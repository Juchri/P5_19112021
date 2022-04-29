<?php
        require_once ('librairies/config_db.php');
        require_once ('head_nav.php');
        require_once ('global.php');

function getPosts(){

    $stmt = $db->prepare(
        "SELECT * FROM post ORDER BY created_at DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll();

    return $posts;
}
?>
