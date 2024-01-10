<?php

require_once "validation.php";

session_start();

if(!sup_loggedin_check($_SESSION)) {
    header("Location: /supplier/login");
}
else{
    $conn = connect_database();
    $qry = "SELECT * FROM SUPPLIER WHERE SUP_ID='{$_SESSION['uname']}' ;";
    $res = mysqli_query($conn,$qry);
    if($res)
        $profile = mysqli_fetch_assoc($res);
    else
        die(mysqli_error($conn));
    
    require 'views/profile_supplier_view.php';
}