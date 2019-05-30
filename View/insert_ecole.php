

<?php
    $pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $wilaya = $_POST['wilaya'];
    $commune = $_POST['commune'];
    $adress = $_POST['adress'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $category = $_POST['category'];
    $pdoQuery = "INSERT INTO ecole(organisation,domaine,wilaya,commune,adresse,telephone,fax,category_id) VALUES ('$nom','$categorie','$wilaya','$commune','$adress','$tel','$fax','$category')";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute();
  
     header('location: dashboard.php');
?>