<?php
        require ('librairies/config_db.php');
        require ('head_nav.php');
        require ('global.php');
?>

<?php
 if (!$isLoggedIn){
?>

    <div class="container">
        <!-- zone de connexion -->

        <form action="verification.php" method="POST">
            <h1 class="text-center mt-2">Connexion</h1>
            <label class="label-form"><b>Nom d'utilisateur</b></label>
            <input class="form-control" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label class="label-form"><b>Mot de passe</b></label>
            <input class="form-control" type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input class="my-btn-primary my-btn-primary-primary col text-center mt-3" type="submit" id='submit' value='Login' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p class='my-text-primary'> Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>

    <?php
        }else{?>

    <h1 class="text-center mt-2">Et oui, vous êtes bien connecté !</h1>

    <?php
        }
    ?>

<?php
require_once ('footer.php');
?>