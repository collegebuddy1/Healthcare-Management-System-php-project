<?php

require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{
    if($_SESSION['uname']=='admin'){
        $err_msg="";

        if(isset($_POST['u_id'])){
            if(empty_check($_POST)){
                $err_msg = "Enter all required data";
            }
            else {
                $conn = connect_database();
                $qry = "INSERT INTO STAFF VALUES('{$_POST['u_id']}','{$_POST['start_time']}','{$_POST['end_time']}','{$_POST['role']}');";
                $res = mysqli_query($conn,$qry);
                if(!$res){
                    $err_msg = "Query Failed";
                }
            }
        }
        
        $conn = connect_database();
        $qry = "SELECT * FROM USER WHERE U_ID NOT IN (SELECT STAFF_ID FROM STAFF);";
        $users = mysqli_query($conn,$qry);

        $conn = connect_database();
        $qry = "SELECT STAFF_ID,FNAME,LNAME,S_TYPE,SHIFT_START, SHIFT_END FROM STAFF, USER WHERE STAFF_ID = U_ID;";
        $staffs = mysqli_query($conn,$qry);

        mysqli_close($conn);

        require 'views/home_admin_view.php';
    }
    else if($_SESSION['type']=='S')
        require 'views/home_staff_view.php';
    else if($_SESSION['type']=='D'){

        $date = date('Y-m-d');
        $time = date('h:m:s');
        $conn = connect_database();
        $qry = "SELECT PAT_ID,CONS_ID,DATE,TIME,SEX,DOB FROM CONSULTATION C, USER U WHERE U.U_ID=C.PAT_ID AND STAFF_ID = '{$_SESSION['uname']}' 
            AND DATE >= '{$date}' AND CONS_ID NOT IN (SELECT CONS_ID FROM PRESCRIPTION) AND CONS_ID NOT IN (SELECT CONS_ID FROM OBSERVATION) ORDER BY DATE, TIME;";

        $appointments = mysqli_query($conn,$qry);
        require 'views/home_doc_view.php';
    }
    else
        require 'views/home_user_view.php';
}
?>