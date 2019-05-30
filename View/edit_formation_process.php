<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$formation= $_POST['formation'];
$volume= $_POST['volume'];
$tarif= $_POST['tarif'];

$id =$_GET['id'];
$pdoQuery = "UPDATE formation SET fomration='$formation', volume_horaire='$volume',tarif_ht='$tarif'  WHERE idform=$id";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute();
header('location: index.php');
?>