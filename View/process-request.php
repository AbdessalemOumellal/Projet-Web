<!Script onSelect>

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
        $query = "SELECT * FROM ecole WHERE category_id=$type";
       
        $result = $connect->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row_res = $result->fetchAll();    
}
    catch(PDOException $err){
        echo $err->getMessage();
}
        
        echo '<option selected> Choisir Ecole </option>';
        foreach($row_res as $raw){
        echo '<option value="'.$raw["id"].'">'.$raw["organisation"].'</option>';
        }

?>

          
