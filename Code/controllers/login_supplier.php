<?php

require_once 'connection.php';
require_once 'validation.php';

$err_msg = "";

if(isset($_POST['mob'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter Mobile No. and Password!";
        require 'views/login_supplier_view.php';
    }
    else{

        $hashed_pwd = hash("sha256",$_POST['pwd']);

        $conn = connect_database();

        $qry = "SELECT SUP_ID FROM SUPPLIER WHERE 
            CONTACT={$_POST['mob']} AND PWD='{$hashed_pwd}';";
        
        $res = mysqli_query($conn, $qry);

        if($res)
            $res = mysqli_fetch_assoc($res);
        
        if($res!=null)
        {                           //Login Successful. Setting up session
            session_start();
            $_SESSION['uname'] = $res['SUP_ID'];
            $_SESSION['mob'] = $_POST['mob'];
            $_SESSION['type'] = 'Z';

            $qry = "INSERT INTO SESSION_SUPPLIER SELECT '{$res['SUP_ID']}' 
                    WHERE NOT EXISTS (SELECT * FROM SESSION_SUPPLIER WHERE SUP_ID='{$res['SUP_ID']}'); ";
            $res = mysqli_query($conn, $qry);
            if(!$res)
                die(mysqli_error($conn));
            mysqli_close($conn);
            header("Location: /supplier/home");
        }
        else {
            mysqli_close($conn);
            $err_msg = "Invalid Login!";
            require 'views/login_supplier_view.php';
        }
    }
}
else
    require 'views/login_supplier_view.php';

?>