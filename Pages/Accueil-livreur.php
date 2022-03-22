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
<?php include "../Contenu/Entete-livreur.php" ?>
<div>

    <div class="banner">
        <div class="container-fluid p-0 background-img">
            <img width="100%" height="300px" src="../Images/Backround1.png" />
        </div>
    </div>

    <div class="container corps">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class=" band-red">
                    <br> <br>
                    <T6>Entre ta ville et sélectionne une commande</T6>
                    <br>
                    <div class="m-4">
                        <input class="BarreRecherche" type="text">
                        <button class="BouttonRecherche">Rechercher</button>
                    </div>
                    <br>
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
                                    <input type="button" class="ButtonPanier" value="Accepter la livraison" />
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