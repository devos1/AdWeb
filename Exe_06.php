<!--
* User          : oscar
* Date          : 21.12.14
* Time          : 15:35
* Comment       : Utilisation champ caché pour le contrôle du nb de couleurs et formlaure reçu
* Optimisation  :
-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 06</title>
    </head>
    <body>
        <h1>Exercice 06 - Choix des couleurs préférées</h1>
        <hr>
        <h3>Quelles sont vos couleurs préférées?</h3>
        <?php
            //Déclaration d'un tableau associatif avec les couleurs
            $couleurs = array(
                "rouge"=>"red",
                "bleu"=>"blue",
                "vert"=>"green",
                "jaune"=>"yellow",
                "blanc"=>"white",
                "noir"=>"black",
                "orange"=>"orange",
                "rose"=>"pink"
                );

            echo("<form method='post' action=''>");
            echo("<table border='1px'>");
            foreach ($couleurs as $couleur=>$color) {
                echo("<tr>");
                echo("<td bgcolor='$color' width='50px'></td>");
                echo("<td><input type='checkbox' name='choix[]' value='$couleur' /></td>");
                echo("</tr>");
                }
            echo("</table>");
            echo("<br/>");
            echo("<input type='hidden' name='test'>");
            echo("<input type='submit' value='Voir le résultat'>");
            echo("</form>");

            // Récupération des infos
            if(isset($_POST['test'])){
                if(array_count_values($_POST['choix']) > 0){
                    $couleurs = implode(', ', $_POST["choix"]);
                    echo("<p>Vos couleurs préférées sont : $couleurs</p>");
                }else{
                    echo("<p style='color: red'>Aucune couleur choisie</p>");
                }
            }
        ?>
    </body>
</html>