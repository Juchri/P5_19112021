<?php
function pdo_nettoie($var) {
    if(get_magic_quotes_gpc()) $var = stripslashes($var);
    return htmlentities($var, ENT_QUOTES);
}
?>

<?php
// Fonction pour filtre avant PDO
function pdo_filtre($var) {
    return get_magic_quotes_gpc() ? stripslashes($var) : $var;
}
