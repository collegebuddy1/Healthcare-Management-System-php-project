<?php

require_once "validation.php";

session_start();

if(!sup_loggedin_check($_SESSION)) {
    header("Location: /supplier/login");
}
else{
    $err_msg="";

    $ord_id = $_GET['o_id'];

    $conn = connect_database();
    $qry = "SELECT * FROM ORDERS NATURAL JOIN DRUG_DATA WHERE ORD_ID={$ord_id} AND SUP_ID={$_SESSION['uname']};";
    $res = mysqli_query($conn,$qry);
    $orderdata = mysqli_fetch_assoc($res);
    mysqli_close($conn);

    if(isset($_POST['prc'])) {

        //Input Data Validation 
        if(empty_check($_POST)){
            $err_msg = "Enter data in all required fields";
        }
        else if($orderdata)
        {
            $conn = connect_database();
            $qry = "INSERT INTO SUPPLIES (ORD_ID, QUANTITY, EST_PRC) VALUES (
                {$ord_id}, {$_POST['qty']}, {$_POST['prc']} );" ;
            $res = mysqli_query($conn,$qry);
            mysqli_close($conn);
            if($res) {
                header("Location: /supplier/home");
            }else {
                $err_msg = "Query Failed";
            }
        } 
    }

    require "views/orderview_supplier_view.php";
}