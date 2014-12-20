<!--
* User          : oscar
* Date          : 20.12.14
* Time          : 18:08
* Comment       : Utilisation d'un tableau pour le formulaire
* Optimisation  :
-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AdWeb Exercice 04</title>
    </head>

    <body>
        <h1>Exercice 05 - Calculatrice</h1>
        <hr>
        <form method="post" action="">
            <h2>Calculette</h2>
            <table>
                <tr>
                    <td><input type="text" name="op1" id="o1"/></td>
                    <td><select name="operande" id="oper">
                            <option value="plus">+</option>
                            <option value="moins">-</option>
                            <option value="mul">*</option>
                            <option value="div">/</option>
                        </select>
                    </td>
                    <td><input type="text" name="op2" id="o2"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="calculer" name="envoi"/></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['envoi'])){
                // Récupération des infos
                $op1 = $_POST['op1'];
                $op2 = $_POST['op2'];
                $operande = $_POST['operande'];

                // Gestion calculette
                if(is_numeric($op1) and is_numeric($op2)){
                    switch($operande){
                        case 'plus':
                            $result = $op1 + $op2;
                            echo("<p>Résultat = $result</p>");
                            break;
                        case 'moins':
                            $result = $op1 - $op2;
                            echo("<p>Résultat = $result</p>");
                            break;
                        case 'mul':
                            $result = $op1 * $op2;
                            echo("<p>Résultat = $result</p>");
                            break;
                        case 'div':
                            if($op2 == 0){
                                echo("<p>Impossible de diviser par 0</p>");
                            }else{
                                $result = $op1 / $op2;
                                echo("<p>Résultat = $result</p>");
                            }
                            break;
                    }
                }else{
                    echo("<p style='color: red'>Les valeurs doivent être numériques</P>");
                }
            }else{
                echo("<p style='color: grey;'>Info : Formulaire vide - varaible POST non définie</p>");
            }
        ?>
    </body>
</html>
