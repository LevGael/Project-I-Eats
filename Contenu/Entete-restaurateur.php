<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/Entete4.css" type="text/css">
    <link rel="stylesheet" href="../Css/Restaurateur.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>

    <script>
    </script>
    <title>I-Eat</title>
</head>

<body>



    <div class="container-fluid p-0 entete" onclick="entete()">
        <div class="row">
            <div class="col-11">



                <div class="d-flex ">
                    <div class="me-auto">
                        <img class="logo" src="../Images/logo.png">
                    </div>
                    <div class=" p-2 mr-2 align-self-center">
                        <a href="../Pages/Accueil-restaurateur.php" class="lien" style="text-decoration:none;">
                            <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
                            <div class="d-flex">
                                <div class="align-self-end ">
                                    <span class="iconify " data-icon="ant-design:home-filled" style="color: white; height:30px;width: 30px;"></span>
                                </div>
                                &nbsp;
                                <div class="align-self-end ml-4">
                                    <T1>Accueil</T1>
                                </div>

                            </div>
                        </a>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="p-2 mr-2 align-self-center">
                        <a href="Commandes.php" class="lien" style="text-decoration:none;">
                            <div class="d-flex align-end">
                                <div class="align-self-end">
                                    <span class="iconify " data-icon="icon-park-outline:transaction-order" style="color: white; height:30px;width:30px;"></span>
                                </div>
                                &nbsp;
                                <div class="align-self-end">
                                    <T1>Informations</T1>
                                </div>

                            </div>
                        </a>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <div class="p-2 mr-2 align-self-center">
                <a href="Panier.php" class="lien" style="text-decoration:none;">
                    <div class="d-flex ">
                        <div class="align-self-end">
                            <span class="iconify " data-icon="bx:bxs-cart" style="color: white; height:30px;width: 30px;"></span>
                        </div>
                        &nbsp;
                        <div class="align-self-end">
                            <T1>Panier</T1>
                        </div>

                    </div>
                </a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    <div class="p-2 mr-2 align-self-center">
                        <!-- <a href="Profil.php" class="lien"> -->
                            <div class="d-flex align-end">
                                <span class="iconify" data-icon="ic:sharp-account-circle" onclick="profil()" style="color: white; height:30px;width: 30px;"></span>
                            </div>
							<div  id="blockDuProfil" class="blocProfil">
<Tmenu1> Bienvenue <?php echo ($_SESSION["login"]) ?> </Tmenu1>
<Tmenu2 onclick="deco()">Se déconnecter</Tmenu2>
</div>
                      <!--  </a> -->
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

            </div>
            <div class="col-1">
            </div>
        </div>


    </div>
	
	<script>
var nb=1;
	document.getElementById("blockDuProfil").style.display = "none";
	

function profil(){
	if(nb % 2 != 0){
		document.getElementById("blockDuProfil").style.display = "block";
	} else {
	document.getElementById("blockDuProfil").style.display = "none";
	}
	nb=nb+1;
}

function deco(){
        document.location = '../Contenu/destroy_session.php';
}


</script>