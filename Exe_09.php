<!--
* User          : oscar
* Date          : 26.12.14
* Time          : 16:28
* Comment       :
* Optimisation  :
-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 09</title>
</head>
<body>
    <h1>Exercice 09 - Travail avec des dates</h1>
    <hr>
    <?php echo("<p>Date : ".date('d-m-y H:i:s',time())."</p>");?>

    <form method="post" action="">
        <table>
            <tr>
                <td>Date de naissance : </td>
                <td><input type="text" name="j" size="5"
                    <?php afficheValue('j') ?>/>/</td>
                <td><input type="text" name="m" size="5"
                    <?php afficheValue('m') ?>/>/</td>
                <td><input type="text" name="a" size="5"
                    <?php afficheValue('a') ?>/></td>
            </tr>
        </table>
        <input type="hidden" name="afficher"/>
        <input type="submit" value="Envoyer"/>
    </form>
    <hr>
    
    <!-- Script pour contrôler les données reçues et traiter celles-ci -->
    <?php
        if (isset($_POST['afficher'])) {
            $day = $_POST['j'];
            $month = $_POST['m'];
            $year = $_POST['a'];
            if (verifValue($day) AND verifValue($month) AND verifValue($year)) {
                $sDate = $year."-".$month."-".$day;
                $date = date_create($sDate);
                $dateDujour = date_create_from_format('d-m-Y',time());
                $datetime1 = date_create($sDate);
                $datetime2 = date_create($dateDujour);
                // Calcul de la date seulement si
                    // Date correcte
                    // Date de naissance < date du jour
                if (checkdate($month, $day, $year) AND $datetime1 < $datetime2) {
                    $interval = date_diff($datetime1, $datetime2);
                    echo $interval->format('%a jours se sont écoulés depuis!!');
                    $age = date_diff($datetime1, $datetime2);
                    echo "<br>";
                    echo ("<p style='color: mediumslateblue;'>Vous avez ".$age->y." ans</p>");
                } else {
                    echo("<p style='color: red;'>Erreur : Date de naissance incorrecte</p>");
                    }
                } else {
                    echo("<p style='color: red;'>Erreur : Saisie incorrecte</p>");
            }
        }
    ?>

    <!-- Fonction pour mettre des input:text-->
    <?php
    function afficheValue($name)
    {
        if (isset($_REQUEST[$name])) {
            echo("value='" . $_REQUEST[$name] . "'");
        }
    }
    ?>

    <!-- Fonction pour contrôler un input text saisi -->
    <?php
    function verifValue (&$val){
        $val = trim($val);
        return (is_numeric($val) AND (int)$val == $val);
    }
    ?>

</body>
</html>