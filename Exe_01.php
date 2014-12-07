<!--
/**
 * User: oscar
 * Date: 06.12.14
 * Time: 14:57
 */
 -->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 01</title>
    </head>
    <body>
        <?php
            // Constante pour définir le nb max
            define("nbMax", 12);
            // Variables pour le style
            $align = "align='center'";
            $width = "width='30px'";
            $fontColor = "style='color: white'";
            $bgColor = "bgcolor='#8a2be2'";

            echo("<h1>Exercice 01 - Table de multiplication</h1>\n");
            echo("<hr>");
            echo("<table border='1'>");
            for ($i = 0; $i <= nbMax; $i++) {
                echo("<tr>");
                for($j = 0 ; $j <= nbMax ; $j++){
                    if($i == 0 and $j == 0){
                        echo("<td $align $width $fontColor $bgColor>");
                        echo("X");
                        echo("</td>");
                    }elseif($i == 0){
                        echo("<td $align $width $fontColor $bgColor>");
                        echo("$j");
                        echo("</td>");
                    }
                    elseif($j == 0){
                        echo("<td $align $fontColor $bgColor>");
                        echo("$i");
                        echo("</td>");
                    }else{
                        $result = $i * $j;
                        echo("<td $align>");
                        echo("$result");
                        echo("</td>");
                    }
                }
                echo("</tr>");
            }
            echo("</table>")
        ?>
    </body>
</html>
