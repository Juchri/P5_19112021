<?php
session_start();
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère id avec GET

$id = $_GET['id'];

// Puis méthode requête SQL en fonction de l'id

$req = $db->prepare("SELECT * FROM post WHERE id=$id");
$req->execute();
$post = $req->fetch();

    {
    ?>


    <div class="container m-3">
      <div class="card p-3">
        <div class="card-title h3 text-primary">
          <?php echo $post['title']; ?>
        </div>
        <div class="card-subtitle h4 text-secondary">
          <?php echo $post ['hat']; ?>
        </div>
        <div class="card-body text-justify text-muted">
          <?php echo $post['content']; ?>
        </div>
        <div class="blockquote-footer p-3">
          <?php echo "Modifié le" ?>
          <?php echo $post['created_at']; ?>
        </div>
      </div>
    </div>

    <?php
      }
      ?>

    <a class="m-3" href="http://127.0.0.1:8888/P5_19112021/posts">
        Retour à la liste des posts
    </a>

<!-- Commentaires -->
    <div class="container">
        <!-- zone de connexion -->
        <?php

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    ?>

                  <form method="POST">
                    <h1 class="text-center mt-2">Commentez !</h1>
                    <div class="row"><p class="fst-italic"> Commenter en tant que <?= $user ?></p></div>

                    <label for="content" class="label-form"></label>
                    <textarea class="form-control" name="content" placeholder="Ecrivez votre commentaire" style="width:40%;padding: 8px; font-size: 12px;height:100px;box-sizing:border-box;" class="form-control" required/>
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

               <?php }
            ?>

        <!-- fin formulaire -->

    </div>


<?php

$published_at = date('Y-m-d H:i:s');
if(isset($_POST['content'])) {$content = addslashes($_POST['content']);} else {die();}

$data = [
    'content' => $content,
    'published_at' => $published_at
];
$sql = "INSERT INTO coment(content, published_at) VALUES (:content, :published_at)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

/* Ne fonctionne pas

<?php

$published_at = date('Y-m-d H:i:s');
$validated_at = date('Y-m-d H:i:s');

if(isset($_POST['content'])) {$content = addslashes($_POST['content']);} else {die();}
if(isset($_POST['status'])) {$content = addslashes($_POST['status']);} else {die();}

if(isset($user_id)) {$user_id = addslashes($user;} else {die();}
if(isset($post_id)) {$post_id = addslashes($id;} else {die();}

$data = [
    'content' => $content,
    'status' => $status,
    'published_at' => $published_at,
    'validated_at' => $validated_at,
    'user_id' => $user_id,
    'post_id' => $post_id
];

$sql = "INSERT INTO comment(content, 'status', published_at, validated_at, user_id, post_id) VALUES (:content, ':status', :published_at, :validated_at, :user_id, :post_id)";
$stmt= $db->prepare($sql);
$stmt->execute($data);
?>
*/

/* Affichage commentaires */

    $stmt = $db->prepare( "SELECT * FROM coment ORDER BY published_at DESC");
    $stmt->execute();
    $comments = $stmt->fetchAll();
    foreach($comments as $comment)
    {
    ?>

    <div class="container m-3">
      <div class="card p-3">
        <div class="card-title h3 text-primary">
          <?php echo $comment['content']; ?>
        </div>
        <div class="blockquote-footer p-3">
          <?php echo "Modifié le" ?>
          <?php echo $comment['published_at']; ?>
        </div>
      </div>
    </div>

    <?php
      }
      ?>