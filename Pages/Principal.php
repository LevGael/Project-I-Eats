<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../Css/Principal.css" type="text/css">
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
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

$sqlutil = 'SELECT * FROM restaurant';
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$restaurants = $prepare->fetchAll();
?>
</head>
<body style="margin:0px;">
<img class="Backroundimage" width="100%" height="300" src="../Images/Backround1.png"/>
<div class="Recherche">
<T2>Entre ta ville et sélectionne ton restaurant</T2>
<p></p>
<input type="text" class="BarreRecherche">
<input type="button" class="BouttonRecherche" onclick="Chercher" value="Rechercher"/>
</input>
</div>
<?php
foreach ($restaurants as $rests){
?>
<div class="BlocRestaurant"> 

</div>
<?php } ?>
</body>
</html>