<?php

require_once "connection.php";
require_once "validation.php";

$err_msg = "";

if(isset($_POST['fname'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter data in all required fields";
        require 'views/signup_view.php';
    }
    else{

        //Check if user already exists

        $conn = connect_database();
        $qry = "SELECT COUNT(*) FROM SUPPLIER WHERE CONTACT = {$_POST['mob']} ;";
        $res = mysqli_query($conn,$qry);

        $res = mysqli_fetch_assoc($res);

        
        if(((int)$res['COUNT(*)'])>0){
            mysqli_close($conn);
            $err_msg = "Supplier with given Mobile no. already exists!";
            require 'views/signup_supplier_view.php';
        }

        if(empty($err_msg)){
            //Enter data to database

            $hashed_pwd = hash("sha256",$_POST['pwd']);

            $qry = "INSERT INTO SUPPLIER (SUP_FNAME, SUP_LNAME, ADDLINE1, ADDLINE2, PIN, CONTACT, PWD) 
                VALUES (
                    '{$_POST['fname']}',
                    '{$_POST['lname']}',
                    '{$_POST['addline1']}',
                    '{$_POST['addline2']}',
                    {$_POST['pin']},
                    {$_POST['mob']},
                    '{$hashed_pwd}');";

            $res = mysqli_query($conn,$qry);
            if(!$res){
                die("Data insertion failed : ".mysqli_error($conn));
            }
            mysqli_close($conn);
            header("Location: /supplier/login");
        }
    }

}
else
    require "views/signup_supplier_view.php";

?>