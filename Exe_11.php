<!--
* User          : oscar
* Date          : 28.12.14
* Time          : 16:10
* Comment       :
* Optimisation  : Selon correction cours
-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 08</title>
    <style type="text/css">
        .cellRight{
            text-align: right;
        }
        input[type=submit]{
            height:20px;
            width:70px;
            background-color: lawngreen;
        }
        input[type=text]{
            text-align: center;
        }
        .star{
            color: red;
        }
        h5{
            color: red;
        }

    </style>
</head>
<body>
    <!-- Start Script -->
    <?
    // Constante pour le nombre de questions
    define("NB", 5);
    generateForm("Exercice 10 - Révision livrets");

    /**
     * Description  : Insertion d'un attribut value dans un champ de type text
     * @param       : $name (nom du champ input)
     */
    function insValue ($name){
        if (isset($_REQUEST[$name])) {
            if ($_REQUEST['action'] != "Nouveau") {
                echo('value = "'.$_REQUEST[$name].'"');
            }
        }
    }

    /**
     * Description      : Génère un formulaire avec le livret
     * @param $title    : Titre du h1
     */
    function generateForm ($title){
        echo("<h1>$title</h1>");
        echo("<hr>");
        echo("<form method='POST' action=''>");
        echo("<table>");
        for($i = 1 ; $i <= NB ; $i++){
            if (isset($_REQUEST['action'])) { // Formulaire envoyé
                if ($_REQUEST['action'] == 'Nouveau') {       // Création d'un nouveau
                    $t = time();
                    $val1 = rand(1,12);
                    $val2 = rand(1,12);
                } else {
                    $val1 = $_REQUEST["val1$i"];        // Restauration des données cachées
                    $val2 = $_REQUEST["val2$i"];
                    $t = $_REQUEST['time'];
                }
            }else{
                $t = time();
                $val1 = rand(1,12);
                $val2 = rand(1,12);
            }

            // Affichage de la table
            echo("<tr>
                    <td class='cellRight'>$val1</td>
                    <td>x</td>
                    <td>$val2</td>
                    <td><input type='text' name=q$i size='5'");
            echo(insValue("q$i")."></td>");
            // Traitement de la réponse fausse ou non remplie
            if (isset($_REQUEST["q$i"])) {
                if ($_REQUEST["q$i"] != ($_REQUEST["val1$i"] * $_REQUEST["val2$i"]) // Réponse fausse
                    and $_REQUEST["action"] != "Nouveau"){
                    echo("<td class='star'>*</td>");
                }
            }
            echo("<input type='hidden' name='val1$i' value='$val1'>");
            echo("<input type='hidden' name='val2$i' value='$val2'>");
            echo("</tr>");
        }
        echo("</table>");
        echo("<br>");
        echo("<input type='hidden' name='time' value=$t>");
        echo("<input type='submit' name='action' value='Valider'>");
        echo("<input type='submit' name='action' value='Nouveau'>");
        echo("</form>");
    }


    /**
    *   Description      : Traiter la réception du formulaire en fonction des champs cachés
     */
    function traiterReponse(){
        $ok = true;
        $nb = 0;
        $t1 = $_REQUEST['time'];
        $t2 = time();

        for ($i = 1; $i <= NB; $i++) {
            if ($_REQUEST["q$i"] =="") {
                $ok = false;
            } else {
                if ($_REQUEST["q$i"] == ($_REQUEST["val1$i"] * $_REQUEST["val2$i"])) {
                    $nb++;
                }
            }
        }
        // Toutes les réponses n'ont pas été données
        if (!$ok) {
            echo("<h5>Vous n'avez pas répondu à toutes les questions!</h5>");
        }
        // Toutes les réponses sont justes
        if ($nb == NB) {
            $sec = $t2-$t1;
            $mn = (INT)($sec/60);
            echo("<h4>Vous avez trouvé toutes les réponses en ");
            if ($mn != 0) {
                echo($mn." min </h4>");
            } else {
                echo($sec." sec </h4>");
            }
        } else {
            echo("<h4>Nombre de bonnes réponses : ".$nb."</h4>");
        }
    }

    // Validation des réponses si réception du formilaire et lic sur le bouton "Valider"
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action'] == 'Valider'){
            traiterReponse();
        }
    }

    ?>
</body>
</html>
