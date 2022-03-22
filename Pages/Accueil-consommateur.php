<?php
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$message = null;
session_start();
try {
    if (!isset($_POST["search_bar"])) {
        $query1 = $dbh->prepare("SELECT * FROM restaurant");
        $query1->execute();
        $restaurants = $query1->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $query2 = $dbh->prepare("SELECT * FROM restaurant WHERE ville=:ville");
        $query2->execute([
            "ville" => $_POST["search_bar"]
        ]);
        $restaurants = $query2->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($restaurants) == 0)
            $message = "Aucun résultat trouvé";
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
    die();
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
    <title>Accueil consommateur</title>

    <script type="text/javascript">
        $(function() {
            $('#search_button').click(function() {

                var ville = $("#search_bar").val();
                //     $.ajax({
                //         type: "GET",
                //         url: "../Contenu/search_restau.php",
                //         data: {
                //             search_bar: ville
                //         },
                //         success: (data) => {
                //             console.log("yo");
                //             $('#test').html(data);
                //         },
                //         error: (err) => {
                //             console.log(err.status, err.statusText);
                //         }
                //     })
                $('#restaurants').load("../Contenu/search_restau.php", {
                    search_bar: ville
                }, (responseTxt, statusTxt, xhr) => {
                    if (statusTxt == "error")
                        alert("Error: " + xhr.status + ": " + xhr.statusText);
                })

            })


        })
    </script>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-8">
                <br><br><br>
                <h3 class="mb-4">Accueil consommateur</h3>
                <br>

                <div class="col-auto">
                    <label for="search_bar">Entre ta ville et sélectionne ton restaurant</label>

                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="search_bar" name="search_bar">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary mb-3" id="search_button">Chercher</button>
                </div>

            </div>

        </div>

        <br>
        <div id="restaurants"></div>



    </div>
</body>

</html>