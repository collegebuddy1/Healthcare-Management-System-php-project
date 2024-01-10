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
        $err_msg="";
        if(isset($_POST['cons_id'])) {
            if(!empty($_POST['ref'])){
                $conn = connect_database();
                $qry = "UPDATE CONSULTATION SET REF_HOSPITAL='{$_POST['ref']}'
                    WHERE CONS_ID={$_POST['cons_id']};";
                $res = mysqli_query($conn,$qry);
                if(!$res)
                    $err_msg .= "Updating reference hospital failed. ";
            }
            if(!empty($_POST['presc'])){
                $conn = connect_database();
                $qry = "INSERT INTO PRESCRIPTION VALUES ({$_POST['cons_id']}, '{$_POST['presc']}');"; 
                $res = mysqli_query($conn,$qry);
                if(!$res)
                    $err_msg .= "Inserting Prescription failed. ";
            }
            if(!empty($_POST['obsc'])){
                $conn = connect_database();
                $qry = "INSERT INTO OBSERVATION VALUES ({$_POST['cons_id']}, '{$_POST['obsc']}');"; 
                $res = mysqli_query($conn,$qry);
                if(!$res)
                    $err_msg .= "Inserting Observation failed. ";
            }
            mysqli_close($conn);
            if(empty($err_msg))
                header("Location: /home");
            else
                require "views/patient_view.php";
        }
        else{
            $conn = connect_database();
            $qry = "SELECT * FROM CONSULTATION C, USER U 
                WHERE U.U_ID=C.PAT_ID AND CONS_ID={$_GET['id']};";
            $res = mysqli_query($conn,$qry);
            if($res)
                $patient = mysqli_fetch_assoc($res);
            else
                $err_msg="DBError";
            
            $qry = "SELECT * FROM HOSPITAL_CONTACT;";
            $hosp = mysqli_query($conn,$qry);
    
            require "views/patient_view.php";
        }
    }

}