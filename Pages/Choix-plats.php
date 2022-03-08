<?php
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
session_start();
$message;
if (isset($_SESSION['id_restau_user'])) {
    // Informations sur le restaurant
    $query1 = $dbh->prepare("SELECT * FROM restaurant WHERE id_restau=:id_restau");
    $query1->bindParam(':id_restau', $_SESSION['id_restau_user']);
    $query1->execute();
    $restaurant = $query1->fetch(PDO::FETCH_ASSOC);

    // Plats du restaurant
    $query2 = $dbh->prepare("SELECT * FROM plat WHERE id_restau=:id_restau");
    $query2->bindParam(':id_restau',  $_SESSION['id_restau_user']);
    $query2->execute();
    $plats = $query2->fetchAll(PDO::FETCH_ASSOC);
} else {
    $message = "Va t'authentifier petit bandit !";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Accueil</title>
</head>

<body>
    <div>
        <h1>Informations sur le restaurant</h1> <br>
        <?php
        echo $restaurant['nom'] . "<br/>";
        echo $restaurant['adresse'] . ", " . $restaurant['ville'] . "<br/>";
        echo "Horaire : " . $restaurant['heure_ouverture'] . " - " . $restaurant['heure_fermeture'] . "<br/>";
        ?>
    </div>
    <br>
    <div>
        <a href="./Ajout-repas.php"><button>Ajouter un plat</button></a>
    </div>
    <br><br>
    <?php
    foreach ($plats as $plat) { ?>
        <div class="row mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row g-5">
                        <div class="mb-2 col-auto">
                            <span><?php echo $plat['nom'] ?></span> <br>
                        </div>

                        <div class="mb-2 col-auto">
                            <span><?php echo $plat['categorie'] ?></span>
                        </div>
                        <div class="mb-2 col-auto">
                            <span><?php echo $plat['taille'] ?></span>
                        </div>
                        <div class="mb-2 col-auto">
                            <span><?php echo $plat['description'] ?></span> <br>
                        </div>
                        <div class="mb-2 col-auto">
                            <span><?php echo $plat['prix'] . "€" ?></span> <br>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    <?php }
    ?>

</body>

</html>