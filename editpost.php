<?php
require_once ('head_nav.php');
require_once ('librairies/config_db.php');
require_once ('librairies/functions.php');

// Récupère id avec GET

$post_id = $_GET[id] ;

// Puis méthode requête SQL en fonction de l'id

$req = $db->prepare("SELECT * FROM post WHERE id=$post_id ");
$req->execute();
$post = $req->fetch();

    {
    ?>

  <body>

    <form class="m-3" method="POST">
        <h1 class="text-center mt-2">Modification de post</h1>

        <label for="title" class="label-form"><b>Titre</b></label>
        <input class="form-control" type="title" value=" <?php echo $post['title'];?>" name="title" require_onced>

        <label for="hat" class="label-form"><b>Chapeau</b></label>
        <input class="form-control" type="hat" value=" <?php echo $post['hat']; ?>" name="hat" require_onced>

        <label for="content" class="label-form">Post</label>
        <textarea id="content" name="content" type="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" require_onced/>
             <?php echo $post['content']; ?>   
        </textarea>

        <input class="my-btn-primary my-btn-primary-primary col text-center mt-3" type="submit" id='submit' value='Modifier le post' >

        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
    }
    ?>
    </form>

    <a class="m-3 my-text-primary" href="http://127.0.0.1:8888/P5_19112021/posts">
            Retour à la liste des posts
    </a>

</div>


<?php

$modified_at = date('Y-m-d H:i:s');

if(isset($_POST['title'])) {$title = addslashes($_POST['title']);} else {die();}
if(isset($_POST['hat'])) {$hat = addslashes($_POST['hat']);} else {die();}
if(isset($_POST['content'])) {$content =  isset($_POST['content']);} else {die();}

$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content,
    'modified_at' => $modified_at,
];

$sql = "UPDATE post SET title = :title, hat = :hat, content = :content, modified_at = :modified_at";
$stmt= $db->prepare($sql);
$stmt->execute($data);

?>


<?php
include_once ('footer.php');
?>