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
                    echo '<span class="title-yellow">' . htmlentities($restaurant['nom']) . '</span>'  . "<br/>";
                    echo htmlentities($restaurant['adresse']) . ", " . htmlentities($restaurant['ville']) . "<br/>";
                    echo "Horaire : " . htmlentities($restaurant['heure_ouverture']) . " - " . htmlentities($restaurant['heure_fermeture']) . "<br/>";
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
                <div id="contenu">
                    <?php
                    foreach ($plats as $plat) { ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <div class="mb-2">
                                        <T3><?php echo htmlentities($plat['nom'])  ?></T3> <br>
                                    </div>

                                    <div class="mb-2 ">
                                        <T4><?php echo htmlentities($plat['categorie'])  . " - " . htmlentities($plat['taille']) ?></T4>
                                    </div>
                                    <div class="mb-2 ">
                                        <T4><?php echo htmlentities($plat['description']) ?></T4> <br>
                                    </div>
                                    <div class="mb-2 ">
                                        <T7><?php echo htmlentities($plat['prix'])  . "€" ?></T7> <br>
                                    </div>
                                    <br>
                                    <input type="button" class="ButtonPanier" value="Modifier" />
                                    <input type="button" class="ButtonRestaurant" onclick="suppr_plat(<?php echo htmlentities($plat['id_plat'])   ?>)" value="Supprimer" />
                                    <br> <br>
                                </div>
                            </div>
                        </div>


                    <?php }
                    ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>

</div>
<script type="text/javascript">
    function suppr_plat(param) {
        var idPlat = param;
        console.log(idPlat);
        $.ajax({
            type: "POST",
            url: "../Contenu/suppr_plat.php",
            data: {
                id_plat: idPlat
            },
            success: (data) => {
                $('#contenu').load(' #contenu');
                console.log(data);
            },
            error: (err) => {
                console.log(err.status, err.statusText);
            }
        })



    }
</script>

<?php include "../Contenu/Footer.php" ?>