<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>




    <!-- Mon fichier CSS -->
    <link rel="stylesheet" href="./css/style.css">

</head>

  <?php 
  session_start();
  ?>

<body>

<div class="custom-container">

<!Nom de l'école>
	<?php
	$host = "localhost";
          $username = "root";
          $password = "root";
          $database ="projet";
          $id = $_GET['id'];
          try{
           $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
            $query2  = "SELECT * FROM ecole WHERE id=$id";
           $result2 = $connect->query($query2);

          }

          catch(PDOException $err){
              echo $err->getMessage();
          }

    	foreach ($result2 as $raw) {
        echo'<p class="h1">'.$raw["organisation"].'</p>
         ';}
    ?>

<!Zone de diaporama>

            <div class="diapo-container">
                <section class="slideshow">
                  <div class="slideshow-container slide">
                    <img src="./img/diapo2.jpg"/>
                    <div class="text-container">
                    <img src="./img/diapo3.jpg"/>
                    </div>
                    <img src="./img/diapo4.jpg"/>
                    <img src="./img/accueil.jpg"/>
                  </div>
                </section>
            </div>

<!Menu horizontal>



				<div class="topnav">
                    <a class="btn btn-link" href="#"> Bureautique </a>
                    <a class="btn btn-link" href="#"> Infographie </a>
                    <a class="btn btn-link" href="#"> Langues </a>
                    <a class="btn btn-link" href="#"> Management </a>
                    <a class="btn btn-link" href="#"> Comptabilite </a>
                    <a class="btn btn-link" href="#"> Chant </a>
                    <a class="btn btn-link" href="#"> Infographie </a>
		</div>


<!Tableau Formations>

<h2 align="center">Voici une desciption de nos formations :</h2>

<table align="center" border="1" class="table table-striped table-bordered table-sm" id="table">
<thead>
    <tr>
       <th>Formation</th>
    <th>Volume horaire</th>
    <th> Prix HT </th>
   <th> taxe</th>
   <th> Prix TTC </th> 
    </tr>
  </thead>


<tbody>
<?php
$host = "localhost";
          $username = "root";
          $password = "root";
          $database ="projet";
          $id = $_GET['id'];
          try{
           $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
            $query3  = "SELECT * FROM formation WHERE ecole=$id";
           $result3 = $connect->query($query3);

          }
		   catch (PDOException $e) {
					printf("Echec de la connexion : ", $e->getMessage());
					exit();
				} ?>

				
				<?php
				foreach ($result3 as $rw) {
					$ttc=$rw["taxe"]*$rw["tarif_ht"]/100+$rw["tarif_ht"];
					echo '<tr>';
					echo '<td  class="data" id="idname">'.$rw["fomration"].'</td>';
					echo '<td  class="data" id="idname">'.$rw["volume_horaire"].'</td>';
					echo '<td  class="data" id="idname">'.$rw["tarif_ht"].'</td>';
					echo '<td  class="data" id="idname">'.$rw["taxe"].'</td>';
					echo '<td  class="data" id="idname">'.$ttc.'</td>';
					echo '</tr>';
				}
         
         	?> 





</tbody>
</table>


<!Video Promo>

<p class="h2" align="center">Voici une vidéo présentative de l'école :</p>
<div align="center">
<video align="center" controls="" width="65%" class="video">
<source src="./img/Video accueil.mp4" type="video/mp4">
</video>
</div>



<h1>My Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>



</div>

</body>

    <script src="./js/bootstrap.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/theme.js"></script>

<footer> 
<?php
	$host = "localhost";
          $username = "root";
          $password = "root";
          $database ="projet";
          $id = $_GET['id'];
          try{
           $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
            $query2  = "SELECT * FROM ecole WHERE id=$id";
           $result2 = $connect->query($query2);

          }

          catch(PDOException $err){
              echo $err->getMessage();
          }

    	foreach ($result2 as $raw) {
        echo'<p>'.$raw["organisation"].' - '.$raw["adresse"].' - '.$raw["commune"].' - '.$raw["wilaya"].' - '.$raw["telephone"].' - '.$raw["fax"].'</p>

         ';}
    ?>
</footer>

</html>