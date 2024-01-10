<?php

require_once "validation.php";
require_once "connection.php";
require_once "functions.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{
    $err_msg="";
    if(isset($_POST['doc_id'])){
        if(empty_check($_POST)){
            $err_msg = "Enter all required data";
        }
        else {
            $date=dateToDBFormat($_POST['b_date']);
            $time=timeToDBFormat($_POST['b_time']);
            
            $conn = connect_database();
            $qry = "INSERT INTO CONSULTATION (PAT_ID, STAFF_ID, DATE, TIME) VALUES (
                '{$_SESSION['uname']}', '{$_POST['doc_id']}', '{$date}', '{$time}');";
            $res = mysqli_query($conn,$qry);
            if(!$res){
                $err_msg = "Booking Failed. Probably the time is booked by someone else";
            }else {
                $err_msg = "Booking Successfull";
            }
            mysqli_close($conn);
        }
    }

    $conn = connect_database();
    $qry = "SELECT STAFF_ID,FNAME,LNAME,MOB_NO,SHIFT_START,SHIFT_END FROM STAFF S, USER U 
            WHERE S.STAFF_ID=U.U_ID AND S_TYPE='D' AND STAFF_ID != '{$_SESSION['uname']}';";
    $doctors = mysqli_query($conn,$qry);

    if(!$doctors)
        die(mysqli_error($conn));

    mysqli_close($conn);

    require "views/makeappointment_view.php";
}