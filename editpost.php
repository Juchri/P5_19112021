<?php
require_once ('head_nav.php');
require_once ('librairies/functions.php');

// Récupère id avec GET

$post_id = $_GET['id'];

// Puis méthode requête SQL en fonction de l'id

$req = $db->prepare("SELECT * FROM post WHERE id=$post_id");
$req->execute();
$post = $req->fetch();

    {
    ?>

  <body>

    <form class="m-3" method="POST">
        <h1 class="text-center mt-2">Modification de post</h1>

        <label for="title" class="label-form"><b>Titre</b></label>
        <input class="form-control" type="title" value=" <?= $post['title'];?>" name="title" require_onced>

        <label for="hat" class="label-form"><b>Chapeau</b></label>
        <input class="form-control" type="hat" value=" <?= $post['hat']; ?>" name="hat" require_onced>

        <label for="content" class="label-form">Post</label>
        <textarea id="content" name="content" type="content" style="width:100%;padding: 8px; font-size: 18px;height:300px;box-sizing:border-box;" class="form-control" require_onced/>
             <?= $post['content']; ?>   
        </textarea>

        <input class="my-btn-primary my-btn-primary-primary col text-center mt-3" type="submit" id='submit' value='Modifier le post' >

        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                print_r ("<p style='color:red'>Utilisateur ou mot de passe incorrect</p>");
        }
    }
    ?>
    </form>

    <a class="m-3 my-text-primary" href="http://127.0.0.1:8888/P5_19112021/posts.php">
            Retour à la liste des posts
    </a>

</div>


<?php

$modified_at = date('Y-m-d H:i:s');

$POST_title = isset($_POST['title']);
$POST_hat = isset($_POST['hat']);
$POST_content= isset($_POST['content']);

$content_title = addslashes($_POST['title']);
$content_hat = addslashes($_POST['hat']);
$content_content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);

if($POST_title) {$title = $content_title;}
if($POST_hat) {$hat = $content_hat;}
if($POST_content) {$content = $content_content;}


$data = [
    'title' => $title,
    'hat' => $hat,
    'content' => $content,
    'modified_at' => $modified_at,
];

$sql = "UPDATE post SET title = :title, hat = :hat, content = :content, modified_at = :modified_at WHERE id=$post_id";
$stmt= $db->prepare($sql);
$stmt->execute($data);

if ($stmt){
    header("Location: posts.php");
}else{
    print_r ('Erreur');
}
