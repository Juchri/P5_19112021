<?php

  require_once ('head_nav.php');
  require_once ('model/global.php');

  //Remplir le template
  $title = 'Mon blog MVC';

  ob_start();

    $posts = getPosts();
    foreach($posts as $post)
    {
    ?>

      <div class="container m-3">
        <div class="rounded my-bg-muted p-3">
          <div class="card-title h3 my-text-primary">
            <?= htmlspecialchars($post['title']); ?>
          </div>
          <div class="card-subtitle h4 my-my-text-secondary">
            <?= htmlspecialchars($post['hat']); ?>
          </div>
          <div class="card-body text-justify text-muted">
            <?= htmlspecialchars($post['content']); ?>
          </div>
          <div class="container">
            <div class="row">
              <a class="text-decoration-none my-text-primary col-8" href="post.php?id=<?php echo $post['id']; ?>">
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
            <?php echo "Modifié le" ?>
            <?php echo $post['created_at']; ?>
          </div>
        </div>
      </div>

    <?php
      }

$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
