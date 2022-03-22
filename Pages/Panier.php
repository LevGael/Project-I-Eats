<?php session_start(); ?>
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


try{
 include '../Contenu/lire.php' ;
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}

$sqlutil = "SELECT * FROM panier pa inner Join commande co on co.IdCommande = pa.IdCommande
inner Join association asso on asso.IdCommande = co.IdCommande inner join plat pl on pl.id_plat = asso.IdPlat where IdUtilisateur = '".$_SESSION["ID"]."'";
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$plats = $prepare->fetchAll();
$total = 0;

	  if(array_key_exists('idpanier', $_POST)) {
            EnleverPanier();
        } else {
			
		}	
		
		  if(array_key_exists('idpanier2', $_POST)) {
            ComfirmerPanier();
        } else {
			
		}	
		
		function EnleverPanier(){
$idpanier = $_POST["idpanier"];
try{
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8' , LOGIN, MDP);
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}
	$sql = "Delete from panier where IdPanier = '".$idpanier."'";
	$prepare = $dbh->prepare($sql);
	
    if ($prepare->execute()) {
		?>
<?php echo "<script type='text/javascript'> document.location = '/projects/I-Eats/Pages/Panier.php'; </script>";?>
		<?php
} else {
  echo "Erreur, Impossible de créer l'enregistrement";
}
}

		function ComfirmerPanier(){
$utilisateur = $_SESSION["ID"];
$idCommande = $_POST["idcommande2"];
try{
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8' , LOGIN, MDP);
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}
	$sql = "Update panier set StatutPanier='Effectué' where IdCommande = '".$idCommande."'";
	$prepare = $dbh->prepare($sql);
	
    if ($prepare->execute()) {
		?>
<?php echo "<script type='text/javascript'> document.location = '/projects/I-Eats/Pages/Panier.php'; </script>";?>
		<?php
} else {
  echo "Erreur, Impossible de créer l'enregistrement";
}
}
?>
</head>
<body>
<img class="Backroundimage" width="100%" height="300" src="../Images/Backround3.png"></img>
<img class="Backroundimage2" width="100%" height="300" src="../Images/Rectangle.png"></img>
<div class="Barre">
<T6>Panier de commandes</T6>
<div class="BarreJaune"></div>
</div>
<?php
foreach ($plats as $plat ){
	if($plat["StatutPanier"] == "En cours"){
	$total = $total + $plat['Prix_total'];
?>
<div class="BlocPanier"> 
<img class="ImagePanier" src="../Images/Restaurant1.png"/> 
<div class="Informations2">
<?php
echo "<T8>",$plat['nom'],"<br/></T8>";
echo "<T9> Quantité : ",$plat['quantite'],"<br/></T9>";
echo "<T10>",$plat['Prix_total']," €</T10>";
?>
<form name="RemovePanier" action="Panier.php" method="post">
<input type="hidden" name="idpanier" value='<?php echo ($plat['IdPanier']) ?>'/>
<input type="submit" class="ButtonPanier" value="Supprimer"/>
</form>

</div>
</div>
<?php } } ?>
<div class="BlocPanier"> 
<T11>Total : </T11><T12><?php echo $total ?> €</T12>
<form name="ComfirmerPanier" action="Panier.php" method="post">
<input type="hidden" name="idpanier2" value='<?php echo ($plat['IdPanier']) ?>'/>
<input type="hidden" name="idcommande2" value='<?php echo ($plat['IdCommande']) ?>'/>
<input type="submit" class="buttonComfirmer" value="Payer"/>
</form>
</div>
<div class="espace2"/>
</body>
</html>