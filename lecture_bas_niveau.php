<?php

$fichier = "data/notes.csv";

// Vérifier si le fichier existe
if (!file_exists($fichier)) {
    exit("Erreur : fichier introuvable.");
}

// Ouvrir le fichier en lecture
$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier.");
}

echo "<h2>Lecture avec fgets et explode</h2>";

// Lire le fichier ligne par ligne
while (!feof($handle)) {

    $ligne = fgets($handle);

    if ($ligne === false) {
        break;
    }

    $ligne = trim($ligne);

    // Séparer les données avec le point-virgule
    $donnees = explode(";", $ligne);

    if (count($donnees) >= 3) {

        $nom = htmlspecialchars($donnees[0], ENT_QUOTES, "UTF-8");
        $info = htmlspecialchars($donnees[1], ENT_QUOTES, "UTF-8");
        $math = htmlspecialchars($donnees[2], ENT_QUOTES, "UTF-8");

        echo $nom . " : " . $info . " / " . $math . "<br>";
    }
}

// Fermer le fichier
fclose($handle);

?>
