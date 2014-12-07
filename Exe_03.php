<!--
 * User: oscar
 * Date: 07.12.14
 * Time: 15:49
 -->

<!doctype html>
<html lang=fr>
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 03</title>
    </head>
    <body>
        <?php
            echo("<h2>Exercice 03 - Faire une boucle qui affiche toutes les valeurs et les clés du tableau associatif \$_SERVER</h2>");
            echo("<hr>");

            echo("<h3>Nombre d'éléments : ".count($_SERVER)."</h3>");
            foreach($_SERVER as $key => $elt){
                echo("<p style='color: blue'>Clé = $key</p>");
                echo("<p style='color: blueviolet'> Valeur = $elt");
                echo("<p style='color: antiquewhite'>-----------------------------------------</p>");
            }
        ?>
    </body>
</html>