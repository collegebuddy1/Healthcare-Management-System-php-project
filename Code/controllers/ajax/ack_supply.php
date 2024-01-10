<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("HTTP/1.1 405 Not Allowed");
}
else{
    $conn = connect_database();
    $qry = "UPDATE SUPPLIES SET DELIVERED=1 WHERE ORD_ID={$_POST['ord_id']};" ;
    $res = mysqli_query($conn, $qry);

    $qry = "SELECT * FROM ORDERS NATURAL JOIN SUPPLIES WHERE ORD_ID={$_POST['ord_id']};" ;
    $res = mysqli_query($conn, $qry);
    $data = mysqli_fetch_assoc($res);
    $batch = date("Y/m/d");
    $exp_dt = date_add(date_create($batch),date_interval_create_from_date_string("2 years"));

    $price = ((float)($data['EST_PRC'])) / ((float)($data['QUANTITY']));

    $qry = "INSERT INTO DRUG_STOCK VALUES ({$data['ORD_ID']},{$data['DRUG_ID']},'{$batch}','{$exp_dt->format('Y-m-d')}',{$data['QUANTITY']},{$price} );" ;
    $res = mysqli_query($conn, $qry);
    
    if(!$res) {
        echo mysqli_error($conn);

        header("HTTP/1.1 404 Not Found");
    }
    else{
        header("HTTP/1.1 200 OK");
    }

}