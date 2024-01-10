<?php

require_once "validation.php";
require_once "connection.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{
    if(isset($_POST['date'])) {

        $edit=1;

        //Input Data Validation 
        if(empty_check($_POST)){
            $err_msg = "Enter data in all required fields";
            require 'views/medhistory_view.php';
        }
        else{
            //Add new record
            $conn = connect_database();
            $qry = "INSERT INTO MED_HISTORY (PAT_ID, H_DATE, DATA) VALUES (
                '{$_SESSION['uname']}', '{$_POST['date']}', '{$_POST['record']}' );" ;

            $res = mysqli_query($conn,$qry);

            if(!$res){
                $err_msg = "Adding New Record Failed";
            }
            mysqli_close($conn);
        }
    }

    $conn = connect_database();
    $qry = "SELECT * FROM MED_HISTORY WHERE PAT_ID='{$_SESSION['uname']}' ;" ;
    $history = mysqli_query($conn,$qry);

    require "views/medhistory_view.php";
}

?>