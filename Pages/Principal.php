<?php
session_cache_expire(1);
$cache_expire = session_cache_expire();
session_start();
?>
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

 
if(isset($_SESSION["droits"])){
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
<input type="text" id="Rech" class="BarreRecherche">
<input type="button" class="BouttonRecherche" onclick="RechercheVille(Rech.value)" value="Rechercher"/>
</input>
</div>
<div id="Liste" class="espace"/>
<?php
foreach ($restaurants as $rests){
?>
<form name="<?php echo $rests['id_restau'] ?>" action="Menu.php" method="post">
<div class="BlocRestaurant"> 
<img class="ImageRestaurant" src="../Images/Restaurant1.png"/> 
<div class="Informations">
<input type="hidden" name="IdRestaurant" value="<?php echo $rests['id_restau'] ?>">
<?php
echo "<T3>",$rests['nom'],"<br/></T3>";
echo "<T4>",$rests['adresse'],"<br/></T4>";
echo "<T5>",$rests['heure_ouverture']," - ",$rests['heure_fermeture'],"</T5>";
?>
<input type="submit" class="ButtonRestaurant" value="Consulter le menu" onclick="" />
</div>
</div>
</form>
<?php } ?>
</div>
<div class="espace2"/>
</body>
<?php } ?>
</html>
<script>
var sauvegarde = document.getElementById("Liste").innerHTML;
function RechercheVille(str) {
  if (str == "") {
	    document.getElementById("Liste").innerHTML = sauvegarde;
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Liste").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../Contenu/getrestaurant.php?q="+str,true);
    xmlhttp.send();
  }
}

</script>