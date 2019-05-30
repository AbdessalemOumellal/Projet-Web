<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

  <div class="custom-container">

<?php
session_start();

if(isset($_SESSION["username-admin"]))
{?>
   
   
<?php
$host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
try{
    $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $query = "SELECT * FROM ecole ";
    
    $result = $connect->prepare($query);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row_res = $result->fetchAll();

    $que = "SELECT * FROM users";
    
    $res = $connect->prepare($que);
    $res->execute();
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res = $res ->fetchAll();
    
}
catch(PDOException $err){
    echo $err->getMessage();
}
?>
<div class="container pa">
<table id="tableone" class="table table-striped table-bordered table-sm">
    <thead>
    <tr>
        <th class="th-sm">Nom</th>
        <th class="th-sm">catégorie</th>
        <th class="th-sm">wilaya</th>
        <th class="th-sm">commune</th>
        <th class="th-sm">adresse</th>
        <th class="th-sm">téléphones</th>   
        <th class="th-sm">Modifier</th>  
        <th class="th-sm">Efacer</th>  
        <th class="th-sm"></th>           
    </tr>
    </thead>


    <tbody class="tabBody">
    <?php
    foreach ($row_res as $raw) {
        echo'<tr>
            <td class="data" ><a href="ecole.php?id='.$raw['id'].'">'.$raw["organisation"].'</td>
            <td class="data" >'.$raw["domaine"].'</td>
            <td class="data" >'.$raw["wilaya"].'</td>
            <td class="data" >'.$raw["commune"].'</td>
            <td class="data" >'.$raw["adresse"].'</td>
            <td class="data" >'.$raw["telephone"].'</td>
            <td class="data" ><a href="edit_ecole.php?id='.$raw['id'].'""><button class="btn btn-warning">Modifer</button></a></td>
            <td class="data" ><a href="delete_ecole.php?id='.$raw['id'].'"><button class="btn btn-danger">Effacer</button></a></td>
            <td class="data">';
   
           echo '</td></tr>
         ';
    }
    ?>
    </tbody>
</table>
<table id="tableone" class="table table-striped table-bordered table-sm">
    <thead>
    <tr>
        <th class="th-sm">Nom</th>
        <th class="th-sm">Date de creation</th>
        <th class="th-sm">Bloquer Commentaire</th>
        <th class="th-sm">Supprimer</th>
                  
    </tr>
    </thead>


    <tbody class="tabBody">
    <?php
    foreach ($res as $raw) {
        echo'<tr>
            
            <td>'.$raw["username"].'</td>
            <td>'.$raw["created_at"].'</td>
            
            <td><a href="block-comment.php?id='.$raw['id'].'"><button class="btn btn-warning">Bloquer Commentaire</button></a></td>
            <td><a href="delete_user.php?id='.$raw['id'].'"><button class="btn btn-danger">Supprimer</button></a></td>

            <td>';
   
           echo '</td></tr>
         ';
    }
    ?>
    </tbody>
</table>
</div>
<div>

   
    <div class="add-formation pd">
        <form id="form"  action="insert_ecole.php" method="post">
        <div class="form-group" style="margin-left: 5%; margin-right: 5%; margin-top: 5%;">
           <p class="h2">Ajouter une ecole</p> <br>
        <label class="blk" for="type">Nom</label>
        <input type="text" class="form-control"  id="nom" name="nom"><br>
        <label class="blk" for="formation">catégorie</label>
        <input type="text"  class="form-control" id="categorie" name="categorie" required><br>
        <label  class="blk" for="formation">wilaya</label>
            <input type="text" class="form-control" id="wilaya" name="wilaya" required> <br>
            <label class="blk" for="formation">commune</label>
            <input type="text" class="form-control"  id="commune" name="commune" required><br>
            <label class="blk" for="formation">adress</label>
            <input type="text" class="form-control" style=" margin-bottom: 30px;" id="adress" name="adress" required> <br>
             <label class="blk" for="formation">Telepone</label>
            <input type="text" class="form-control" style=" margin-bottom: 30px;" id="tel" name="tel" required> <br>
             <label class="blk" for="formation">Fax</label>
            <input type="text" class="form-control" style=" margin-bottom: 30px;" id="fax" name="fax" required> <br>
             <label class="blk" for="formation">category</label>
            <input type="text" class="form-control" style=" margin-bottom: 30px;" id="category" name="category" required> <br>
            <button   class="btn blk btn-success" type="submit" id="addFormation">  Ajouter une nouvelle ecole</button></br></br> </br></br>
        </div>
        </form>
    </div>
    </div>
<script src="js/jquery.js"></script>
<script src="js/index.js"></script>

<?php }
else
{
    header("location:login-admins.php");
}
?>
</div>
</body>

<footer>
    
<a href="./"> Accueil </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=8"> Formations universitaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=9"> Formations professionnelles </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=10"> Formations secondaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=11"> Formations moyennes </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=12"> Formations primaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=13"> Formations maternelles </a>
                    <a href="#"> About </a> 
</footer>

</html>