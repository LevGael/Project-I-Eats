<?php
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
session_start();
// var_dump($_SESSION["id_user"]);
// var_dump($_SESSION["nom_user"]);
// $_SESSION["prenom_user"];
// $_SESSION["mail_user"];
// $_SESSION["role_user"];
// $_SESSION["adresse_user"];
// $_SESSION["ville_user"];
// $_SESSION["id_restau_user"];



$message = '';
if (isset($_SESSION['id_user'])) {
    if (isset($_POST['nom_restaurant'], $_POST['ville_restaurant'], $_POST['adresse_restaurant'], $_POST['heure_ouverture'], $_POST['heure_fermeture'])) {
        $query1 = $dbh->prepare("INSERT INTO restaurant ( nom, adresse, heure_ouverture, heure_fermeture, ville) 
            VALUES (:nom, :adresse, :heure_ouverture, :heure_fermeture, :ville)");
        $query1->bindParam(':nom', $_POST['nom_restaurant']);
        $query1->bindParam(':adresse', $_POST['adresse_restaurant']);
        $query1->bindParam(':heure_ouverture', $_POST['heure_ouverture']);
        $query1->bindParam(':heure_fermeture', $_POST['heure_fermeture']);
        $query1->bindParam(':ville', $_POST['ville_restaurant']);

        // Trigger d'insertion de l'ID du restaurant dans la table restaurateur
        $trigger = $dbh->prepare("CREATE OR REPLACE TRIGGER update_id_restau AFTER INSERT ON restaurant FOR EACH ROW UPDATE utilisateur SET idRestaurant=NEW.id_restau WHERE idUtilisateur=:id_utilisateur");
        $trigger->bindParam(':id_utilisateur', $_SESSION["id_user"]);
        // TODO : Insérer l'ID du restaurant dans la table restaurateur
        if ($trigger->execute() && $query1->execute()) {
            $message = "Restaurant crée avec succès";
        } else {
            $message = "Erreur dans la création du restaurant";
        }
    }
} else {
    $message = "Va t'authentifier petit bandit";
}



echo  htmlentities($message);
echo "<button> <a href='../Pages/Accueil-restaurateur.php'>OK</a> </button>";
