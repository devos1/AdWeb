<!--
/**
 * User: oscar
 * Date: 06.12.14
 * Time: 14:57
 */
 -->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 01</title>
    </head>
    <body>
        <?php
            echo("<h1>Exercice 01 - Table de multiplication</h1>\n");
            echo("<hr>");
            echo("<table border='1'>");
            for ($i = 0; $i <= 12; $i++) {
                echo("<tr>");
                for($j = 0 ; $j <= 12 ; $j++){
                    if($i == 0 and $j == 0){
                        echo("<td align='center' width='30px' style='color: white' bgcolor='#8a2be2'>");
                        echo("X");
                        echo("</td>");
                    }elseif($i == 0){
                        echo("<td align='center' width='30px' style='color: white' bgcolor='#8a2be2'>");
                        echo("$j");
                        echo("</td>");
                    }
                    elseif($j == 0){
                        echo("<td align='center' style='color: white' bgcolor='#8a2be2'>");
                        echo("$i");
                        echo("</td>");
                    }else{
                        $result = $i * $j;
                        echo("<td align='center'>");
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
