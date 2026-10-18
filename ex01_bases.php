<?php
echo "<h3>Partie O : Mise en place</h3>";

echo 'Hello PHP'; 

//commentaire sur un ligne avec deux barres obliques
#commentaire sur un ligne avec un dièse 
/*commentaire sur plusieur lignes 
*/
echo "<h3>Exercice 1.1</h3>";
// $x : valide, car le nom commence par une lettre.
$x = 10;

// $_x : valide, car le nom peut commencer par un underscore.
$_x = 20;

// $2x : invalide, car un nom de variable ne peut pas commencer par un chiffre.

// $x-y : invalide comme nom de variable, car le tiret (-) n'est pas autorise.

// $Prix_HT : valide, car les lettres et le underscore (_) sont autorises.
$Prix_HT = 100;

// $prix ht : invalide, car un nom de variable ne peut pas contenir un espace.

// $état : valide en PHP 8, car les identifiants peuvent contenir des caracteres Unicode.
$état = "Disponible";

 
//Les variables $a et $A sont distinctes, car PHP distingue les lettres majuscules et minuscules
$a = 10;
$A = 20;
echo "<br>";
echo $a; // Affiche 10
echo "<br>";
echo $A; // Affiche 20
echo "<h3>Exercice 1.2</h3>";
require "config.php";

echo "ETABLISSEMENT : " . ETABLISSEMENT . "<br>";
echo "NOTE_MIN : " . NOTE_MIN . "<br>";
echo "NOTE_MAX : " . NOTE_MAX . "<br>";
echo "SEUIL : " . SEUIL . "<br>";

if (defined("SEUIL")) {
    echo "SEUIL est definie.<br>";
} else {
    echo "SEUIL n'est pas definie.<br>";
}

if (defined("INCONNUE")) {
    echo "INCONNUE est definie.<br>";
} else {
    echo "INCONNUE n'est pas definie.<br>";
}
// 1. Que se passe-t-il si on affiche une constante non définie ?
// PHP affiche un avertissement et le nom de la constante peut être interprété comme une chaîne de caractères.
// Il est préférable de vérifier son existence avec defined() avant de l'utiliser.

// 2. Quelle différence y a-t-il entre const et define() ?
// const permet de déclarer une constante directement.
// define() permet de déclarer une constante à l'aide d'une fonction.
// const est généralement utilisé directement dans le code,
// tandis que define() peut être utilisé de manière conditionnelle.
echo "<h3>Exercice 1.3 </h3>";
$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "le  prix TTC du produit est de $prix_ttc €.";


echo "<h3>Exercice 1.4 </h3>";
$test = (string) 42; 
echo "test = $test - type: " . gettype($test) . "<br>";
var_dump($test) ;

echo "<br>";
var_dump((bool) 0);      
var_dump((bool) 0.0);    
var_dump((bool) "0");    
var_dump((bool) "");     
var_dump((bool) "abc");  
var_dump((bool) []);     
var_dump((bool) null);   

echo "<br>";

var_dump((int) 3.9);         
var_dump((int) "12abc");     
var_dump((float) "1.5e3");   
var_dump((int) true);

echo "<br>";


$dec = 255;          
$hex = 0xFF;         
$oct = 0377;         
$bin = 0b11111111;   

echo "Décimal: $dec <br>";
echo "Hexa: $hex <br>";
echo "Octal: $oct <br>";
echo "Binaire: $bin <br>";

var_dump($dec, $hex, $oct, $bin);
echo "<h3>Exercice 1.5</h3>";

$traitees = "égales à";
$ici = 2;

echo "Ahmed a dit : \"J'ai réussi\"<br>";

echo "Voulez-vous supprimer C:\\*.*? <br>";


echo 'Ceci n\'affichera pas \n de nouvelle ligne (le \n doit apparaître tel quel)<br>';


echo 'Les variables ne seront pas $traitees $ici<br>';


echo "Les variables seront $traitees $ici<br>";

echo "<br>";
$a = "*Bonjour les développeurs*";
$b = trim($a, "*");
echo $b . "<br>";


for($i=0; $i<strlen($b); $i++){
    echo $b[$i] . "<br>";
}






?>