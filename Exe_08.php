<!--
* User          : oscar
* Date          : 26.12.14
* Time          : 14:26
* Comment       : Utilisation de fonctions pour mettre à jour le formulaire
*               : Ceci évite qu'il se vide à chaque envoi
* Optimisation  :
-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 08</title>
    <style type="text/css">
        p{color: red};
    </style>
</head>
<body>
    <h1>Exercice 08 - Calcul de puissance</h1>
    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>Valeur: </td>
                <td><input type='text' name='val' size='5' <?php afficheValue('val');?></td>
            </tr>
            <tr>
                <td>Puissance: </td>
                <td><input type='text' name='pui' size='5' <?php afficheValue('pui');?></td>
            </tr>
        </table>
        <input type="submit" value="Calculer">
    </form>
    <hr>

    <!-- Script pour contrôler les données reçues et afficher le résultat -->
    <?php
    if (isset($_POST['val']) and isset($_POST['pui'])){
        if (ctype_digit($_POST['val']) and ctype_digit($_POST['pui'])) {
            $valeur = $_POST['val'];
            $power = $_POST['pui'];
            $result = pow($valeur,$power);
            if (!is_infinite($result)) {
                echo("Résultat: $valeur<sup>$power</sup> = ");
                printf("%.5g", $result);
            } else {
                echo("Chiffre trop grand -> débordement!");
            }

        } else {
            echo("<p>Erreur de saisie : il faut entrer des valeurs positives et entières</p>");
        }
    }

    ?>

    <!-- Fonction pour mettre des input:text-->
    <?
        function afficheValue($name)
        {
            if (isset($_REQUEST[$name])) {
                echo("value='".$_REQUEST[$name]."'");
            }
        }
    ?>
</body>
</html>