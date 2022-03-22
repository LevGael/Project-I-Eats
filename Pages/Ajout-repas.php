<?php include "../Contenu/Entete-restaurateur.php" ?>
<div>


    <div class="banner">
        <div class="container-fluid p-0 background-img">
            <img width="100%" height="300px" src="../Images/Backround1.png" />
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 p-0 corps corps-yellow">
                <div class=" band-red">
                    <br> <br>
                    <T6>Nouveau plat</T6>
                    <div class="BarreJaune"></div>
                </div>

                <form action="../Contenu/ajout-repas.php" class="p-5" method="POST">


                    <div class="mb-4">
                        <label for="nom_plat" class="form-label">Nom du plat</label>
                        <input class="form-control input-yellow" type="text" name="nom_plat" required>
                    </div>
                    <div class="row ">
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="type_plat" class="form-label">Type</label>
                                <input class="form-control input-yellow" type="text" name="type_plat" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="taille_plat" class="form-label">Taille</label>
                                <input class="form-control input-yellow" type="text" name="taille_plat" required>
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="prix_plat" class="form-label">Prix</label>
                        <input class="form-control input-yellow" type="number" name="prix_plat" step="any" required>
                    </div>
                    <div class="mb-4">
                        <label for="description_plat" class="form-label">Description</label>
                        <textarea class="form-control textarea-yellow" type="time" name="description_plat"> </textarea>
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