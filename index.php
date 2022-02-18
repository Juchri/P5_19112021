 <?php
        require ('librairies/config_db.php');
        require ('head_nav.php');
        include_once('librairies/config_db.php');

?>

<h1 class="text-center mt-3"> Bienvenue sur le blog !</h1>

<div class="container  mt-3">
  <div class="row align-items-start">
    <div class="col-4">
      <img src="./img/profil_juliette.jpg" width="200px" height="200px" class="img-fluid rounded mx-auto d-block " alt="Responsive image">
      <div class="col text-center mt-3">
          <input type="submit" class="btn btn-light" value="Modifier la photo" />
      </div>
    </div>
    <div class="col-8">
      <h2>Juliette Christain</h2>
      <p> Ma phrase d'accroche ? Aucune, je n'ai pas besoin de vous charmer, venez me parler ! </p>
      <a href="">Téléchargez mon CV !</a>
      <a href=""><i class="fab fa-twitter"></i></a>
      <a href=""><i class="fab fa-facebook"></i></a>
    </div>
  </div>
</div>


<h2 class="mt-4 text-center col">Contact</h2>

<form method="post">

  <div class="container form">
    <div>
      <label for="Prénom" class="label-form">Prénom</label>
      <input type="text" name="first_name" class="form-control" required />
    </div>
    <div>
      <label for="Nom" class="label-form">Nom </label>
      <input type="text" name="last_name" class="form-control" required/>
    </div>
    <div>
      <label for="Email" class="label-form">Email</label>
      <input type="Email" name="mail" class="form-control" required/>
    </div>
    <div>
      <label for="Message" class="label-form">Message</label>
      <input type="textarea" name="message" style="width:100%;padding: 8px; font-size: 18px;height:100px;box-sizing:border-box;" class="form-control" required/>
    </div>
  </div>
  
  <div class="col text-center mt-3">
    <input type="submit" class="btn btn-primary" value="Valider" />
  </div>

  <h2 class="mt-4 text-center col">Mes articles</h2>

</form>

<?php 
    $a=1;
    $stmt = $db->prepare(
        "SELECT * FROM post");
    $stmt->execute();
    $posts = $stmt->fetchAll();
    foreach($posts as $post) 
{
?>

  <div class="h3">
    <?php echo $post['title']; ?>
  </div>

  <div class="p">
    <?php echo $post['content']; ?>
  </div>

<?php
  }
  ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>