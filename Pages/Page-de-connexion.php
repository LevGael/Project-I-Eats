<!doctype html>
<html>
<link rel="stylesheet" href="../Css/Connexion.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">

<head>
    <meta charset="utf-8">
    <title>Bienvenue à I-Eats</title>
    <?php
    // try {
    //     include '/Contenu/lire.php';
    // } catch (PDOException $e) {
    //     print("Erreur : " . $e->getMessage() . "<br/>");
    //     die();
    // }
    $dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);

    session_start();

    $sqlutil = 'SELECT * FROM utilisateur';
    $prepare = $dbh->prepare($sqlutil);
    $prepare->execute();
    $utilisateurs = $prepare->fetchAll(PDO::FETCH_ASSOC);

    $message = "";

    //===========================================================
    // vérification : est-ce qu'il y a des données envoyées
    //===========================================================
    if (isset($_GET["login"]) && isset($_GET["passwd"])) {
        // TODO : Crypter et décrypter le mot de passe
        foreach ($utilisateurs as $utilisateur) {
            if ($_GET["login"] == $utilisateur['Mail'] && $_GET["passwd"] == $utilisateur['Mdp']) {
                $_SESSION["id_user"] = $utilisateur['IdUtilisateur'];
                $_SESSION["nom_user"] = $utilisateur['Nom'];
                $_SESSION["prenom_user"] = $utilisateur['Prénom'];
                $_SESSION["mail_user"] = $utilisateur['Mail'];
                $_SESSION["role_user"] = $utilisateur['Rôle'];
                $_SESSION["adresse_user"] = $utilisateur['Adresse'];
                $_SESSION["ville_user"] = $utilisateur['Ville'];
                $_SESSION["id_restau_user"] = $utilisateur['IdRestaurant'];

                switch ($utilisateur['Rôle']) {
                    case "Consommateur":
                        header("location:./Principal.php");
                        break;
                    case "Restaurateur":
                        if (!isset($_SESSION["id_restau_user"]))
                            header("location:./Creation-boutique.php");
                        else
                            header("location:./Accueil-restaurateur.php");
                        break;
                    case  "Livreur":
                        header("location:./Principal.php");
                        break;
                }


                exit();
            }
        }

        $message = "Erreur, l'email ou le mot de passe est inccorect";
    }


    ?>
</head>

<body>
    <div id="modal-connexion" class="page-connexion">
        <img class="logo" src="../Images/logo.png">
        <form action="Page-de-connexion.php" method="get">
            <div class="formulaire-connexion">
                <texte1>E-mail</texte1><br>
                <div class='email'>
                    <span class="icon-connexionutilisateur" title=" utilisateur"><i class="fab-solid fa-at"></i></span>
                    <input type='text' name="login" value=''><br>
                </div>
                <br>
                <texte1>Mot de passe</texte1><br>
                <div class='password'>
                    <span class="icon-connexionutilisateur" title=" utilisateur"><i class="fa-solid fa-key"></i></span>
                    <input type='password' name="passwd" value=''><br>
                </div>
                <div>
                    <NOBR>
                        <input type='submit' class='connecter' value="Se connecter">
                </div>
        </form>
        <form action="./Inscription.php" method="post">
            <input type='submit' class='inscrire' value="S'inscrire">
        </form>
        <em><?php echo $message; ?></em>
    </div>
    </div>
</body>

</html>