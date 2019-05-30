<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header>
    

</header> </br></br></br>
<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$id = $_GET['id'];
$design = "SELECT * FROM formation WHERE idform=$id";
$designation = $pdoConnect->prepare($design);
$designation->execute();
$designation->setFetchMode(PDO::FETCH_ASSOC);
$des = $designation->fetchAll();




echo'<form action="edit_formation_process.php?id='.$id.'" class="container" method="post">
    <div class="form-group">
        <label for="exampleInputPassword1">Formation</label>
        <input name="formation" type="text" class="form-control" id="formation" value="'.$des[0]['fomration'].'">
        <label for="exampleInputPassword1">Volume Horaire</label>
        <input name="volume" type="text" class="form-control" id="volume" value="'.$des[0]['volume_horaire'].'">
        <label for="exampleInputPassword1">Tarif HT</label>
        <input name="tarif" type="text" class="form-control" id="tarif" value="'.$des[0]['tarif_ht'].'">
 
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
</form>';


   


?>

<
</body>
</html>