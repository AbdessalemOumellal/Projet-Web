
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">


    <!-- Mon fichier CSS -->
    <link rel="stylesheet" href="css/comparateur.css">

  </head>

<?php 
  session_start();
  ?>

  <body>

      <! Container global >
  <div class="custom-container">
  <p class="h1"> Comparer deux ecoles </p>

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
 

      <!header container>
      <section>
            <div class="header-container">
            <div class="button dropdown" align="center">
            <select class="selectpicker"  name="type">
                <option selected>Type de formation</option>
                <?php 
                      foreach ($result as $row ){
                        echo '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
                }
                 ?>
                 </select>
            </div>

            <!Script onSelect>

            <script type="text/javascript">
                $(document).ready(function(){
                    $("select.selectpicker").change(function(){
                        var selectedType = $(".selectpicker option:selected").val();
                        $.ajax({
                            type: "POST",
                            url: "process-request.php",
                            data: { type : selectedType }
                }).done(function(data){
                            $(".custom-select").html(data);
                });
                }); $("select.custom-select#1").change(function(){
                        var selectedType2 = $(".custom-select#1 option:selected").val();
                        $.ajax({
                            type: "POST",
                            url: "process-request2.php",
                            data: { type : selectedType2 }
                }).done(function(data){
                            $(".compare").html(data);
                });
                });
                });

                </script>

                <script type="text/javascript">
                    $(document).ready(function(){
                    $("select.custom-select#2").change(function(){
                        var selectedType3 = $(".custom-select#2 option:selected").val();
                        $.ajax({
                            type: "POST",
                            url: "process-request2.php",
                            data: { type : selectedType3 }
                }).done(function(data){
                            $(".ecole").html(data);
                        });
                        });
                        });
                </script>



      <!Contenu>

      <br>

      <!left>

         <div class="custom">
         <select id="1" class="custom-select">

         </select>
        </div>    
            <br>

      <!right>

        <div class="custom">
        <select id="2" class="custom-select">
        </select>
        </div>   

    </div>

        <div class="gauche">
        <div class="compare">
        </div>   


        </div>

        <div class="droite">
        <div class="ecole">
        </div>   
        </div>



  </section>

<!Disconnect Button>
        <div class="Disconnect">
              <br>
              <?php 
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
          {
              echo '<div align="right">
          <a id="dis" href="logout.php" align="center" class="btn btn-danger">Disconnect</a>
          </div>';
          } 
          ?>
          <br>
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

