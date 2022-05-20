
<?php
require_once('model/global.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id'],1);
    $comments_trash = getComments($_GET['id'],2);
    $comments_tb_validated = getComments($_GET['id'],0);

    require('view/postView.php');
}
else {
  echo "Erreur : Aucun article n'a été trouvé";
}

require_once('footer.php');
