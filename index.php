<?php

mysql_connect(
    string $server = ini_get("mysql.default_host"),
    string $username = ini_get("mysql.default_user"),
    string $password = ini_get("mysql.default_password"),
    bool $new_link = false,
    int $client_flags = 0
): resource|false


$link = mysql_connect("localhost", "mysql_user", "mysql_password")
    or die("Impossible de se connecter : " . mysql_error());
echo 'Connexion réussie';
mysql_close($link);


?>
