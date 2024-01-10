<?php

require "connection.php";

$conn = connect_database();

$qry = "SELECT * FROM DRUG_COMPOSITION WHERE DRUG_ID={$_POST['id']};";

$res = mysqli_query($conn,$qry);

mysqli_close($conn);

if($res){
    $response = "";
    while($row = mysqli_fetch_assoc($res)){
        $response .= $row['CONTENT']." ".$row['PERCENTAGE']."<br>";
    }
    echo $response;
}
else
    echo "Unable to fetch DrugInfo";
    
?>