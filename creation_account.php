<?php
        require_once ('librairies/config_db.php');
        require_once ('head_nav.php');
?>

<h1 class="text-center my-text-primary mt-2"> Créez votre compte ! </h1>

<form method="post">

<div class="container form">
<div>
  <label for="Username" class="label-form">Nom d'utilisateur</label>
  <input type="text" name="username" class="form-control" require_onced />
</div>
<div>
  <label for="Email" class="label-form">Email</label>
  <input type="Email" name="mail" class="form-control" require_onced/>
</div>
<div>
  <label for="Password" class="label-form">Mot de passe</label>
  <input type="text" name="password" class="form-control" require_onced/>
</div>
</div>

<div class="col text-center mt-3">
<input type="submit" class="my-btn-primary my-btn-primary-primary" value="Valider" />
</div>

</form>

<?php

$username = empy($_POST['username']);
$mail = empty($_POST['mail']);
$paswword = empty($_POST['password']);

$content_username = addslashes($_POST['username']);
$content_mail = addslashes($_POST['mail']);
$content_paswword = addslashes($_POST['password']);

if($username) {$username = $content_username;}
if($mail) {$mail = $content_mail;}
if($password) {$password = $content_paswword ;}
$hash = password_hash($password, PASSWORD_DEFAULT);

$data = [
'username' => $username,
'mail' => $mail,
'hash' => $hash,
];
$sql = "INSERT INTO user(username, mail, hash) VALUES (:username, :mail, :hash)";
$stmt= $db->prepare($sql);
$stmt->execute($data);

?>