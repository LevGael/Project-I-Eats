<link rel="stylesheet" href="../Css/Principal.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<?php
$ville = $_GET['q'];

try{
 include '../Contenu/lire.php' ;
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}


$sqlutil = "SELECT * FROM restaurant WHERE Ville = '".$ville."'";
$prepare = $dbh->prepare($sqlutil);
$prepare->execute();
$restaurants = $prepare->fetchAll();
foreach ($restaurants as $rests){
?>
<form name="<?php echo $rests['IdRestaurant'] ?>" action="Menu.php" method="post">
<div class="BlocRestaurant"> 
<img class="ImageRestaurant" src="../Images/Restaurant1.png"/> 
<div class="Informations">
<input type="hidden" name="IdRestaurant" value="<?php echo $rests['IdRestaurant'] ?>">
<?php
echo "<T3>",$rests['Nom'],"<br/></T3>";
echo "<T4>",$rests['Adresse'],"<br/></T4>";
echo "<T5>",$rests['Heure Ouverture']," - ",$rests['Heure Fermeture'],"</T5>";
?>
<input type="submit" class="ButtonRestaurant" value="Consulter le menu" onclick="" />
</div>
</div>
</div>
<?php } ?>

<div class="espace2"/>
