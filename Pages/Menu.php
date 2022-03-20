<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../Css/Principal3.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<meta charset="utf-8">
<title>I-Eats</title>
<?php
include "../Contenu/Entete.php";

$restaurant = $_POST['IdRestaurant'];

try{
 include '../Contenu/lire.php' ;
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}

$sqlutil = "SELECT * FROM plat WHERE IdRestaurant = '".$restaurant."'";
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$plats = $prepare->fetchAll();
?>
</head>
<body>
<img class="Backroundimage" width="100%" height="300" src="../Images/Backround2.png"></img>
<img class="Backroundimage2" width="100%" height="300" src="../Images/Rectangle.png"></img>
<div class="Barre">
<T6>Plats à la carte</T6>
<div class="BarreJaune"></div>
</div>
<?php
$value= 1;
foreach ($plats as $plat){	
?>
<div class="BlocPlat" name="BlocPlat" id="test"> 
<form name="RestaurantPlats" action="../Contenu/Action.php" method="post">
<img class="ImagePlat" src="../Images/Restaurant1.png"/> 
<div name="PlatAAjouter" class="Informations2">

<?php
echo "<T3 name='NomPlat'>",$plat['Nom'],"<br/></T3>";
echo "<T4 name='DescriptionPlat'>",$plat['Description'],"<br/></T4>";
echo "<T5 name='TypePlat'>",$plat['Type']," - Taille ",$plat['Taille'],"</T5>";
?>
<input type="hidden" name="quantite" id="quantiteplat" value="1" />
<input type="hidden" name="Prix" value="<?php echo $plat['Prix'] ?>" />
</div>
<?php
echo "<T7 name='Prix'>",$plat['Prix']," €</T7>";
?>
<input type="button" class="PlusMoins" onclick="Moins(<?php echo $value ?>)" value="-"/><label class="quantite" name="quantite"  id="quantite<?php echo($value)?>">1</label><input type="button" class="PlusMoins" onclick="Plus(<?php echo $value ?>)" value="+"/>
<input type="submit" class="ButtonPanier" value="Ajouter au Panier"/>
</form>
</div>

<?php
$value=$value+1;
 } 
 ?>
<div class="espace2"/>
</body>
</html>
<script>
function Plus(value){
	if(parseInt(document.getElementById("quantite"+value).innerHTML)<9){
	var valueplus = parseInt(document.getElementById("quantite"+value).innerHTML) + 1;
	document.getElementById("quantite"+value).innerHTML = valueplus;
	document.getElementById("quantiteplat").value = valueplus;
	}
}
function Moins(value){
	if(parseInt(document.getElementById("quantite"+value).innerHTML)>1){
	var valuemoins = parseInt(document.getElementById("quantite"+value).innerHTML) - 1;
	document.getElementById("quantite"+value).innerHTML = valuemoins;
		document.getElementById("quantiteplat").value = valueplus;
	}
}
</script>