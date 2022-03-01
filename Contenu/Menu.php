<div id="entete" class="menu">
<meta charset="utf-8">
<nav class="menu">
<ul>
<li class="Choix2"> MENU </li>
<li class="Choix"><a style="text-decoration:none" href="/projects/TPWEB/Pages/Emprunt.php">Emprunter</a></li>
<li class="Choix"><a style="text-decoration:none" href="/projects/TPWEB/Pages/Historique.php">Historique</a></li>
<?php
session_start();
$erreur = 0;
echo($_SESSION["newsession"]);
if(isset($_SESSION["newsession"])){
	if($_SESSION["newsession"] == "Deco"){
		
		session_destroy();
	}
	if($_SESSION["newsession"] == "Erreur"){
$erreur = 1;
	}		
if(	$_SESSION["newsession"] == "Administrateur"){
?><li class="Choix"><a style="text-decoration:none" href="/projects/TPWEB/Pages/Comptes.php">Comptes</a></li>	<?php
} else {

}
}
?>
</ul>
<?php if(!isset($_SESSION["newsession"]) | $erreur == 1){  ?>
<div class='connexion'>
<form action="/projects/TPWEB/Contenu/Action.php" method="post">
Login : <input type="text" name="Login" value="" />
Mpd : <input type="password" name="MDP" value = ""/>


<input type="submit" name='connecter' value="Se connecter" onclick="connexion" />
</form>
<p></p>
<?php
if(isset($_SESSION["newsession"])){
if(	$_SESSION["newsession"] == "Erreur"){
echo("Identifiant ou mot de passe incorrect");
}
}
?>
</div>
<?php } else { ?>
<form action="/projects/TPWEB/Contenu/Action.php" method="post">
<input type="submit" name='deconnecter' value="Se deconnecter" onclick="connexion" />	
</form>
<?php }	

?>
</nav>
</div>


