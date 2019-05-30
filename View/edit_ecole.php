<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header>
    

</header> </br></br></br>

<?php
$pdoConnect = new PDO("mysql:host=localhost;dbname=projet", "root", "root");
$id = $_GET['id'];
$design = "SELECT * FROM ecole WHERE id=$id";
$designation = $pdoConnect->prepare($design);
$designation->execute();
$designation->setFetchMode(PDO::FETCH_ASSOC);
$des = $designation->fetchAll();

$req = "SELECT * FROM commentaire WHERE ecole_id=$id";
$resultat = $pdoConnect->prepare($req);
$resultat->execute();
$resultat->setFetchMode(PDO::FETCH_ASSOC);
$res = $resultat->fetchAll();


echo'<form action="edit_process.php?id='.$id.'" class="container" method="post">
    <div class="form-group">
        <label for="exampleInputPassword1">Nom</label>
        <input name="nom" type="text" class="form-control" id="exampleInputPassword1" value="'.$des[0]['organisation'].'">
        <label for="exampleInputPassword1">Wilaya</label>
        <input name="wilaya" type="text" class="form-control" id="exampleInputPassword1" value="'.$des[0]['wilaya'].'">
        <label for="exampleInputPassword1">Domaine</label>
        <input name="domaine" type="text" class="form-control" id="exampleInputPassword1" value="'.$des[0]['domaine'].'">
        <label for="exampleInputPassword1">telephone</label>
        <input name="tele" type="text" class="form-control" id="exampleInputPassword1" value="'.$des[0]['telephone'].'">
        <label for="exampleInputPassword1">fax</label>
        <input name="fax" type="text" class="form-control" id="exampleInputPassword1" value="'.$des[0]['fax'].'">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>';

?>
<br><br>
<div>
<p class="h2">Les commentaires de cette ecole </p><br>
<table id="tableone" class="table table-striped table-bordered table-sm" style="margin-left: 5%; margin-right: 5%;">
    <thead>
    <tr>
        <th class="th-sm">User Name</th>
        <th class="th-sm">Contenu</th>
        <th class="th-sm">Effacer</th>
        
        <th class="th-sm"></th>           
    </tr>
    </thead>


    <tbody class="tabBody">
    <?php
    foreach ($res as $raw) {
        echo'<tr>
           
            <td>'.$raw["username"].'</td>
            <td>'.$raw["contenu"].'</td>
            
            <td><a href="delete_commentaire.php?id='.$raw['id'].'"><button class="btn btn-danger">Effacer</button></a></td>

            
            <td>';
   
           echo '</td></tr>
         ';
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>