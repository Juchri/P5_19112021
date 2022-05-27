<?php
        require_once ('librairies/config_db.php');
        require_once ('librairies/functions.php');
        require_once ('head_nav.php');
?>

<script src="tiny.js"></script>

    <div class="container">
        <!-- zone de connexion -->

        <form method="POST">
            <h1 class="text-center mt-2">Création de post</h1>

            <label for="title" class="label-form"><b>Titre</b></label>
            <input class="form-control" type="title" placeholder="Entrer le titre du post" name="title" require_onced>

            <label for="hat" class="label-form"><b>Chapeau</b></label>
            <input class="form-control" type="hat" placeholder="Entrer le chapeau" name="hat" require_onced>

            <label for="content" class="label-form">Post</label>
            <textarea id="content" name="content" type="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" require_onced/>
            </textarea>


            <input class="my-btn-primary my-btn-primary-primary my-bg-primary col text-center mt-3" type="submit" id='submit' value='Publier' >
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
$modified_at = date('Y-m-d H:i:s');

if(isset($_POST['title'])) {$title = addslashes($_POST['title']);}
if(isset($_POST['hat'])) {$hat = addslashes($_POST['hat']);}
if(isset($_POST['content'])) {$content = addslashes($_POST['content']);}

$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content,
    'created_at' => $created_at,
    'modified_at' => $modified_at
];
$sql = "INSERT INTO post(title, hat, content, created_at, modified_at) VALUES (:title, :hat, :content, :created_at, :modified_at)";
$stmt= $db->prepare($sql);
$stmt->execute($data);


include_once ('footer.php');

if ($stmt){
    header("Location: posts.php");
}else{
    echo 'Erreur';
}
