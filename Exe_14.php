<!--
* User          : oscar
* Date          : 02.01.15
* Time          : 14:09
* Comment       :
* Optimisation  :
-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AdWeb Exercice 14</title>
    <style type="text/css">
        input[type=submit]{
            height:20px;
            width:70px;
            background-color: lawngreen;
        }
        .red{
            color: red;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Exercice 14 - Notes de la classe xxl</h1>
    <hr>
    <form method="post" action="">
        <!-- En-tête du tableau -->
        <table border="1">
            <tr>
                <th width="20%">NOM</th>
                <th width="20%">PRENOM</th>
                <th width="15%">Note semestre 1</th>
                <th width="15%">Note semestre 2</th>
                <th width="15%">Moyenne annuelle</th>
                <th width="15%">Etat</th>
            </tr>
        <?
        // Tableau d'élèves avec pour chaque élément
        // Un tableau pour l'élève en question avec
        // NOM - PRENOM - NOTE 1 - NOTE 2
        $tabEtudiants = array ( array ('Dupont', 'Paul', 'note11', 'note12'),
                                array ('Durand', 'Jean', 'note21', 'note22'),
                                array ('Moreau', 'Emile','note31', 'note32'),
                                array ('Da Silva', 'Oscar','note41', 'note42'));

        /**
         * Description  : Affiche la valeur d'une note
         *              : Si elle n'est pas numérique, elle est ignorée
         *              : Avant affichage, est arrondie à 1 chiffre après la virgule
         * @param $n    : Note $ afficher
         * Retour       : 0 = pas d'erreur
         *              : 1 = pas de saisie ou saisie pas numérique
         *              : 2 = note incohérente
         */
        function afficheNote($n){
            $erreur = 1;
            echo("<input type='text' size='3' name=$n maxlength='3'");
            if (isset($_REQUEST[$n])) {
                // Contrôle si c'est des valeurs numériques
                if (is_numeric($_REQUEST[$n])) {
                    echo('Value="');
                    $note = $_REQUEST[$n];
                    if ($note >= 1 AND $note <= 6) {        // Contrôle si note possible
                        $note = round($note, 1);
                        $erreur = 0;
                    } else {
                        $erreur = 2;
                    }
                    echo($note.'"');
                }
            }
            echo('>');
            if ($erreur == 2) {
                echo("<span class='red'> (*)</span>");
            }
            return $erreur;
        }

        /**
         * Description      : Affichage d'une ligne (td uniquement) du tableau
         * @param $nom      : Nom pris dans le tableau des élèves
         * @param $prenom   : Prénom pris dans le tableau des élèves
         * @param $note1    : Note 1 prise dans le tableau des élèves
         * @param $note2    : Note 2 prise dans le tableau des élèves
         */
        function notesEtudiant($nom, $prenom, $note1, $note2){
            echo("<td>$nom</td><td>$prenom</td><td>");
            $err1 = afficheNote($note1);
            echo("</td><td>");
            $err2 = afficheNote($note2);
            echo("</td>");
            if ($err1 != 0 OR $err2 != 0) {     // Si erreur dans la saise de la note
                echo("<td></td>");              // Cellule de la moyenne vide
                if ($err1 == 2 OR $err2 == 2) { // Si la note n'est pas entre 1 et 6
                    echo("<td><em>Erreur</em></td>");    // Affichage erreur dans la colonne "etat"
                } else {
                    echo("<td></td>");          // Cellule vide dans la colonne "etat"
                }
            } else {                            // Pas d'erreur dans les notes
                $nb1 = round($_REQUEST[$note1], 1);
                $nb2 = round($_REQUEST[$note2], 1);
                $moy = round(($nb1 + $nb2) / 2, 1);
                echo("<td>");
                printf("%3.1f",$moy);
                echo("</td><td>");
                if ($moy >= 4) {                // Personnalisation de la colonne état
                    echo("ok");                 // en fonction de la note >= 4 ou pas
                } else {
                    echo("<span class='red'>Echec</span></td>");
                }
            }
        }

        // Start script
        // Affichage des lignes du tableau avec raffraichissement du formulaire
        // calcul des moyennes et affichage du résultat final
        foreach ($tabEtudiants as $etud) {
            echo("<tr>");
            notesEtudiant($etud[0],$etud[1],$etud[2],$etud[3]);
            echo("</td>");
        }
        ?>
        </table>
        <br>
        <input type="submit" name="send" value="Envoyer"/>
    </form>
</body>
</html>