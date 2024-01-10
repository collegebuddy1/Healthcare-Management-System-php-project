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

        if(isset($_POST['u_id'])) {

            $conn = connect_database();
            
            $qry = "INSERT INTO PURCHASES (U_ID, STAFF_ID, TOTAL_PRICE) VALUES (
                '{$_POST['u_id']}', '{$_SESSION['uname']}', {$_POST['tot_prc']});";
            $res = mysqli_query($conn,$qry);

            $qry = "SELECT P_ID FROM PURCHASES WHERE U_ID='{$_POST['u_id']}' AND STAFF_ID='{$_SESSION['uname']}'
                AND TOTAL_PRICE = {$_POST['tot_prc']} ORDER BY DATE DESC;";
            $res = mysqli_query($conn,$qry);
            $res = mysqli_fetch_assoc($res);
            $pid = $res['P_ID'];

            foreach ($_POST as $key=>$val) {
                if($key!='u_id' && $key!='tot_prc'){

                    $qry = "SELECT PRICE FROM DRUG_STOCK WHERE STOCK_ID = {$key}";
                    $res = mysqli_query($conn,$qry);

                    $prc = mysqli_fetch_assoc($res);
                    $prc = (float)$prc['PRICE'];
                    $val = (float)$val;

                    $prc = $prc * $val;

                    $qry = "UPDATE DRUG_STOCK SET QNT=QNT-{$val} WHERE STOCK_ID = {$key} ;";
                    $res = mysqli_query($conn,$qry);

                    $qry = "INSERT INTO PURCHASE_DATA VALUES ($pid, $key, $val, $prc) ;";
                    $res = mysqli_query($conn,$qry);
                    
                }
            }

            header("Location: /home");

        }

        $conn = connect_database();
        $qry = "SELECT * FROM USER ORDER BY FNAME;";
        $users = mysqli_query($conn,$qry);

        $conn = connect_database();
        $qry = "SELECT * FROM DRUG_STOCK NATURAL JOIN DRUG_DATA ORDER BY DRUG_NAME,  EXP_DATE;";
        $drugs = mysqli_query($conn,$qry);

        $drugs2 = mysqli_query($conn,$qry);

        mysqli_close($conn);

        require "views/billing_view.php";
    }
}
