<?php
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$message = null;
session_start();

try {
    if (isset($_POST["id_plat"])) {
        var_dump($_POST["id_plat"]);
        $query1 = $dbh->prepare("DELETE FROM plat WHERE id_plat= :idPlat");

        if ($query1->execute([
            "idPlat" => $_POST["id_plat"]
        ])) {
            $message = "Suppression confirmée";
        } else {
            $message = "Erreur de suppression";
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
    die();
}

if ($message != null) :
    echo "<div class='alert alert-danger'> $message</div>";
endif;
