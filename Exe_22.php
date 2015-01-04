<?php
if (isset ($_COOKIE ['date'])) { // Réception d'un cookie ?
    $last = $_COOKIE ['date'];   // Lecture de la date
    $no = $_COOKIE ['no'];       // Lecture du numéro
} else {
    $no = 0; //Initialisation du numéro
}
setcookie ('date', time(), time()+86400); // Envoi du nouveau cookie date (timestamp)
setcookie ('no', $no+1, time()+86400);	  // Envoi du nouveau cookie numér
?>

<!--
* User          : oscar
* Date          : 04.01.15
* Time          : 14:22
* Comment       : ATTENTION - Le traitement du cookie doit être ce qu'on fait en 1er
* Optimisation  :
-->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 22</title>
</head>
<body>
<h1>Exercice 22 - Utilisation de cookies</h1>

<?php
echo htmlentities('Bonjour, vous êtes sur la page test de cookie',ENT_QUOTES,'UTF-8').'<hr>';
echo("Bonjour, vous êtes sur la page test de cookie"."<hr>");

if (isset ($last)) { // Affichage des valeurs lues dans les cookies
    echo "$no - ";
    echo htmlentities("Votre dernière visite était le ",ENT_QUOTES,'UTF-8');
    echo date ("j-n-Y", $last);
    echo " à ";
    echo date ("G:i:s", $last);
}
?>
</body>
</html>
