<?php session_start(); ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../Css/Principal.css" type="text/css">
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
inner Join association asso on asso.IdCommande = co.IdCommande inner join plat pl on pl.IdPlat = asso.IdPlat where IdUtilisateur = '".$_SESSION["ID"]."'";
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$plats = $prepare->fetchAll();
$total = 0;
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
foreach ($plats as $plat){
	$total = $total + $plat['Prix total'];
?>
<div class="BlocPanier"> 
<img class="ImagePanier" src="../Images/Restaurant1.png"/> 
<div class="Informations2">
<?php
echo "<T8>",$plat['Nom'],"<br/></T8>";
echo "<T9> Quantité : ",$plat['quantite'],"<br/></T9>";
echo "<T10>",$plat['Prix total']," €</T10>";
?>
<input type="button" class="ButtonPanier" value="Supprimer"/>

</div>
</div>
<?php } ?>
<div class="BlocPanier"> 
<T11>Total : </T11><T12><?php echo $total ?> €</T12>
<input type="button" class="buttonComfirmer" value="Payer"/>
</div>
<div class="espace2"/>
</body>
</html>