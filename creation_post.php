<?php
        require ('librairies/config_db.php');
        require ('librairies/functions.php');
        require ('head_nav.php');
?>

<script src="tiny.js"></script>

    <div class="container">
        <!-- zone de connexion -->

        <form method="POST">
            <h1 class="text-center mt-2">Création de post</h1>

            <label for="title" class="label-form"><b>Titre</b></label>
            <input class="form-control" type="title" placeholder="Entrer le titre du post" name="title" required>

            <label for="hat" class="label-form"><b>Chapeau</b></label>
            <input class="form-control" type="hat" placeholder="Entrer le chapeau" name="hat" required>

            <label for="content" class="label-form">Post</label>
            <textarea id="content" name="content" type="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" required/>
            </textarea>


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

$created_at = date('Y-m-d H:i:s');

if(isset($_POST['title'])) {$title = addslashes($_POST['title']);} else {die();}
if(isset($_POST['hat'])) {$hat = addslashes($_POST['hat']);} else {die();}
if(isset($_POST['content'])) {$content = pdo_nettoie(addslashes($_POST['content']));} else {die();}

$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content,
    'created_at' => $created_at
];
$sql = "INSERT INTO post(title, hat, content, created_at) VALUES (:title, :hat, :content, :created_at)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

?>
