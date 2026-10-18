<?php

$nom = $_GET["nom"] ?? "";
$prenom = $_GET["prenom"] ?? "";
$sexe = $_GET["sexe"] ?? "";

$nom = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");
$prenom = htmlspecialchars($prenom, ENT_QUOTES, "UTF-8");

if ($sexe == "M") {
    echo "Bonjour Monsieur " . $prenom . " " . $nom;
} elseif ($sexe == "F") {
    echo "Bonjour Madame " . $prenom . " " . $nom;
} else {
    echo "Veuillez remplir le formulaire.";
}

?>
