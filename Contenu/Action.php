<?php session_start(); ?>
<meta charset="utf-8">
<link rel="stylesheet" href="../Css/Success.css" type="text/css">
<title>Emprunter</title>
<?php
  if(array_key_exists('Inscription', $_POST)) {
            Emprunter();
        } else {
			
		}


function Emprunter(){
	$Nom = $_POST["Nom"] ;
	$Prenom = $_POST["Prenom"];
	$Ville = $_POST["Ville"];
	$Adresse = $_POST["Adresse"];
	$Role = $_POST["Role"] ;
	$Email = $_POST["Email"];
	$MDP = $_POST["MPD"];
	$mdp = password_hash($MDP,PASSWORD_DEFAULT); 
try{
 include '../Contenu/lire.php' ;
} catch (PDOException $e) {
	print("Erreur : " . $e->getMessage() . "<br/>");
	die();
}
	$sql = "INSERT into utilisateur(Nom,Prénom,Mail,Mdp,Rôle,Adresse,Ville) VALUES ('$Nom','$Prenom','$Email','$mdp','$Role','$Adresse','$Ville') ";
	$prepare = $dbh->prepare($sql);
	
    if ($prepare->execute()) {
		?>
		<body>
<div id="modal-success" class="page-success">
<titre>L'utilisateur a été ajouté</titre>
<br>
<br>
<br>
<br>
<br>
<texte1>Redirection...</texte1>
</div>
<?php echo "<script type='text/javascript'> document.location = '../index.php'; </script>";?>
		<?php
} else {
  echo "Erreur, Impossible de créer l'enregistrement";
}
}


?>


