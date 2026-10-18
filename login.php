<?php
session_start();

// Si deja connecte, on redirige direct
if (isset($_SESSION['login'])) {
    header("Location: profil.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);
    if ($login != "") {
        $_SESSION['login'] = $login;

        $data = ["login" => $login, "date" => date("d/m/Y H:i:s")];
    
        setcookie("infos_connexion", json_encode($data), time()+86400, "/");

        

        header("Location: profil.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Connexion</h2>

<?php
if(isset($_COOKIE['infos_connexion'])){
    // json_decode transforme le texte JSON en tableau PHP
    // true = on veut un tableau associatif, pas un objet
    $infos = json_decode($_COOKIE['infos_connexion'], true);
    echo "<p>Derniere connexion : " . $infos['login'] . " le " . $infos['date'] . "</p>";
    
    // Pour pre-remplir le champ
    $dernier_login_value = $infos['login'];
} else {
    $dernier_login_value = "";
}


/*
    Q: Ou est stockee une session ? Ou est stocke un cookie ?
    R: Session = cote serveur (fichier dans /tmp avec XAMPP)
       Cookie = cote client (navigateur)

    Q: Pourquoi setcookie() et header() doivent etre avant tout affichage ?
    R: Parce qu'ils envoient des en-tetes HTTP.
       Une fois qu'on a fait echo ou <html>, les en-tetes sont deja envoyes,
       donc PHP affiche erreur "headers already sent".
       Il faut toujours les appeler avant meme un espace ou un echo.
*/
?>

<form method="POST">
    Login: <input type="text" name="login" value="<?php echo $dernier_login_value; ?>">
    <button type="submit">Se connecter</button>
</form>
</body></html>