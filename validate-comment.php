<?php
require ('librairies/config_db.php');

    $sql = "INSERT INTO coment(is_published) VALUES (:is_published)";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    header('Location: show_post.php?id=$id');
?>

