<?php
require ('head_nav.php');
require ('librairies/config_db.php');
require ('librairies/functions.php');

// Récupère id avec GET

$id = $_GET[id] ;

// Puis méthode requête SQL en fonction de l'id

$req = $db->prepare("SELECT * FROM post WHERE id=$id");
$req->execute();
$post = $req->fetch();

    {
    ?>

    <form class="m-3" method="POST">
        <h1 class="text-center mt-2">Modification de post</h1>

        <label for="title" class="label-form"><b>Titre</b></label>
        <input class="form-control" type="title" value=" <?php echo $post['title'];?>" name="title" required>

        <label for="hat" class="label-form"><b>Chapeau</b></label>
        <input class="form-control" type="hat" value=" <?php echo $post['hat']; ?>" name="hat" required>

        <label for="content" class="label-form">Post</label>
        <textarea id="content" name="content" type="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" required/>
             <?php echo $post['content']; ?>   
        </textarea>

        <input class="btn btn-primary col text-center mt-3" type="submit" id='submit' value='Modifier le post' >

        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
    }
    ?>
    </form>

    <a class="m-3" href="http://127.0.0.1:8888/P5_19112021/posts">
            Retour à la liste des posts
    </a>

</div>


<?php

$created_at = date('Y-m-d H:i:s');

if(isset($_POST['title'])) {$title = addslashes($_POST['title']);} else {die();}
if(isset($_POST['hat'])) {$hat = addslashes($_POST['hat']);} else {die();}
if (get_magic_quotes_gpc(isset($_POST['content']))) {$content =  isset($_POST['content']);} else {die();}

$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content,
    'created_at' => $created_at
];

$sql = "UPDATE post(title, hat, content, created_at) VALUES (:title, :hat, :content, :created_at)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

?>
