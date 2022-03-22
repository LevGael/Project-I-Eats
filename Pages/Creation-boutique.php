<?php include "../Contenu/Entete-restaurateur.php" ?>
<div>
    <div class="banner">
        <div class="container-fluid p-0 background-img">
            <img width="100%" height="300px" src="../Images/Backround1.png" />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 p-0 corps corps-yellow">
                <div class=" band-red">
                    <br> <br>
                    <T6>Informations sur le restaurant</T6>
                    <div class="BarreJaune"></div>
                </div>
                <form action="../Contenu/creation-boutique.php" class="p-5" method="POST">


                    <div class="mb-2">
                        <label for="nom_restaurant" class="form-label">Nom du restaurant</label>
                        <input class="form-control input-yellow" type="text" name="nom_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="ville_restaurant" class="form-label">Ville</label>
                        <input class="form-control input-yellow" type="text" name="ville_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="adresse_restaurant" class="form-label">Adresse</label>
                        <input class="form-control input-yellow" type="text" name="adresse_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="heure_ouverture" class="form-label">Heure d'ouverture</label>
                        <input class="form-control input-yellow" type="time" name="heure_ouverture" required>
                    </div>
                    <div class="mb-2">
                        <label for="heure_fermeture" class="form-label">Heure de fermeture</label>
                        <input class="form-control input-yellow" type="time" name="heure_fermeture" id="heure_fermeture">
                    </div>



                    <br>
                    <input type="submit" class=" button-red" value="Valider">
                </form>
            </div>
            <div class="col-2">

            </div>
        </div>

    </div>
</div>
<?php include "../Contenu/Footer.php" ?>