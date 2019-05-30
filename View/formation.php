<!doctype html>
<html>
<head>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<meta charset="utf-8">
	<link rel="stylesheet" href="comparateur.css">
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="bootstrap.css">
</head>

<body>

<?php
$host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
$id = $_GET['id'];
try{
    $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $query = "SELECT * FROM category";
    $result = $connect->query($query);
   
    $query2  = "SELECT * FROM formation WHERE category_id=$id";
    $result2 = $connect->query($query2);
}
catch(PDOException $err){
    echo $err->getMessage();
}
?>


<div class="main">
<img class="logo-page" src="logo.png">
<div class="contain">
<div class="slider">
    <figure>
        <img src="img/accueil.jpg" title="Logo" alt="Le logo de notre école" >
        <img src="img/diapo2.jpg" title="Logo" alt="Le logo de notre école" >
        <img src="img/diapo3.jpg" title="Logo" alt="Le logo de notre école" >
        <img src="img/diapo4.jpg" title="Logo" alt="Le logo de notre école" >
    </figure>
  </div>
</div>

<p Elliptical border - border-radius: 15px / 50px: </p>
<p id="rcorners2"> </p>


<div class="tableau-div" id="workshops-table">
<table id="workshops-table" class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>catégorie</th>
        <th>wilaya</th>
        <th>commune</th>
        <th>adresse</th>
        <th>téléphones</th>


    </tr>
    </thead>
    <tbody class="tabBody">
    <?php
    foreach ($result2 as $raw) {
        echo'<tr>
            <td>'.$raw["organisation"].'</td>
            <td>'.$raw["domaine"].'</td>
            <td>'.$raw["wilaya"].'</td>
            <td>'.$raw["commune"].'</td>
            <td>'.$raw["adresse"].'</td>
            <td>'.$raw["telephone"].'</td>
            </tr>
         ';
    }
    ?>
    </tbody>
</table>
<?php
session_start();
if(isset($_SESSION['User'])) echo '<a href="commenter.php" >Commenter</a>'  ;
else echo '<a href="login.php" >Login</a>' ;

         
            
            ?>

</div>


<!-- Side navigation -->
<div class="sidenav">
 <?php
            
            echo '<a href="./">Page daccueil</a>';
            foreach ($result as $row ){
            echo '<a href="#">'.$row["nom"].'</a>';
            }
            echo '<a href="#">About</a>';
            ?>
</div>

<!-- Zone pub -->
<div class="zonepub">
Publicité
</div>



</body>

<footer>
<a  href="category.php?id=8" >
 universitaires</a>
<a href="category.php?id=9">
professionnelles</a>
<a href="category.php?id=10">
 secondaires</a>
<a href="category.php?id=11">
moyennes</a>
<a href="category.php?id=12">
 primaires</a>
<a href="category.php?id=13">
 maternelles</a>
</footer>
</html>