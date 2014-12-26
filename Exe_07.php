<!--
 * User         : oscar
 * Date, time   : 08.12.14 19:12
 * Date, time   : 26.12.14 13:30
 * Comment      : Mise à jour selon correction en classe
 -->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 07</title>
    </head>
    <body>
        <!--Script pour création du formulaire (QCM)-->
        <?php
        echo("<h1>Exercice 07 - Questionnaire Tintin et Milou</h1>");
        echo("<hr>");
        // Initialisation du tableau contenant les informations pour le QCM
        // Tableau contenant 1 elément par question
        // Chaque élément contient un tableau avec
        //    1- Le texte de la question
        //    2- Nom du champ de l'input radio
        //    3- Tableau associatif
        //          clé : value du champ input radio (1 pour la réponse correcte
        //          valeur : texte associé

        $qcm = array(
            // Question 1
            array ("Comment s'appelle le chien de Tintin ?", 'rep1',
                array ('2'=> 'Médor', '1'=> 'Milou', '3'=> 'Minou')),
            // Question 2
            array ("Comment s'appelle la cantatrice des aventures de Tintin ?", 'rep2',
                array ('3'=> 'Céline Dion', '2'=> 'Maria Callas', '1'=> 'La Castafiore')),
            // Question 3
            array ('Quelle est la profession de Tintin ?', 'rep3',
                array ('1'=> 'Reporter', '2'=> 'Détective privé', '3'=> 'Explorateur'))
        );

        // Début formulaire
        echo("<form method='POST' action=''>");

        foreach ($qcm as $rep) {
            echo("<h3>".$rep[0]."</h3>\n");
            $name = $rep[1];
            foreach ($rep[2] as $value => $texte) {
                echo("<input type='radio' name='$name' value='$value'/> $texte");
                echo("<br/>");
            }
        }

        echo("<br>");
        echo("<input type='hidden' name='afficher'>");
        echo("<input type='submit' value='Valider'>");
        echo("</form>");
        ?>

        <!--Script pour le contrôle à la réception du formulaire-->
        <?php
            if(isset($_POST['afficher'])){
                $nbReponses = 0;
                $result = 0;
                foreach ($qcm as $rep) {
                    if(isset($_POST[$rep[1]])){     // Contrôle si le bullet est choisi
                        $nbReponses++;
                        if($_POST[$rep[1]] == 1){   // 1 pour réponse juste
                            $result++;
                        }
                    }
                }

            if ($nbReponses < count($qcm)) {
                echo("<p>Vous n'avez pas répondu à toutes les questions</p>\n");
            }else{
                echo("<p>Votre score est: $result réponse(s) correcte(s).</p>");
            }

        }
        ?>
    </body>
</html>
