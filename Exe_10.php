<!--
* User          : oscar
* Date          : 08.12.14
* Time          : 20:14
* Comment       :
* Optimisation  : Voir correction, il y a quelques améliorations
-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 10</title>
    </head>
    <body>
        <?php
            echo("<h1>Exercice 10 - Test 3 boutons</h1>");
            echo("<hr>");

        // Réception des données et contrôle de ce qui arrive
            if($_POST == null or $_POST['retour']) {
                pageInit();
            }elseif($_POST['b1']){
                echo("<form method='post' action=''>");
                echo("<input name='retour' type='submit' value='retour'>");
                echo("</form>");
                echo("<h1>Page 1</h1>");
                echo("<p>La paix est une création continue</p>");
            }elseif($_POST['b2']){
                echo("<form method='post' action=''>");
                echo("<input name='retour' type='submit' value='retour'>");
                echo("</form>");
                echo("<h1>Page 2</h1>");
                echo("<img src=Images/butterfly.gif");
            }else{
                echo("<form method='post' action=''>");
                echo("<input name='retour' type='submit' value='retour'>");
                echo("</form>");
                echo("<h1>Page 3</h1>");
                echo("<img src=Images/birds.jpg");
            }

        // Page de base
            function pageInit(){
                echo("<form method='post' action=''>");
                echo("<input name='b1' type='submit' value='1'>");
                echo("<input name='b2' type='submit' value='2'>");
                echo("<input name='b3' type='submit' value='3'>");
                echo("</form>");
            }

        ?>
    </body>
</html>
