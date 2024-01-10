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
        $link = connect_database();
        $sel = mysqli_query($link,"SELECT * FROM DRUG_VIEW");
        require 'views/drugstock_view.php';
    }
}

?>