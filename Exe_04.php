<!--
* User          : oscar
* Date          : 20.12.14
* Time          : 16:24
* Comment       : Le formulaire n'est pas dans un tableau mais alignement fait en CSS
* Optimisation  : Contrôler que l'âge soit dans une limite MIN-MAX
-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 04</title>
        <style type="text/css">
            #form{
                width: 280px;
                padding: 10px;
                border:2px inset deepskyblue;
            }
            label{
                display: inline-block;
                width: 80px;
            }
        </style>
    </head>

    <body>
        <h2>Exercice 04 - Mini formulaire simple</h2>
        <hr>
        <div id="form">
            <form method="POST" action="">
                <label>Nom: </label>    <input type="text"  size="25px" maxlength="20"  name="nom"> <br>
                <label>Prenom: </label> <input type="text"  size="25px" maxlength="20"  name="prenom"> <br>
                <label>Age: </label>    <input type="text"  size="5px"  maxlength="3"   name="age"><br>
                <label></label>         <input type="submit" value="envoyer" name="envoi">
            </form>
        </div>
        <?php
            // Formulaire envoyé
            if (isset($_POST['envoi'])) {
                // On récupère les infos des champs
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];

                echo("<h3>Récapitulatid des infos saisies:</h3>");
                if(empty($nom)){
                    echo("<p>Pas de nom entré correctement</p>");
                }else{
                    echo("<p>Nom = $nom</p>");
                }
                if(empty($prenom)){
                    echo("<p>Pas de prenom entré correctement</p>");
                }else{
                    echo("<p>Prénom = $prenom</p>");
                }
                if(!empty($age) and is_numeric($age)){
                    echo("<p>Age = $age</p>");
                }else{
                    echo("<p>Pas d'âge entré correctement</p>");
                }
            }
        ?>
    </body>
</html>