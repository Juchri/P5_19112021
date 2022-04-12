<?php

class post {

    private $con;

    public function __construct(connexion $con) {
        $this->con = $con->con;
    }

    public function getPosts (){

        $post_info = $this->con->prepare("SELECT * FROM post");
        $post_info->execute();


        $results = $post_info->fetchAll(PDO::FETCH_OBJ);

        foreach ($posts as $post) {

            <div class="container m-3">
              <div class="card p-3">
                <div class="card-title h3 my-text-primary">
                  <?php echo $post['title']; ?>
                </div>

                <div class="card-subtitle h4 my-text-secondary">
                  <?php echo $post['hat']; ?>
                </div>

                <div class="card-body text-justify text-muted">
                  <?php echo $post['content']; ?>
                </div>
              </div>
            </div>

        }
    }

}

?> 