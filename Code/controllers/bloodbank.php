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

        if(isset($_POST['d_uname'])){
            //Blood Donation Update

            $conn = connect_database();
            $qry = "INSERT INTO BLOOD_DONATION (U_ID, AMOUNT) VALUES ('{$_POST['d_uname']}', {$_POST['units']});";
            $res = mysqli_query($conn,$qry);

            if($res) {
                $qry = "UPDATE BLOOD_BANK SET QUANTITY = QUANTITY + {$_POST['units']} 
                    WHERE BLOOD_TYPE = (select B_GROUP from USER WHERE U_ID = '{$_POST['d_uname']}');";

                $res = mysqli_query($conn,$qry);
            }
            mysqli_close($conn);

        }

        if(isset($_POST['r_uname'])){
            //Blood Requirement Update

            $conn = connect_database();
            $qry = "INSERT INTO BLOOD_REQUIREMENT (U_ID, AMOUNT) VALUES ('{$_POST['r_uname']}', {$_POST['units']});";
            $res = mysqli_query($conn,$qry);

            if($res) {
                $qry = "UPDATE BLOOD_BANK SET QUANTITY = QUANTITY - {$_POST['units']} 
                    WHERE BLOOD_TYPE = (select B_GROUP from USER WHERE U_ID = '{$_POST['r_uname']}');";

                $res = mysqli_query($conn,$qry);
            }
            mysqli_close($conn);
        }

        $conn = connect_database();
        $qry = "SELECT * FROM BLOOD_BANK";
        $res = mysqli_query($conn,$qry);

        while($bg = mysqli_fetch_assoc($res)){
            $table[$bg['BLOOD_TYPE']] = $bg['QUANTITY'];
        }
        mysqli_close($conn);

        require "views/bloodbank_view.php";
    }
}

?>