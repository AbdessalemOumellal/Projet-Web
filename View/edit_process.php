<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$nom = $_POST['nom'];
$wilaya = $_POST['wilaya'];
$domaine= $_POST['domaine'];
$tele= $_POST['tele'];
$fax= $_POST['fax'];

$id =$_GET['id'];
$pdoQuery = "UPDATE ecole SET organisation='$nom', wilaya='$wilaya',domaine='$domaine' ,telephone='$tele',fax='$fax' WHERE id=$id";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute();
header('location: dashboard.php');
?>