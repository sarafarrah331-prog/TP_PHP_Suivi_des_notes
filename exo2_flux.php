<?php
echo "<h2>Partie 2 : Structures de controle et boucles</h2>";
require "config.php";

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

echo "Note 18 : " . mention(18) . "<br>";
echo "Note 15 : " . mention(15) . "<br>";
echo "Note 13 : " . mention(13) . "<br>";
echo "Note 10 : " . mention(10) . "<br>";
echo "Note 7 : " . mention(7) . "<br>";
echo "<br>";
echo "<h3>Exercice 2.2</h3>";

$mois = date("m");
echo "Numero du mois actuel : " . $mois . "<br>";

switch($mois){
    case "01":
        echo "Janvier";
        break;
    case "02":
        echo "Fevrier";
        break;
    case "03":
        echo "Mars";
        break;
    case "04":
        echo "Avril";
        break;
    case "05":
        echo "Mai";
        break;
    case "06":
        echo "Juin";
        break;
    case "07":
        echo "Juillet";
        break;
    case "08":
        echo "Aout";
        break;
    case "09":
        echo "Septembre";
        break;
    case "10":
        echo "Octobre";
        break;
    case "11":
        echo "Novembre";
        break;
    case "12":
        echo "Decembre";
        break;
    default:
        echo "Mois invalide";
}

// Question 3 : si on oublie break, le programme n s'arrete pas
// il continue et affiche les mois suivants aussi
echo "<h3>Exercice 2.3</h3>";



for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";


$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i = $i + 2;
}

echo "<br>";



for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo $i . "<br>";
}

echo "<br>";



$i = 1;

while ($i <= 15) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}
echo "<br>";



$i = 0;

do {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i = $i + 2;

} while ($i <= 20);

?>











