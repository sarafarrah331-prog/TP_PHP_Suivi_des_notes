
<?php

require_once "config.php";

$fichier = "data/notes.csv";

// 1. Vérifier l'existence du fichier
if (!file_exists($fichier)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

// 2. Ouvrir le fichier en lecture
$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier.");
}

$sommeGenerale = 0;
$nombreApprenants = 0;

// 3. Afficher le tableau HTML
echo "<h2>Liste des apprenants</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>";
echo "<th>Nom</th>";
echo "<th>Info</th>";
echo "<th>Math</th>";
echo "<th>Moyenne</th>";
echo "<th>Mention</th>";
echo "</tr>";

// 4. Lire le fichier ligne par ligne
while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {

    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];

    $moyenne = ($info + $math) / 2;

    $sommeGenerale += $moyenne;
    $nombreApprenants++;

    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        $mention = "Passable";
    } else {
        $mention = "Ajourné";
    }

    $nom = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

    echo "<tr>";
    echo "<td>$nom</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>$moyenne</td>";
    echo "<td>$mention</td>";
    echo "</tr>";
}

echo "</table>";

// 5. Fermer le fichier
fclose($handle);

// 6. Calculer la moyenne générale de la classe
if ($nombreApprenants > 0) {

    $moyenneGenerale = $sommeGenerale / $nombreApprenants;

    echo "<p>Moyenne générale de la classe : "
        . round($moyenneGenerale, 2)
        . "</p>";

} else {
    echo "<p>Aucun résultat enregistré.</p>";
}

?>
