<?php

require_once "validation.php";

session_start();

if(!sup_loggedin_check($_SESSION)) {
    header("Location: /supplier/login");
}
else{

    $conn = connect_database();
    $qry = "SELECT ORD_ID, S.SUP_ID, D.DRUG_ID, DRUG_NAME,O_DATE, O_QUANTITY, STAFF_ID FROM ORDERS O, SUPPLIER S, DRUG_DATA D
        WHERE O.SUP_ID=S.SUP_ID AND O.DRUG_ID = D.DRUG_ID AND S.SUP_ID={$_SESSION['uname']} AND ORD_ID NOT IN (SELECT ORD_ID FROM SUPPLIES);";
    $orders = mysqli_query($conn,$qry);

    $qry = "SELECT S.ORD_ID, D.DRUG_ID, DRUG_NAME, S_DATE,S.QUANTITY, EST_PRC, STAFF_ID, DELIVERED FROM SUPPLIES S, ORDERS O, DRUG_DATA D 
        WHERE O.ORD_ID = S.ORD_ID AND O.DRUG_ID=D.DRUG_ID AND SUP_ID={$_SESSION['uname']};";
    $F_orders = mysqli_query($conn,$qry);

    mysqli_close($conn);

    require 'views/home_supplier_view.php';
}

?>