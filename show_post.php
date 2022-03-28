<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require ('head_nav.php');
require ('librairies/config_db.php');

// Récupère id avec GET

$id = $_GET['id'];
$user = $_SESSION['username'];

// Puis méthode requête SQL en fonction de l'id

$req = $db->prepare("SELECT * FROM post WHERE id=$id");
$req->execute();
$post = $req->fetch();

    {
    ?>


    <div class="container m-3 mt-4">
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


<?php
/* Affichage commentaires à valider */
?>
<div class="row">
  <div class="col-6">
      <!-- Commentaires -->
    <div class="container">
        <!-- zone de connexion -->

          <form method="POST">
            <div class="row"><p class="fst-italic"> Commenter vous aussi en tant que <?= $user ?></p></div>

            <label for="content" class="label-form"></label>
            <textarea class="form-control" name="content" placeholder="Ecrivez votre commentaire" style="padding: 8px; font-size: 12px;height:100px;box-sizing:border-box;" class="form-control" required/>
            </textarea>

            <input class="btn btn-primary col text-center mt-3" type="submit" id='submit' value='Publier' >
          </form>

        <!-- fin formulaire -->
    </div>
    <h3> Commentaires à valider </h3>
    <div class="">
      <div class="text-secondary container m-3">

  <?php
      $stmt = $db->prepare( "SELECT * FROM coment WHERE post_id=$id AND is_published='0' ORDER BY published_at DESC");
      $stmt->execute();
      $comments = $stmt->fetchAll();
      foreach($comments as $comment)
      {
      ?>

        <div class="card p-3 m-2">
          <div class="card-title h3 text-primary">
            <?php echo $comment['content']; ?>
          </div>
          <div class="blockquote-footer mb-0 p-3">
            <?php echo "Modifié le" ?>
            <?php echo $comment['published_at']; ?>
            <div class="blockquote-footer p-3 mb-0"> <?php echo $comment['user'];  ?> </div>
          </div>
        </div>
        <div class="row">
          <form class="col-11 mt-1" method="post">
              <input type="checkbox" name="is_published" value="1">
              <input type="submit" type="submit" id='submit' value="Valider le commentaire">
          </form>
          <a class="col-1" href="deletecomment.php?id=<?php echo $comment['id']; ?>">
            <i class="fas fa-trash"></i>
          </a>
      </div>

      <?php
        }
      ?>

      </div>
    </div>

  </div>
  <div class="col-6">
    <div> Commentaires validés </div>
  <?php
      /* Affichage commentaires validés */

      $stmt = $db->prepare( "SELECT * FROM coment WHERE post_id=$id AND is_published='1' ORDER BY published_at DESC");
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
            <div class="blockquote-footer p-3"> <?php echo $comment['user'];  ?> </div>
          </div>
        </div>
      </div>

      <?php
        }
        ?>

  </div>
</div>


<?php /*Envoi à bd*/

$published_at = date('Y-m-d H:i:s');
$is_published = '0';
if(isset($_POST['content'])) {$content = addslashes($_POST['content']);} else {die();}

$data = [
    'content' => $content,
    'published_at' => $published_at,
    'post_id' => $id,
    'user' => $user,
    'is_published' => $is_published

];
$sql = "INSERT INTO coment(content, published_at, post_id, user, is_published) VALUES (:content, :published_at, :post_id, :user, :is_published)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

if(isset($_POST['is_published'])){$is_published = addslashes($_POST['is_published']); }else{$is_published = "0";}

/* Mise à jour de la validation qui ne fonctionne pas...*/

$data = [
    'is_published' => $is_published
];

$sqlupdate = "UPDATE post(is_published) VALUES (:is_published)";
$stmtupdate= $db->prepare($sqlupdate);
$stmtupdate->execute($data);

?>

<?php
require_once ('footer.php');
?>

