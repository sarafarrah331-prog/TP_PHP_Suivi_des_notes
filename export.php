
<?php

require_once "config.php";

$fichierCSV = "data/notes.csv";
$fichierJSON = "data/notes.json";

// 1. Vérifier l'existence du fichier CSV
if (!file_exists($fichierCSV)) {
    exit("Erreur : fichier CSV introuvable.");
}

// 2. Ouvrir le fichier CSV en lecture
$handle = fopen($fichierCSV, "r");

if ($handle === false) {
    exit("Erreur d'ouverture du fichier CSV.");
}

// 3. Lire les données du fichier CSV
$resultats = [];

while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {

    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];

    $moyenne = ($info + $math) / 2;

    $resultats[] = [
        "nom" => $nom,
        "notes" => [
            "info" => $info,
            "math" => $math
        ],
        "moyenne" => $moyenne
    ];
}

// 4. Fermer le fichier CSV
fclose($handle);

// 5. Transformer le tableau PHP en JSON
$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    exit("Erreur de conversion JSON.");
}

// 6. Enregistrer les données dans le fichier JSON
if (file_put_contents($fichierJSON, $json) === false) {
    exit("Erreur d'écriture du fichier JSON.");
}

// 7. Lire le fichier JSON
$jsonLu = file_get_contents($fichierJSON);

if ($jsonLu === false) {
    exit("Erreur de lecture du fichier JSON.");
}

// 8. Convertir JSON en tableau PHP
$donnees = json_decode($jsonLu, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    exit("Erreur de lecture du format JSON.");
}

// 9. Afficher le résultat
echo "<h2>Contenu JSON enregistré</h2>";

echo "<pre>" . htmlspecialchars($jsonLu, ENT_QUOTES, "UTF-8") . "</pre>";
// Question théorique : JSON ou serialize() ?
// JSON est directement exploitable par JavaScript.
// serialize() produit un format propre à PHP.


?>
