<?php

session_start();
$host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
$contenu = $_POST['contenu'];
    $id = $_POST['id'];
    $user_name=$_SESSION['username'];
try{
    $pdoConnect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    
    $pdoQuery = "INSERT INTO commentaire(contenu,username,ecole_id) VALUES ('$contenu','$user_name',$id)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute();
    header('location: commenter.php?id='.$id.'');
    
   
    

}
catch(PDOException $err){

    echo $err->getMessage();
}
    
   
?>