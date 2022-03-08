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
        $query2 = $dbh->prepare("SELECT * FROM restaurant WHERE ville LIKE :ville");
        $query2->execute([
            "ville" => '%' . $_POST["search_bar"] . '%'
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

if ($message != null) :
    echo "<div class='alert alert-danger'> $message</div>";
endif;

?>
<?php foreach ($restaurants as $restaurant) : ?>
    <div class="row ">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">


                    <div class="row g-5">
                        <div class="mb-2 col-auto">
                            <span><?php echo $restaurant['nom'] ?></span> <br>
                        </div>

                        <div class="mb-2 col-auto">
                            <span><?php echo $restaurant['adresse'] . ", " . $restaurant['ville'] ?></span>
                        </div>
                        <div class="mb-2 col-auto">
                            <span><?php echo $restaurant['heure_ouverture'] . " - " . $restaurant['heure_fermeture'] ?></span>
                        </div>

                    </div>
                    <br><br>
                    <button class="btn btn-primary" onclick='consulter_menu()'>Consulter le menu</button>
            </div>
            </form>
        </div>
    </div>
    <br>
<?php endforeach ?>
<script>
    function consulter_menu() {

    }
</script>