<?php
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
session_start();
$error = null;
$message = '';
try {
    if (isset($_SESSION["id_restau_user"], $_SESSION['id_user'])) {
        if (isset($_POST['nom_plat'], $_POST['type_plat'], $_POST['taille_plat'], $_POST['prix_plat'], $_POST['description_plat'])) {
            $query1 = $dbh->prepare("INSERT INTO plat ( nom, categorie, taille, prix, description, id_restau) 
            VALUES (:nom, :categorie, :taille, :prix, :description, :id_restau)");
            $query1->bindParam(':nom', $_POST['nom_plat']);
            $query1->bindParam(':categorie', $_POST['type_plat']);
            $query1->bindParam(':taille', $_POST['taille_plat']);
            $query1->bindParam(':prix', $_POST['prix_plat']);
            $query1->bindParam(':description', $_POST['description_plat']);
            $query1->bindParam(':id_restau', $_SESSION['id_restau_user']);

            if ($query1->execute()) {
                $message = "Plat ajouté avec succès";
            } else {
                $message = "Echec dans l'ajout du plat'";
            }
        }
    } else {
        $message = "Vous n'êtes pas authentifié petit bandit !";
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
    die();
}


include "../Contenu/Entete-restaurateur.php"; ?>
<br><br>
<div class="container">
    <div class="alert alert-light" style="text-align: center; font-size: 20px;">
        <br> <br>
        <?php echo $message; ?> <br> <br>
        <a href='../Pages/Accueil-restaurateur.php'><button class="button-yellow"> OK </button></a>
    </div>
</div>


<?php include "../Contenu/Footer.php"; ?>