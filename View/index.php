
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

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
            <img class="logo-page" style="height: 20vh;" src="img/logo.png">
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
        try{
            $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
            $query = "SELECT * FROM category";
          
            $result = $connect->query($query);
           
        }
        catch(PDOException $err){
            echo $err->getMessage();
        }
?>

      <!Contenu>

  <section>

      <!Sidebar>
      <div class="sidenav col-12 col-md-2 col-xl-2">

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

      <div class="content">

            <div class=" card-deck"">

              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/1.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations universitaires</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=8" class="btn btn-primary">Site</a>
                  </div>
              </div>

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/2.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations professionnelles</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=9" class="btn btn-primary">Site</a>
                  </div>
              </div>

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/3.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations secondaires</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=10" class="btn btn-primary">Site</a>
                  </div>
              </div>
            </div>
                                                                      <br> <br>
            <div class=" card-deck"">

              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/4.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations moyennes</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=11" class="btn btn-primary">Site</a>
                  </div>
              </div>

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/5.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations primaires</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=12" class="btn btn-primary">Site</a>
                  </div>
              </div>

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./img/6.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Formations maternelles</h5>
                    <p class="card-text"></p>
                    <a href="category.php?id=13" class="btn btn-primary">Site</a>
                  </div>
              </div>

            </div>
            <br><br>
            <a href="comparateur.php" type="button" class="btn btn-warning">Faire une comparaison !!</a>


      </div>

  </section>



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
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.js"></script>
  <script src="./js/popper.min.js"></script>
   <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

