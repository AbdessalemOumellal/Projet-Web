<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<?php
session_start();

if(isset($_SESSION["username-admin"]))
{?>
   
   
<?php
$host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
$id = $_GET['id'];
try{
    $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $query = "SELECT * FROM formation where ecole=$id";
    
    $result = $connect->prepare($query);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row_res = $result->fetchAll();


    
}
catch(PDOException $err){
    echo $err->getMessage();
}
?>
<div class="container pa">
<table id="tableone" class="table table-striped table-bordered table-sm">
    <thead>
    <tr>
        <th class="th-sm">Formation</th>
        <th class="th-sm">Volume Horaire</th>
        <th class="th-sm">Prix HT</th>
        <th class="th-sm">Taxe</th>
        <th class="th-sm">TTC</th>
        <th class="th-sm">Modifier</th>
        <th class="th-sm">Effacer</th>
      
                 
    </tr>
    </thead>


    <tbody class="tabBody">
    <?php
    foreach ($row_res as $raw) {
        $ttc=$raw["taxe"]*$raw["tarif_ht"]/100+$raw["tarif_ht"];
        echo'<tr>
            <td>'.$raw["fomration"].'</td>
            <td>'.$raw["volume_horaire"].'</td>
            <td>'.$raw["tarif_ht"].'</td>
            <td>'.$raw["taxe"].'</td>
            <td>'.$ttc.'</td>
            <td><a href="edit_formation.php?id='.$raw['idform'].'""><button class="btn btn-success">Modifer</button></a></td>
            <td><a href="delete_formation.php?id='.$raw['idform'].'"><button class="btn btn-warning">Effacer</button></a></td>
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
        <form id="form"  action="insert_formation.php" method="post">
                <div class="form-group" style="margin-left: 5%; margin-right: 5%; margin-top: 5%; ">
            <label class="blk" for="type">Formation</label>
            <input type="text" class="form-control" style="width:1100px"  id="formation" name="formation">  <br>
            <label class="blk" for="formation">Volume</label>
            <input type="text" class="form-control"  style="width: 150px" id="volume" name="volume" required> <br>
            <label  class="blk" for="formation">Tarif</label>
            <input type="text" class="form-control"  id="tarif" name="tarif" required> <br>
            <label  class="blk" for="formation">Taxe</label>
            <input type="text" class="form-control"  id="taxe" name="taxe" required> <br>
            <label hidden class="blk" for="formation">Ecole</label>
            <?php
            echo'   <input hidden type="text" value="'.$id.'" class="form-control"  id="ecole" name="ecole" required> <br>';
            ?>
            <?php
        echo'<input type="hidden" class="form-control" readonly="readonly"  style="width:1100px; margin-bottom: 20px;" value='.$id.' id="id" name="id">'
        
            ?>
            <button   class="btn blk btn-success" type="submit" id="addFormation">  Ajouter une nouvele formation</button></br></br> </br></br>
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
</body>

</html>