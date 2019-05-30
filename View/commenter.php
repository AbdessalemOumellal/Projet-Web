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

if(isset($_SESSION['loggedin']))
{?>
   
<?php
$host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
$id = $_GET['id'];
try{
    $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $query = "SELECT * FROM commentaire WHERE ecole_id=$id";
   
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
   <br>
    <div class="add-formation pd">
        <form id="form"  action="addCommentaire.php" method="post">
            <label class="h3" for="type">Commentaire</label>
            <input type="text" style="width:1100px; margin-bottom: 20px;"  id="contenu" name="contenu">
            <?php
        echo'<input class="form-control" type="hidden" readonly="readonly"  style="width:1100px; margin-bottom: 20px;" value='.$id.' id="id" name="id">'
        
            ?>
           
            <button   class="btn blk btn-success" type="submit" id="addCommentaire">  Ajouter un commentaire</button>
        </form>
    </div>
    </div>

<br> <br>

 <table class="table table-dark">
        <?php
        foreach ($row_res as $row) {
            echo '
            <thead class="">
            <tr>
              
            <th scope="col">User Name</th>
            <th scope="col">commentaire</th>
           
            </tr>
            </thead>
            <tbody>
                   
            <tr>
            <td>' .$row["username"] . '</td>
            <td>' . $row["contenu"] . '</td>
           
           
             </tr>
             </tbody>
             ';
                
            
           
        }
            ?>
    </table>

</div>
<div>

    </div>
<script src="js/jquery.js"></script>
<script src="js/index.js"></script>

<?php }
else
{
    header("location:login.php");
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