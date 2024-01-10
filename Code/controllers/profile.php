<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    $conn = connect_database();
    $qry = "SELECT * FROM USER WHERE U_ID='{$_SESSION['uname']}' ;";
    $res = mysqli_query($conn,$qry);
    if($res)
        $profile = mysqli_fetch_assoc($res);
    else
        die(mysqli_error($conn));
    
    require 'views/profile_view.php';
}

?>