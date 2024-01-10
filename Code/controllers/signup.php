<?php

require_once "connection.php";
require_once "validation.php";

$err_msg = "";

if(isset($_POST['u_id'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter data in all required fields";
        require 'views/signup_view.php';
    }
    else{

        //Check if user already exists

        $conn = connect_database();
        $qry = "SELECT COUNT(*) FROM USER WHERE U_ID='{$_POST['u_id']}'";
        $res = mysqli_query($conn,$qry);

        $res = mysqli_fetch_assoc($res);

        
        if(((int)$res['COUNT(*)'])>0){
            mysqli_close($conn);
            $err_msg = "User already exists!";
            require 'views/signup_view.php';
        }

        if(empty($err_msg)){
            //Enter data to database

            $hashed_pwd = hash("sha256",$_POST['pwd']);

            $qry = "INSERT INTO USER VALUES (
                '{$_POST['u_id']}',
                '{$_POST['fname']}',
                '{$_POST['lname']}',
                '{$_POST['sex']}',
                '{$_POST['dob']}',
                '{$_POST['bgroup']}',
                '{$_POST['addline1']}',
                '{$_POST['addline2']}',
                {$_POST['pin']},
                {$_POST['mob']},
                '$hashed_pwd');";

            $res = mysqli_query($conn,$qry);

            if($res){
                $qry = "INSERT INTO PATIENT VALUES ('{$_POST['u_id']}',{$_POST['emg']});" ;
                $res = mysqli_query($conn,$qry);
                if(!$res)
                    die("Emg.Contact insertion failed: [$qry] ".mysqli_error($conn));
            }
            else{
                die("Data insertion failed : ".mysqli_error($conn));
            }
            mysqli_close($conn);
            header("Location: /login");
        }
    }

}
else
    require "views/signup_view.php";

?>