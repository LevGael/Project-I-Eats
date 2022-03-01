<!doctype html>
<html>
<link rel="stylesheet" href="../Css/Connexion.css" type="text/css">
<link rel="stylesheet" href="../Css/Page.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<head>
<meta charset="utf-8">
<title>Inscription</title>
</head>
<body>
<div id="modal-inscription" class="page-inscription">
<titre>Inscription</titre>
<div class="formulaire-inscription">
<form action="../Contenu/Action.php" method="post" >
<texte1>Nom</texte1><br>
<input type='text' value='' name="Nom" class='input-inscription'><br>
<br>
<texte1>Pr&eacute;nom</texte1><br>
<input type='text' value='' name="Prenom" class='input-inscription'><br>
<br>
<texte1>Ville</texte1><br>
<input type='text' value='' name="Ville" class='input-inscription'><br>
<br>
<texte1>Adresse</texte1><br>
<input type='text' value='' name="Adresse" class='input-inscription'><br>
<br>
<input type="radio" class='Role' id="Consommateur" name="Role" value="Consommateur"> <label for="Consommateur">Consommateur</label></input>
<input type="radio" id="Restaurateur" class='Role' name="Role" value="Restaurateur"><label for="Restaurateur">Restaurateur</label></input>
<input type="radio" id="Livreur" class='Role' name="Role" value="Livreur"><label for="Livreur">Livreur</label></input><br>
<texte1>E-mail</texte1><br>
<input type='text' value='' name="Email" class='input-inscription'><br>
<br>
<texte1>Mot de passe</texte1><br>
<input type='password' value='' name="MPD" class='input-inscription'><br>
<NOBR>
<input type='submit' class='inscrire2' name="Inscription" value="S'inscrire">
</form>
</NOBR>
<form action="../index.php" method="post">
<input type='submit' class='Retour' value="Retour"><NOBR>
</form>

</div>
</div>

</body>
</html>