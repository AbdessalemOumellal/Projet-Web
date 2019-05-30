<?php
    $pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
    
    $formation = $_POST['formation'];
    $volume = $_POST['volume'];
    $tarif = $_POST['tarif'];
    $taxe = $_POST['taxe'];
    $ecole = $_POST['ecole'];
    $var = 5;

    

    $pdoQuery = "INSERT INTO formation (typeform,fomration,volume_horaire,tarif_ht,taxe,ecole) VALUES ('$var','$formation',' $volume','$tarif','$taxe','$ecole' )";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute();
  
     header('location: index.php');
?>