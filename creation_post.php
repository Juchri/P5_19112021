<?php
        require ('librairies/config_db.php');
        require ('head_nav.php');

?>

    <div class="container">
        <!-- zone de connexion -->

        <form method="POST">
            <h1 class="text-center mt-2">Création de post</h1>

            <label for="title" class="label-form"><b>Titre</b></label>
            <input class="form-control" type="title" placeholder="Entrer le titre du post" name="title" required>

            <label for="hat" class="label-form"><b>Chapeau</b></label>
            <input class="form-control" type="hat" placeholder="Entrer le chapeau" name="hat" required>

            <label for="content" class="label-form">Post</label>
            <input type="textarea" name="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" required/>

            <input class="btn btn-primary col text-center mt-3" type="submit" id='submit' value='Publier' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>


<?php

if(isset($_POST['title'])) {$title = addslashes($_POST['title']);} else {die();}
if(isset($_POST['hat'])) {$hat = addslashes($_POST['hat']);} else {die();}
if(isset($_POST['content'])) {$content = addslashes($_POST['content']);} else {die();}


$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content
];
$sql = "INSERT INTO post(title, hat, content) VALUES (:title, :hat, :content)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

?>