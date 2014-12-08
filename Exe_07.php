<!--
 * User: oscar
 * Date: 08.12.14
 * Time: 19:12
 -->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 07</title>
    </head>
    <body>
        <?php
            echo("<h1>Exercice 07 - Questionnaire Tintin et Milou</h1>");
            echo("<hr>");

            $i = 0;
            $questions = array(
            "Comment s'appelle le chien de Tintin?",
            "Comment s'appelle la cantatrice des aventures de Tintin?",
            "Quelle est la profession de Tintin"
            );

            echo("<form method='POST'>");
            $reponses = array(
                array("Médor", "Milou", "Minou"),
                array("Céline Dion", "Maria Callas", "La castafiore"),
                array("Reporter", "Détective privé", "Explorateur")
            );

            foreach($questions as $q){
                echo("<h3>$q</h3>");
                foreach($reponses[$i] as $r){
                    switch($i){
                        case 0:
                            echo("
                                <input type='radio' name='q1' value='$r' > $r
                                <br>");
                                break;
                        case 1:
                            echo("
                                <input type='radio' name='q2' value='$r' > $r
                                <br>");
                                break;
                        case 2:
                            echo("
                                <input type='radio' name='q3' value='$r' > $r
                                <br>");
                                break;
                    }
                }
                $i++;
            }
            echo("<br>");
            echo("<input type='submit'");
            echo("</form>");

            $rep = array();
            $j = 1;
            if(isset($_POST['q1']) and isset($_POST['q2']) and isset($_POST['q3'])){
                $r = 'q' & $j;
                $rep[$j] = $_POST['$r'];
                echo("<p>$rep[$j]</p>");
            }

        ?>
    </body>
</html>
