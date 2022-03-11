<?php
        require ('librairies/config_db.php');
        require ('head_nav.php');
        include_once('librairies/config_db.php');

?>

  <body>

<?php 

    $a=1;
    $stmt = $db->prepare(
        "SELECT * FROM post ORDER BY created_at DESC");
    $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach($posts as $post)
    {
    ?>

    <div class="container m-3">
      <div class="card p-3">
        <div class="card-title h3 text-primary">
          <?php echo $post['title']; ?>
        </div>
        <div class="card-subtitle h4 text-secondary">
          <?php echo $post['hat']; ?>
        </div>
        <div class="card-body text-justify text-muted">
          <?php echo stripslashes($post['content']); ?>
        </div>
        <div class="container">
          <div class="row">
            <a class="col-8" href="show_post.php?id=<?php echo $post['id']; ?>">
                Lire plus...
            </a>
            <a class="col-2" href="editpost.php?id=<?php echo $post['id']; ?>">
                Modifier le post
            </a>
            <a class="col-2" href="deletepost.php?id=<?php echo $post['id']; ?>">
                Supprimer le post
            </a>
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
      ?>

<!-- Bootstrap JS bundle -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>