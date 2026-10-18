<?php include "includes/entete_inc.php"; ?>
<?php include "includes/menu_inc.php"; ?>
<?php

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

echo "<h3>Tableau associatif des notes</h3>";

foreach ($notes as $nom => $note) {
    echo $nom . " : " . $note . "<br>";
}

$modules = [
    "Programmation PHP",
    "Algorithmique",
    "Système d'exploitation"
];

echo "<h3>Tableau des modules avec foreach</h3>";

foreach ($modules as $module) {
    echo $module . "<br>";
}

echo "<h3>Accès par indice</h3>";

echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";
echo "<br>";



require "config.php";

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

echo "<table border='1'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo "<tr style='color:red'>";
    } else {
        echo "<tr>";
    }

    echo "<td>" . $nom . "</td>";
    echo "<td>" . $note . "</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br>";



$somme = 0;
$meilleure = null;
$faible = null;

foreach ($notes as $note) {
    $somme = $somme + $note;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($faible === null || $note < $faible) {
        $faible = $note;
    }
}

$nombre = count($notes);
$moyenne = $somme / $nombre;

echo "Somme : " . $somme . "<br>";
echo "Moyenne : " . $moyenne . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $faible . "<br>";

echo "<hr>";
echo "Somme vérifiée : " . array_sum($notes) . "<br>";
echo "Nombre de notes : " . count($notes) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";



$effectifs = [];

foreach ($notes as $note) {
    $m = mention($note);

    if (isset($effectifs[$m])) {
        $effectifs[$m]++;
    } else {
        $effectifs[$m] = 1;
    }
}

foreach ($effectifs as $m => $nombre) {
    echo $m . " : " . $nombre . "<br>";
}

echo "<h3>Exercice 3.4<h3>";



function afficher($tab) {
    foreach ($tab as $nom => $note) {
        echo $nom . " : " . $note . "<br>";
    }
    echo "<hr>";
}

// 1. Noms croissants
$tab = $notes;
ksort($tab);
echo "<h3>Noms croissants</h3>";
afficher($tab);

// 2. Notes décroissantes
$tab = $notes;
arsort($tab);
echo "<h3>Notes décroissantes</h3>";
afficher($tab);

// 3. Noms décroissants
$tab = $notes;
krsort($tab);
echo "<h3>Noms décroissants</h3>";
afficher($tab);

// 4. Notes croissantes
$tab = $notes;
asort($tab);
echo "<h3>Notes croissantes</h3>";
afficher($tab);

// Question : tableau indexé
sort($modules);

echo "<br>";
echo "<h3>Exercice 3.5<h3>";



$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<pre>";

var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);

echo "</pre>";
?>
<?php include "includes/pied_inc.php"; ?>








