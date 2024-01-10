<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{
    
    if($_SESSION['type']!='S')
        echo "Not authorised to view this page!";

    else {
        $err_msg = "";

        if(isset($_POST['sup_id'])){
            
            if(empty_check($_POST)){
                $err_msg = "Enter/Select all required data!";
            }else {
                //Add Order Details
                $conn = connect_database();
                $qry = "INSERT INTO ORDERS (STAFF_ID, SUP_ID, DRUG_ID, O_QUANTITY) VALUES (
                    '{$_SESSION['uname']}', {$_POST['sup_id']}, {$_POST['drug_id']}, {$_POST['qty']} );";
                $res = mysqli_query($conn,$qry);

                if(!$res){

                    $err_msg .= "Order Failed" ;
                }
                mysqli_close($conn);
            }
        }


        $conn = connect_database();
        $qry = "SELECT ORD_ID,SUP_FNAME,SUP_LNAME,DRUG_NAME,O_DATE,O_QUANTITY FROM ORDERS O, SUPPLIER S, DRUG_DATA D 
            WHERE O.SUP_ID=S.SUP_ID AND O.DRUG_ID = D.DRUG_ID AND ORD_ID NOT IN (SELECT ORD_ID FROM SUPPLIES) ORDER BY O_DATE DESC;";

        $orders = mysqli_query($conn,$qry);  
        if(!$orders)
            die(mysqli_error($conn));

        $qry = "SELECT O.ORD_ID,SUP_FNAME,SUP_LNAME,DRUG_NAME,O_DATE,O_QUANTITY, DELIVERED, S_DATE, QUANTITY, EST_PRC FROM ORDERS O, SUPPLIER S, DRUG_DATA D, SUPPLIES SS 
            WHERE O.SUP_ID=S.SUP_ID AND O.DRUG_ID = D.DRUG_ID AND SS.ORD_ID = O.ORD_ID ORDER BY O_DATE DESC;";

        $supplies = mysqli_query($conn,$qry);  
        if(!$supplies)
            die(mysqli_error($conn));

        $qry = "SELECT SUP_ID,SUP_FNAME,SUP_LNAME FROM SUPPLIER ;";

        $suppliers = mysqli_query($conn,$qry);  
        if(!$suppliers)
            die(mysqli_error($conn));

        $qry = "SELECT * FROM DRUG_DATA ;";

        $drugs = mysqli_query($conn,$qry);  
        if(!$drugs)
            die(mysqli_error($conn));

        mysqli_close($conn);

        require "views/order_view.php";
    }
}