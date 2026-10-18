
<?php

require_once "config.php";

if (
    !isset($_POST["nom"]) ||
    !isset($_POST["note_info"]) ||
    !isset($_POST["note_math"])
) {
    exit("Erreur : tous les champs sont obligatoires.");
}

$nom = trim($_POST["nom"]);
$note_info = $_POST["note_info"];
$note_math = $_POST["note_math"];

if (
    $nom === "" ||
    $note_info === "" ||
    $note_math === ""
) {
    exit("Erreur : veuillez remplir tous les champs.");
}

if (
    !is_numeric($note_info) ||
    !is_numeric($note_math)
) {
    exit("Erreur : les notes doivent être numériques.");
}

$note_info = (float) $note_info;
$note_math = (float) $note_math;

if (
    $note_info < NOTE_MIN || $note_info > NOTE_MAX ||
    $note_math < NOTE_MIN || $note_math > NOTE_MAX
) {
    exit("Erreur : les notes doivent être comprises entre "
        . NOTE_MIN . " et " . NOTE_MAX . ".");
}

$dossier = "data";

if (!is_dir($dossier)) {
    mkdir($dossier, 0777, true);
}

$fichier = fopen("data/notes.csv", "a");

if ($fichier === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

fputcsv($fichier, [$nom, $note_info, $note_math], ";");

fclose($fichier);

$nomAffiche = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

echo "<h2>Récapitulatif</h2>";
echo "Nom : " . $nomAffiche . "<br>";
echo "Note informatique : " . $note_info . "<br>";
echo "Note mathématiques : " . $note_math . "<br>";

echo "<p>Résultats enregistrés dans notes.csv.</p>";

// Question 1 : Pourquoi préférer POST à GET pour un mot de passe ?
// Réponse : POST n'affiche pas les données dans l'URL.
// Cependant, POST ne chiffre pas les données.
// Il faut utiliser HTTPS pour protéger le mot de passe.

// Question 2 : Que contient $_REQUEST ?
// Réponse : $_REQUEST contient généralement les données
// envoyées par GET, POST et parfois les cookies,
// selon la configuration de PHP.

?>
