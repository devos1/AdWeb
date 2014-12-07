<!--
* User: oscar
* Date: 07.12.14
* Time: 12:45
-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 02</title>
    </head>

    <body>
        <?php
            echo("<h2>Exercice 02 - Initialiser un tableau d'entiers avec des valeurs aléatoires et afficher</h2>\n");
            echo("<hr>\n");

            $tab = array();

            for ($i = 0 ; $i < 10 ; $i++) {
                $tab[$i] = rand(0,100);
            }

            // METHODE AVEC LES FONCTIONS INTEGREES PHP
            // Count array's elements
            $nbEle = count($tab);
            // Sum array's elements
            $sumEle = array_sum($tab);

            foreach($tab as $val){
                echo("<ul><li>$val</li></ul>");
            }
            echo("
                <ul>
                    <li>Nb d'éléments dans le tableau : $nbEle </li>
                    <li>Somme des éléments : $sumEle</li>
                </ul>
                ")
        ?>
    </body>
</html>


