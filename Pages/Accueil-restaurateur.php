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

    <link rel="stylesheet" href="../Css/restaurateur.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>
    <?php include "../Contenu/Entete-restaurateur.php" ?>
    <div>


        <div class="banner">
            <div class="container-fluid p-0 background-img">
                <img width="100%" height="300px" src="../Images/Backround1.png" />
            </div>
            <div class="container-fluid infos_restau">

                <div class="row mt-5">
                    <div class="col-4"></div>
                    <div class="col-4">

                        <?php
                        echo '<span class="title-yellow">' . $restaurant['nom'] . '</span>'  . "<br/>";
                        echo $restaurant['adresse'] . ", " . $restaurant['ville'] . "<br/>";
                        echo "Horaire : " . $restaurant['heure_ouverture'] . " - " . $restaurant['heure_fermeture'] . "<br/>";
                        ?>
                    </div>
                    <div class="col-4"></div>
                </div>

            </div>
        </div>

        <div class="container corps">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class=" band-red">
                        <br> <br>
                        <T6>Plats à la carte</T6>
                        <div class="BarreJaune"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <a href="./Ajout-repas.php"><button class="btn btn-warning btn-lg button-yellow">Ajouter un plat</button></a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <br>

                    <?php
                    foreach ($plats as $plat) { ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <div class="mb-2">
                                        <T3><?php echo $plat['nom'] ?></T3> <br>
                                    </div>

                                    <div class="mb-2 ">
                                        <T4><?php echo $plat['categorie'] . " - " . $plat['taille'] ?></T4>
                                    </div>
                                    <div class="mb-2 ">
                                        <T4><?php echo $plat['description'] ?></T4> <br>
                                    </div>
                                    <div class="mb-2 ">
                                        <T7><?php echo $plat['prix'] . "€" ?></T7> <br>
                                    </div>

                                    <br>
                                    <input type="button" class="ButtonPanier" value="Modifier" />
                                    <br> <br>
                                </div>
                            </div>
                        </div>


                    <?php }
                    ?>

                </div>
                <div class="col-2"></div>
            </div>

        </div>

    </div>
</body>

</html>