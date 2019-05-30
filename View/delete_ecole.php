<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$id = $_GET['id'];
var_dump($id);
$type0 = "DELETE FROM commentaire WHERE ecole_id=$id";
$delete0 = $pdoConnect->prepare($type0);
$delete0->execute();

$type = "DELETE from ecole WHERE id=$id";
$delete = $pdoConnect->prepare($type);
$delete->execute();
header('location: ./dashboard.php');