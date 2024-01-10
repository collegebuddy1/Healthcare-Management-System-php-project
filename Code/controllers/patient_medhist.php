<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{
    
    if($_SESSION['type']!='D')
        echo "Not authorised to view this page!";

    else {

        $edit = 0;
        
        $conn = connect_database();
        $qry = "SELECT * FROM MED_HISTORY WHERE PAT_ID='{$_GET['id']}' ;" ;
        $history = mysqli_query($conn,$qry);

        require "views/medhistory_view.php";
    }
}