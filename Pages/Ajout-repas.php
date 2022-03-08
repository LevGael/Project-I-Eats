<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Connexion.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter un plat</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <br><br><br><br><br>
                <form action="../Contenu/ajout-repas.php" method="POST">
                    <h3 class="mb-4">Ajout d'un nouveau plat</h3>

                    <div class="mb-2">
                        <label for="nom_plat" class="form-label">Nom du plat</label>
                        <input class="form-control" type="text" name="nom_plat" required>
                    </div>
                    <div class="mb-2">
                        <label for="type_plat" class="form-label">Type</label>
                        <input class="form-control" type="text" name="type_plat" required>
                    </div>
                    <div class="mb-2">
                        <label for="taille_plat" class="form-label">Taille</label>
                        <input class="form-control" type="text" name="taille_plat" required>
                    </div>
                    <div class="mb-2">
                        <label for="prix_plat" class="form-label">Prix</label>
                        <input class="form-control" type="number" name="prix_plat" step="any" required>
                    </div>
                    <div class="mb-2">
                        <label for="description_plat" class="form-label">Description</label>
                        <textarea class="form-control" type="time" name="description_plat"> </textarea>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Valider">
                </form>
            </div>
            <div class="col-3">

            </div>
        </div>

    </div>
</body>

</html>