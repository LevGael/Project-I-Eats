<!doctype html>
<html>
<link rel="stylesheet" href="./Css/Connexion.css" type="text/css">
<link rel="stylesheet" href="./Css/Page.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
<head>
<meta charset="utf-8">
<title>Bienvenue à I-Eats</title>
<?php
try{
 include '/Contenu/lire.php' ;
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}

$sqlutil = 'SELECT * FROM utilisateur';
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$utilisateurs = $prepare->fetchAll();

$message="";

    //===========================================================
    // vérification : est-ce qu'il y a des données envoyées
    //===========================================================
    if (isset($_GET["login"]) && isset($_GET["passwd"]))
    {
		foreach ($utilisateurs as $utilisateur ) {
        if ($_GET["login"]==$utilisateur['Mail'] && password_verify($_GET["passwd"], $utilisateur['Mdp']))
        {
			session_start();
            $_SESSION["login"] = $utilisateur['Nom'];
            $_SESSION["droits"] = $utilisateur['Rôle'];
			$_SESSION["ID"] = $utilisateur['IdUtilisateur'];
            header("location:Pages/Principal.php");
            exit();
        }
		}		
            $message = "Erreur, l'email ou le mot de passe est inccorect";
    } 


?>
</head>
<body>
<div id="modal-connexion" class="page-connexion">
<img class="logo" src="./Images/logo.png">
<form action="index.php" method="get">
<div class="formulaire-connexion">
<texte1>E-mail</texte1><br>
<div class='email'>
<span class="icon-connexionutilisateur" title=" utilisateur"><i class="fab-solid fa-at"></i></span>
<input type='text' name="login" value=''><br>
</div>
<br>
<texte1>Mot de passe</texte1><br>
<div class='password'>
<span class="icon-connexionutilisateur" title=" utilisateur"><i class="fa-solid fa-key"></i></span>
<input type='password' name="passwd"  value=''><br>
</div>
<div>
<NOBR>
<input type='submit' class='connecter' value="Se connecter">
</div>
</form>
<form action="Pages/Inscription.php" method="post">
<input type='submit' class='inscrire' value="S'inscrire">
</form>
 <em><?php echo $message; ?></em>
</div>
</div>
</body>
</html>