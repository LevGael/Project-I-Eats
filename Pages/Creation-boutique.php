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
    <title>Création de boutique</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <br><br><br><br><br>
                <form action="../Contenu/creation-boutique.php" method="POST">
                    <h3 class="mb-4">Informations restaurant</h3>

                    <div class="mb-2">
                        <label for="nom_restaurant" class="form-label">Nom du restaurant</label>
                        <input class="form-control" type="text" name="nom_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="ville_restaurant" class="form-label">Ville</label>
                        <input class="form-control" type="text" name="ville_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="adresse_restaurant" class="form-label">Adresse</label>
                        <input class="form-control" type="text" name="adresse_restaurant" required>
                    </div>
                    <div class="mb-2">
                        <label for="heure_ouverture" class="form-label">Heure d'ouverture</label>
                        <input class="form-control" type="time" name="heure_ouverture" required>
                    </div>
                    <div class="mb-2">
                        <label for="heure_fermeture" class="form-label">Heure de fermeture</label>
                        <input class="form-control" type="time" name="heure_fermeture" id="heure_fermeture">
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