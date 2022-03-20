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
<input type='text' value='' id="Nom" name="Nom" onchange="verifnom(this.value)" class='input-inscription'><br>
<input type='hidden' id="errorNom" value='' disabled>
<br>
<texte1>Pr&eacute;nom</texte1><br>
<input type='text' value='' id="Prenom" name="Prenom" onchange="verifprenom(this.value)"  class='input-inscription'><br>
<input type='hidden' id="errorPrenom" value='' disabled>
<br>
<texte1>Ville</texte1><br>
<input type='text' value='' name="Ville" onchange="verifville(this.value)"  class='input-inscription'><br>
<input type='hidden' id="errorVille" value='' disabled>
<br>
<texte1>Adresse</texte1><br>
<input type='text' value='' name="Adresse" class='input-inscription'><br>
<br>
<input type="radio" class='Role' id="Role" name="Role" value="Consommateur" checked> <label for="Consommateur">Consommateur</label></input>
<input type="radio" id="Role" class='Role' name="Role" value="Restaurateur"><label for="Restaurateur">Restaurateur</label></input>
<input type="radio" id="Role" class='Role' name="Role" value="Livreur"><label for="Livreur">Livreur</label></input><br>
<input type='hidden' id="errorRole" value='' disabled>
<texte1>E-mail</texte1><br>
<input type='text' value='' id="Mail" name="Email" onchange="verifMail(this.value)" class='input-inscription'><br>
<input type='hidden' id="errorMail" value='' disabled>
<br>
<texte1>Mot de passe</texte1><br>
<input type='password' value='' id="Mdp" name="MPD" onchange="verifMdp(this.value)" class='input-inscription'><br>
<input type='hidden' id="errorMdp" value='' disabled>
<NOBR>
<input type='submit' class='inscrire2' id="Inscrire" name="Inscription" onmouseover="verifSubmit()" value="S'inscrire">
</form>
</NOBR>
<form action="../index.php" method="post">
<input type='submit' class='Retour' value="Retour" ><NOBR>
</form>

</div>
</div>

</body>
</html>
<script>
function verifnom(str){
	var string = str;
	if (str.length < 3){
		document.getElementById("errorNom").value = "Le nom est trop court. Minimum 3 caractères";
		document.getElementById("errorNom").style.color = "red";
		document.getElementById("errorNom").type = "text";
		document.getElementById("Inscrire").disabled = "true";
	} else if (str.length > 20){
			document.getElementById("errorNom").value = "Le nom est trop long. Maximum 20 caractères";
		document.getElementById("errorNom").style.color = "red";
		document.getElementById("errorNom").type = "text";
				document.getElementById("Inscrire").disabled = "true";
	} else {
	document.getElementById("errorNom").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	}
	if (/\d/.test(string) == false){

	} else {
				document.getElementById("errorNom").value = "Seul les caractères sont autorisés";
		document.getElementById("errorNom").style.color = "red";
		document.getElementById("errorNom").type = "text";
				document.getElementById("Inscrire").disabled = "true";	
	}
}

function verifprenom(str){
	var string = str;
	if (str.length < 3){
		document.getElementById("errorPrenom").value = "Le prénom est trop court. Minimum 3 caractères";
		document.getElementById("errorPrenom").style.color = "red";
		document.getElementById("errorPrenom").type = "text";
		document.getElementById("Inscrire").disabled = "true";
	} else if (str.length > 20){
			document.getElementById("errorPrenom").value = "Le prénom est trop long. Maximum 20 caractères";
		document.getElementById("errorPrenom").style.color = "red";
		document.getElementById("errorPrenom").type = "text";
				document.getElementById("Inscrire").disabled = "true";
	} else {
	document.getElementById("errorPrenom").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	}
	if (/\d/.test(string) == false){

	} else {
				document.getElementById("errorPrenom").value = "Seul les caractères sont autorisés";
		document.getElementById("errorPrenom").style.color = "red";
		document.getElementById("errorPrenom").type = "text";
				document.getElementById("Inscrire").disabled = "true";	
	}
}

function verifville(str){
	var string = str;
	if (str.length < 3){
		document.getElementById("errorVille").value = "Le texte est trop court. Minimum 3 caractères";
		document.getElementById("errorVille").style.color = "red";
		document.getElementById("errorVille").type = "text";
		document.getElementById("Inscrire").disabled = "true";
	} else if (str.length > 30){
			document.getElementById("errorVille").value = "Le texte est trop long. Maximum 30 caractères";
		document.getElementById("errorVille").style.color = "red";
		document.getElementById("errorVille").type = "text";
				document.getElementById("Inscrire").disabled = "true";
	} else {
	document.getElementById("errorVille").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	}
	if (/\d/.test(string) == false){

	} else {
				document.getElementById("errorVille").value = "Seul les caractères sont autorisés";
		document.getElementById("errorVille").style.color = "red";
		document.getElementById("errorVille").type = "text";
				document.getElementById("Inscrire").disabled = "true";	
	}
}

function verifMail(str){

	if (str.includes("@") & (str.includes(".com") || str.includes(".fr"))){
    document.getElementById("errorMail").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	} else {
		document.getElementById("errorMail").value = "Le format du mail est incorrect";
		document.getElementById("errorMail").style.color = "red";
		document.getElementById("errorMail").type = "text";
		document.getElementById("Inscrire").disabled = "true";
	}
}

function verifMdp(str){
	var string = str;
	if (str.length < 3){
		document.getElementById("errorMdp").value = "Votre mdp est trop court. Minimum 3 caractères";
		document.getElementById("errorMdp").style.color = "red";
		document.getElementById("errorMdp").type = "text";
		document.getElementById("Inscrire").disabled = "true";
	} else if (str.length > 20){
			document.getElementById("errorMdp").value = "Votre mdp est trop long. Maximum 20 caractères";
		document.getElementById("errorMdp").style.color = "red";
		document.getElementById("errorMdp").type = "text";
				document.getElementById("Inscrire").disabled = "true";
	} else {
	document.getElementById("errorMdp").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	}
		if (/\d/.test(string) == false){
    				document.getElementById("errorMdp").value = "Votre mdp doit comporter au moins un chiffre";
		document.getElementById("errorMdp").style.color = "red";
		document.getElementById("errorMdp").type = "text";
				document.getElementById("Inscrire").disabled = "true";	
	} else {
	document.getElementById("errorMdp").type = "hidden"	;
	document.getElementById("Inscrire").removeAttribute("disabled");
	}
}

function verifSubmit(){
document.getElementById("Inscrire").removeAttribute("disabled");
if(document.getElementById("Nom").value == "")
{
				document.getElementById("Inscrire").disabled = "true";	
}
if(document.getElementById("Prenom").value == "")
{
				document.getElementById("Inscrire").disabled = "true";	
}
if(document.getElementById("Mail").value == "")
{
				document.getElementById("Inscrire").disabled = "true";	
}

}

</script>