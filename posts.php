<?php
        require_once ('librairies/config_db.php');
        require_once ('head_nav.php');
        require_once ('global.php');
?>


<?php

     // $posts = getPosts();

    $stmt = $db->prepare(
        "SELECT * FROM post ORDER BY created_at DESC");
    $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach($posts as $post)
    {
    ?>

    <div class="container m-3">
      <div class="rounded my-bg-muted p-3">
        <div class="card-title h3 my-text-primary">
          <?= $post['title']; ?>
        </div>
        <div class="card-subtitle h4 my-my-text-secondary">
          <?= $post['hat']; ?>
        </div>
        <div class="card-body text-justify text-muted">
          <?= stripslashes($post['content']); ?>
        </div>
        <div class="container">
          <div class="row">
            <a class="text-decoration-none my-text-primary col-8" href="show_post.php?id=<?php echo $post['id']; ?>">
                Lire plus...
            </a>
            <?php
            if ($isLoggedIn){
              ?>
              <a class="text-decoration-none my-text-primary col-2" href="editpost.php?id=<?php echo $post['id']; ?>">
                  Modifier le post
              </a>
              <a class="text-decoration-none my-text-primary col-2" href="deletepost.php?id=<?php echo $post['id']; ?>">
                  Supprimer le post
              </a>
            <?php
            }
          ?>
         </div>
        </div>
        <div class="blockquote-footer p-3">
          <?= "Modifié le" ?>
          <?= $post['modified_at']; ?>
        </div>
      </div>
    </div>

    <?php
      }
      ?>

<?php
require_once ('footer.php');
?>