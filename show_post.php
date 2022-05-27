<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('head_nav.php');
require_once ('librairies/config_db.php');
require_once ('global.php');

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
        <div class="card-title h3 my-text-primary">
          <?php echo $post['title']; ?>
        </div>
        <div class="card-subtitle h4 my-text-secondary">
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

    <a class="my-text-primary text-decoration-none m-3" href="http://127.0.0.1:8888/P5_19112021/posts">
        Retour à la liste des posts
    </a>


<?php
/* Affichage commentaires à valider */
?>
<div class="row">
  <div class="col-12 col-sm-6">
      <!-- Commentaires -->
    <div class="container">
        <!-- zone de connexion -->

          <form method="POST">
                  <?php
            if ($isLoggedIn)
            {
            ?>
            <div class="row pt-3 pb-0"><p class="fst-italic"> Commenter vous aussi en tant que <?= $user ?></p></div>
              <label for="content" class="label-form"></label>
              <textarea class="form-control" name="content" placeholder="Ecrivez votre commentaire" style="padding: 8px; font-size: 12px;height:100px;box-sizing:border-box;" class="form-control" require_onced/>
              </textarea>
              <input class="my-btn-primary my-btn-primary-primary col text-center mt-3" type="submit" id='submit' value='Publier' >
            </form>
            <?php }else{ ?>
            <div class="row pt-3 pb-0"><a href="creation_account.php" class="my-text-primary fst-italic"> Créez un compte pour commenter !</a></div>
            <p> Commentaires </p>
          <?php
            }
          ?>


        <!-- fin formulaire -->
    </div>

    <?php
    if ($isLoggedIn)
    {
    ?>

      <h3 class="h5 m-3"> Commentaires à valider </h3>
      <div>
        <div class="my-text-secondary container m-3">

      <?php
        $stmt = $db->prepare( "SELECT * FROM coment WHERE post_id=$id AND is_published='0' ORDER BY published_at DESC");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach($comments as $comment)
        {
        ?>

        <div class="container">
          <div class="my-text-primary"> <?php echo $comment['user'];  ?> </div>
          <div class="card p-3">
            <div class="card-title h6 my-text-secondary">
              <?php echo $comment['content']; ?>
            </div>
          </div>
          <div class="row align-middle">
            <div class="col-11 blockquote-footer mb-0">
                <?php echo "Créé le" ?>
                <?php echo $comment['published_at']; ?>
            </div>
            <div class="row pb-3 pt-0">
              <a class="col-11 my-text-primary text-decoration-none" href="validate-comment.php?post_id=<?php echo $id; ?>&comment_id=<?php echo $comment['id']; ?>">Valider le commentaire</a>
              <a class="col-1 my-text-primary" href="trash-comment.php?post_id=<?php echo $id; ?>&comment_id=<?php echo $comment['id']; ?>">
                <i class="fas fa-trash"></i>
              </a>
              </div>
          </div>
        </div>

    <?php
    }
    ?>

        </div>
      </div>

      <h3 class="h5 m-3"> Corbeille </h3>
      <div>
        <div class="my-text-secondary container">

    <?php

        $stmt = $db->prepare( "SELECT * FROM coment WHERE post_id=$id AND is_published='2' ORDER BY published_at DESC");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach($comments as $comment)
        {
        ?>

        <div class="container m-3">
          <div class="my-text-primary"> <?php echo $comment['user'];  ?> </div>
          <div class="card p-3">
            <div class="card-title h6 my-text-secondary">
              <?php echo $comment['content']; ?>
            </div>
          </div>
          <div class="row align-middle">
          <div class="col-11 blockquote-footer mb-0">
                <?php echo "Modifié le" ?>
                <?php echo $comment['published_at']; ?>
            </div>
            <div class="row">
              <a class="col-11 my-text-primary text-decoration-none" href="restaure-comment.php?post_id=<?php echo $id; ?>&comment_id=<?php echo $comment['id']; ?>">Restaurer le commentaire</a>
              <a class="col-1 my-text-primary" href="deletecomment.php?post_id=<?php echo $id; ?>&comment_id=<?php echo $comment['id'];?>">
                <i class="fas fa-trash"></i>
              </a>
              </div>
          </div>
        </div>

        <?php
          }
        ?>

        </div>
      </div>
    </div>
  <?php
    }
  ?>
<?php
    if ($isLoggedIn){
  ?>
  <div class="col-12 col-sm-6">
    <div> Commentaires validés </div>
  <?php
    }
      /* Affichage commentaires validés */

      $stmt = $db->prepare( "SELECT * FROM coment WHERE post_id=$id AND is_published='1' ORDER BY published_at DESC");
      $stmt->execute();
      $comments = $stmt->fetchAll();
      foreach($comments as $comment)
      {
      ?>

      <div class="container m-3">
        <div class="my-text-primary"> <?php echo $comment['user'];  ?> </div>
        <div class="card p-3">
          <div class="card-title h6 my-text-secondary">
            <?php echo $comment['content']; ?>
          </div>
        </div>
  <?php
    if ($isLoggedIn)
      {
      ?>
        <div class="row align-middle">
          <div class="col-11 blockquote-footer">
              <?php echo "Validé le" ?>
              <?php echo $comment['published_at']; ?>
          </div>
          <a class="col-1" href="trash-comment.php?post_id=<?php echo $id; ?>&comment_id=<?php echo $comment['id']; ?>">
                <i class="fas fa-trash my-text-secondary"></i>
          </a>
        </div>
    <?php
        }
      ?>
      </div>

      <?php
        }
        ?>

  </div>
</div>


<?php /*Envoi à bd*/

$published_at = date('Y-m-d H:i:s');
$is_published = '0';
if(isset($_POST['content'])) {$content = addslashes($_POST['content']);}

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

?>

<?php
require_once ('footer.php');
?>

