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
if(isset($_POST["type"])){
    // Capture selected country
    $type = $_POST["type"];
    $host = "localhost";
$username = "root";
$password = "root";
$database ="projet";
}

    try{
        $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
        $query = "SELECT * FROM formation WHERE ecole=$type";
       
        $result = $connect->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row_res = $result->fetchAll();

        $query1 = "SELECT * FROM commentaire WHERE ecole_id=$type";
   
        $result1 = $connect->prepare($query1);
        $result1->execute();
        $result1->setFetchMode(PDO::FETCH_ASSOC);
        $row_res1 = $result1->fetchAll();
           
}
    catch(PDOException $err){
    
        echo $err->getMessage();
}
                
                echo '<br>';
                foreach($row_res as $raw){
                $ttc=$raw["taxe"]*$raw["tarif_ht"]/100+$raw["tarif_ht"];
                    echo '<tr>';
                    echo '<td  class="data" id="idname">'.$raw["fomration"].'</td>';
                    echo '<td  class="data" id="idname">'.$raw["volume_horaire"].'</td>';
                    echo '<td  class="data" id="idname">'.$raw["tarif_ht"].'</td>';
                    echo '<td  class="data" id="idname">'.$raw["taxe"].'</td>';
                    echo '<td  class="data" id="idname">'.$ttc.'</td>';
                    echo '</tr>';
                    echo '<br>';
                }

                echo '<table class="table table-dark">';
                foreach ($row_res1 as $row) {
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
                echo '</table>';
     

?>

</tbody>
</table>