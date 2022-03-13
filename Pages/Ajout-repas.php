<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../Css/restaurateur.css" type="text/css">
    <title>Ajouter un plat</title>
</head>

<body>
    <?php include "../Contenu/Entete-restaurateur.php" ?>
    <div>


        <div class="banner">
            <div class="container-fluid p-0 background-img">
                <img width="100%" height="300px" src="../Images/Backround1.png" />
            </div>
        </div>

        <div class="container ">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 corps">
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
                        <input type="submit" class="btn btn-primary button-red" value="Valider">
                    </form>
                </div>
                <div class="col-3">

                </div>
            </div>

        </div>
    </div>
</body>

</html>