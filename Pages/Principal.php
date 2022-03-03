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
<div class="espace"/>
<?php
foreach ($restaurants as $rests){
?>
<div class="BlocRestaurant"> 
<img class="ImageRestaurant" src="../Images/Restaurant1.png"/> 
<div class="Informations">
<?php
echo "<T3>",$rests['Nom'],"<br/></T3>";
echo "<T4>",$rests['Adresse'],"<br/></T4>";
echo "<T5>",$rests['Heure Ouverture']," - ",$rests['Heure Fermeture'],"</T5>";
?>
<input type="button" class="ButtonRestaurant" value="Consulter le menu"/>
</div>
</div>
<?php } ?>
<div class="espace2"/>
</body>
</html>