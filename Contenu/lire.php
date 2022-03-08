<?php
require("connect.php");
$dbh = new PDO('mysql:host=localhost;dbname=i-eats;charset=utf8', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
