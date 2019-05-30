
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="./css/datatables.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>

    <title>Off Canvas Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">


    <!-- Mon fichier CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <?php 
  session_start();
  ?>


  <body>

      <! Container global >
  <div class="custom-container">


      <!logo container>
            <div class="logo-container">
            <img class="logo-page"  style="height: 20vh;" src="img/logo.png">
            </div>

      <!Diapo Container>

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

      <!-- Bdd Connexion-->

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
      
      
              $query2  = "SELECT * FROM ecole WHERE category_id=$id";
              $result2 = $connect->query($query2);


          }

          catch(PDOException $err){
              echo $err->getMessage();
          }
      ?>

      <!Contenu>

  <section>

      <!Sidebar>
      <div class="sidenav col-12 col-md-2 col-xl-2">

                    
                    <?php /*
                    echo '<a href="./">Page daccueil</a>';
                    foreach ($result as $row ){
                    echo '<a class="btn btn-link" href="http://localhost/Projet-web/View/formation.php">'.$row["nom"].'</a>';
                    }
                    echo '<a href="#">About</a>';
                    */ ?>  

                    <a href="./"> Accueil </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=8"> Formations universitaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=9"> Formations professionnelles </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=10"> Formations secondaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=11"> Formations moyennes </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=12"> Formations primaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=13"> Formations maternelles </a>
                    <a href="#"> About </a>

                    

            <!ZonePub>
       <div class="custom-ads">
            <img src="./img/pub.jpg" alt="Espace publicitaire" />
       </div>

                <!Button login>
  
  <?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) echo '<a href="login.php" class="btn btn-danger" >Login</a> <br>  '  ;
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true) echo '<a href="login-admins.php" class="btn btn-danger" >Login Admin</a>'

?>

                     <!Disconnect Button>
              <br>
              <?php 
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
          {
              echo '<div align="right">
          <a id="dis" href="logout.php" align="center" class="btn btn-danger">Disconnect</a>
          </div>';
          } 
           if(isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true)
          {
              echo '<br><div align="right">
          <a id="dis" href="dashboard.php" align="center" class="btn btn-success">Gerer le site</a>
          </div>';
          } 
          ?>
          <br>

      </div>
      
      <!Zone-Contenu>

        <!Js Code for filter and sort>

        <script type="text/javascript">
            $(document).ready(function()
                {
                  $("table").tablesorter({
                    sortList: [[0,0]],
                  });
                }
              );

            function myFunction() {
                // Declare variables 
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("tableone");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0];
                  td2 = tr[i].getElementsByTagName("td")[2];
                  td3 = tr[i].getElementsByTagName("td")[3];
                  if (td || td2 || td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 ||txtValue3.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  } 
                }
              }

        </script>

      <div class="content">

      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"> <br>


<div class="tablesorter ws_data_table">
<table id="tableone" class="table table-striped table-bordered table-sm">
    <thead>
    <tr>
        <th class="th-sm">Nom</th>
        <th class="th-sm">catégorie</th>
        <th class="th-sm">wilaya</th>
        <th class="th-sm">commune</th>
        <th class="th-sm">adresse</th>
        <th class="th-sm">téléphones</th>   
        <th class="th-sm">Commenter</th>   
        <th class="th-sm">Gérer</th>           
        
    </tr>
    </thead>


    <tbody class="tabBody">
    <?php
    foreach ($result2 as $raw) {
        echo'<tr>
            <td><a href="http://localhost/Projet-web/View/ecole.php?id='.$raw['id'].'">'.$raw["organisation"].'</td>
            <td>'.$raw["domaine"].'</td>
            <td>'.$raw["wilaya"].'</td>
            <td>'.$raw["commune"].'</td>
            <td>'.$raw["adresse"].'</td>
            <td>'.$raw["telephone"].'</td><td>';
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) echo '<a href="commenter.php?id='.$raw["id"].'" class="btn btn-success" >Commenter</a>';  
           echo '</td>
         ';
    
          echo '<td>';
  if(isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true) echo '<a href="dashboard-ecole.php?id='.$raw["id"].'" class="btn btn-danger" >Gerer</a>';  

           echo '</td></tr>';
    }
    ?>
    </tbody>
</table>
</div>



  <!Button login>
  
  <?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) echo '<a href="login.php" class="btn btn-danger" >Login</a>   '  ;
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true) echo '<a href="login-admins.php" class="btn btn-danger" >Login Admin</a>'

?>

</div>

      <footer>
<a href="./"> Accueil </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=8"> Formations universitaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=9"> Formations professionnelles </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=10"> Formations secondaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=11"> Formations moyennes </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=12"> Formations primaires </a>
                    <a class="btn btn-link" href="http://localhost/Projet-web/View/category.php?id=13"> Formations maternelles </a>
                    <a href="#"> About </a>      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/bootstrap.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/theme.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
