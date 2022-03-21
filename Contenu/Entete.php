<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../Css/Entete3.css" type="text/css">
<div class="entete" onclick="entete()">
<img class="logo" src="../Images/logo.png">
<div class="menubutton">
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
<div class="Accueil" >
<a href="Principal.php" class="lien" style="text-decoration:none;">
<span class="iconify" data-icon="ant-design:home-filled" style="color: white; height:43px;width:43px;"></span>
<T1>Accueil</T1>
</a>
</div>
<div class="Commandes">
<a href="Commandes.php" class="lien" style="text-decoration:none;">
<span class="iconify" data-icon="icon-park-outline:transaction-order" style="color: white; height:43px;width:43px;"></span>
<T1>Commandes</T1>
</a>
</div>
<div class="Panier">
<a href="Panier.php" class="lien" style="text-decoration:none;">
<span class="iconify" data-icon="bx:bxs-cart" style="color: white; height:43px;width:43px;"></span>
<T1>Panier</T1>
</a>
</div>
<div class="Profil">
<span class="iconify" data-icon="ic:sharp-account-circle" onclick="profil()" style="color: white; height:43px;width:43px;"></span>
</div>
<div  id="blockDuProfil" class="blocProfil">
<Tmenu1> Bienvenue <?php echo ($_SESSION["login"]) ?> </Tmenu1>
<Tmenu2 onclick="deco()">Se déconnecter</Tmenu2>
</div>
</div>
</div>
</head>
</html>
<script>
var nb=1;
	document.getElementById("blockDuProfil").style.display = "none";
	

function profil(){
	if(nb % 2 != 0){
		document.getElementById("blockDuProfil").style.display = "block";
	} else {
	document.getElementById("blockDuProfil").style.display = "none";
	}
	nb=nb+1;
}

function deco(){
        document.location = '../Contenu/destroy_session.php';
}


</script>