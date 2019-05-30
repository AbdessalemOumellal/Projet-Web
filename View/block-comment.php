<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$id = $_GET['id'];
var_dump($id);
$type = "UPDATE users SET comment=1 WHERE id=$id";
$delete = $pdoConnect->prepare($type);
$delete->execute();
header('location: ./dashboard.php');
?>