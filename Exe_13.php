<!--
* User          : oscar
* Date          : 02.01.15
* Time          : 10:20
* Comment       : Le message "Vérifier votre réponse" apparait à à droite dans la version originale
* Optimisation  : On pourrait colorier en rouge le texte choisi si ce n'est pas la bonne réponse
-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 13</title>
    <style type="text/css">
        input[type=submit]{
            height:20px;
            width:70px;
            background-color: lawngreen;
        }
        h6{
            color: red;
            padding: 0;
            margin: 0;
        }
        .green{
            color: forestgreen;
        }
        .orange{
            color: orangered;
        }
    </style>
</head>
<body>
<h1>Exercice 13 - Quizz</h1>
<hr>
<?php
/**
 * Description  : Insertion de l'attribut checked si déjà sélectionné
 * @param $ch   : Nom du champ radio
 * @param $val  : attribut value du champ radio
 */
function insCheck ($ch, $val){
    if (isset($_REQUEST[$ch])) {
        if ($_REQUEST[$ch] == $val) {
            echo('checked="checked"'); // On "check" le bouton radio
        }
    }
}

/**
 * Description  : Insertion du message d'erreur si réponse fausse
 * @param $ch   : Nom du champ radio
 * @param $val  : attribut value de la bonne réponse
 */
function verifReponse($ch, $val){
    if (isset($_REQUEST[$ch])) {
        if ($_REQUEST[$ch] != $val) {
            echo("<h6>*Vérifier votre réponse</h6>");
        }
    }
}

/**
 * Description      : Initialisation du tableau contenant les informations pour le QCM
 *                  : Tableau contenant 1 elément par question :
 *                  : Chaque élément contient un tableau avec :
 *                  :   1. Le texte de la questio
 *                  :   2. Nom du champ de l'input radio
 *                  :   3. Value de la bonne réponse
 *                  :   4. Tableau associatif
 *                  :       clé     : value du champ input radio
 *                  :       valeur  : texte associé à l'input radio
 * @param $titreQCM : Titre du quizz
 * @param $qcm      : Questionnaire (array)
 */
function initQCM(&$titreQCM, &$qcm){
    $titreQCM = "Questionnaire Tintin et milou";
    $qcm = array (
        array ('Comment s\'appelle le chien de Tintin ?', 'rep1','2',
            array ('1'=> 'Médor', '2'=> 'Milou', '3'=> 'Minou')),
        array ('Comment s\'appelle la cantatrice des aventures de Tintin ?', 'rep2', '3',
            array ('1'=> 'Céline Dion', '2'=> 'Maria Callas', '3'=> 'La Castafiore')),
        array ('Quelle est la profession de Tintin ?', 'rep3', '1',
            array ('1'=> 'Reporter', '2'=> 'Détective privé', '3'=> 'Explorateur')),
        array ('Quel est le prénom de Tournesol ?', 'rep4', '2',
            array ('1'=> 'Nestor', '2'=> 'Tryphon', '3'=> 'Georges')));
}

/**
 * Description   : Création du document (formulaire)
 * @param $title : Titre de la page
 * @param $tab   : A VOIR!!!!!!
 */
function generateForm($title, $tab){
    echo("<h3>$title</h3>");
    echo("<form method='post' action=''>");

    foreach ($tab as $rep) {
        echo("<h4>$rep[0]</h4>");   // Titre de la question
        echo("<table>");    // Début table ligne 1 et cellule 1
        $name = $rep[1];            // Nom du champ input radio
        foreach ($rep[3] as $value => $texte) {
            echo("<tr><td>");
            echo("<input type='radio' name='".$name."' value='".$value."'");
            echo(insCheck($rep[1], $value));
            echo("</td>");                      // Fin de la cellule avec l'input
            echo("<td>$texte</td>");            // Fin de la cellule avec le texte et fin de la ligne
        }
        echo verifReponse($name, $rep[2])."</table>";  // Fin de la ligne et de la table
    }
    echo("<input type='hidden' name='afficher'><br>");
    echo("<input type='submit' value='Valider'>");
    echo("</form>");
}

/**
 * Description  :
 * @param $tab  :
 */
function traiterReponse($tab){
    $i = 0;
    $complet = TRUE;

    // Parcours du tableau des réponses pour voir si toutes les réponses ont été données
    while ($i < count($tab) AND $complet) {
        $complet = isset($_REQUEST[$tab[$i][1]]);
        $i++;
    }

    if (!$complet) {
        echo("<h3>Vous n'avez pas répondu à toutes les questions</h3>");
    } else {
        $nb = 0;
        foreach ($tab as $q) {
            if ($_REQUEST[$q[1]] == $q[2]) {            // Si la réponse est juste
                $nb++;
            }
        }
        if ($nb == count($tab)) {
            echo("<h2 class='green'>Bravo, toute les réponses sont correctes</h2>");
        } else {
            echo("<h2 class='orange'>$nb réponses correctes </h2>");
        }
    }

}

// Start Script
initQCM($title, $tabQCM);       // Init du tableau avec les questions!
generateForm($title, $tabQCM);  // Création de la page (formulaire)
echo("<br>");

if (isset($_REQUEST['afficher'])) {
    traiterReponse($tabQCM);
}


?>
</body>
</html>