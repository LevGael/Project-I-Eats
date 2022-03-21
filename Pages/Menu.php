<?php session_start() ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../Css/Principal4.css" type="text/css">
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

	  if(array_key_exists('quantite', $_POST)) {
            AjouterPanier();
        } else {
			
		}	
		
		function AjouterPanier(){
$Date = date(DATE_ATOM);
$status = "En livraison";
$prix = $_POST["quantite"] * $_POST["Prix"] ;
$utilisateur = $_SESSION["ID"];
$quantite = $_POST["quantite"];
try{
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8' , LOGIN, MDP);
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}
	$sql = "INSERT into commande(Date_Commande,StatutCommande,Prix_total,IdUtilisateur,quantite) VALUES ('$Date','$status','$prix','$utilisateur','$quantite') ";
	$prepare = $dbh->prepare($sql);
	
    if ($prepare->execute()) {
		?>
        <script> 
		document.getElementById("Estajoute").removeAttribute("hidden"); 
		</script>
		<?php
} else {
  echo "Erreur, Impossible de créer l'enregistrement";
}
}
?>
</head>
<body>
<img class="Backroundimage" width="100%" height="300" src="../Images/Backround2.png"></img>
<img class="Backroundimage2" width="100%" height="300" src="../Images/Rectangle.png"></img>
<div class="Barre">
<T6>Plats à la carte</T6>
<div class="BarreJaune"></div>
</div>
<label id="Estajoute" hidden>Votre commande a été ajouté au pannier</label>
<?php
$value= 1;
foreach ($plats as $plat){	
?>
<div class="BlocPlat" name="BlocPlat" id="test"> 
<form name="RestaurantPlats" action="Menu.php" method="post">
<img class="ImagePlat" src="../Images/Restaurant1.png"/> 
<div name="PlatAAjouter" class="Informations2">

<?php
echo "<T3 name='NomPlat'>",$plat['Nom'],"<br/></T3>";
echo "<T4 name='DescriptionPlat'>",$plat['Description'],"<br/></T4>";
echo "<T5 name='TypePlat'>",$plat['Type']," - Taille ",$plat['Taille'],"</T5>";
?>
<input type="hidden" name="quantite" id="quantiteplat" value="1" />
<input type="hidden" name="Prix" value="<?php echo $plat['Prix'] ?>" />
<input type="hidden" name="IdRestaurant" value="<?php echo $_POST['IdRestaurant'] ?>" />
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