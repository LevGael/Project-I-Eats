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

$sqlutil = 'SELECT * FROM plat';
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
foreach ($plats as $plat){
?>
<div class="BlocPlat"> 
<img class="ImagePlat" src="../Images/Restaurant1.png"/> 
<div class="Informations2">
<?php
echo "<T3>",$plat['Nom'],"<br/></T3>";
echo "<T4>",$plat['Description'],"<br/></T4>";
echo "<T5>",$plat['Type']," - Taille ",$plat['Taille'],"</T5>";
echo "<T7>",$plat['Prix']," €</T7>";
?>
<input type="button" class="ButtonPanier" value="Ajouter au Panier"/>
</div>
</div>
<?php } ?>
<div class="espace2"/>
</body>
</html>