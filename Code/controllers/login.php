<?php

require_once 'connection.php';
require_once 'validation.php';

$err_msg = "";

if(isset($_POST['uname'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter Username and Password!";
        require 'views/login_view.php';
    }
    else{

        $hashed_pwd = hash("sha256",$_POST['pwd']);

        $conn = connect_database();

        if($_POST['type']=='S' || $_POST['type']=='D'){

            //Check if claim of being staff is true

            $qry = "SELECT STAFF_ID FROM STAFF WHERE 
                STAFF_ID='{$_POST['uname']}';";

            $res = mysqli_query($conn, $qry);

            if($res)
                $res = mysqli_fetch_assoc($res);

            if(!$res) {
                mysqli_close($conn);
                $err_msg = "Invalid Login!";
                require 'views/login_view.php';
            } 
        }

        if(empty($err_msg)){

            $qry = "SELECT U_ID FROM USER WHERE 
            U_ID='{$_POST['uname']}' AND PWD='{$hashed_pwd}';";

            $res = mysqli_query($conn, $qry);

            $res = mysqli_fetch_assoc($res);

            mysqli_close($conn);

            if($res)
            {                           //Login Successful. Setting up session
                session_start();
                $_SESSION['uname'] = $res['U_ID'];
                $_SESSION['type'] = $_POST['type'];

                $conn = connect_database();
                $qry = "INSERT INTO SESSION_USER SELECT '{$res['U_ID']}','{$_POST['type']}' 
                        WHERE NOT EXISTS (SELECT * FROM SESSION_USER WHERE U_ID='{$res['U_ID']}'); ";

                $res = mysqli_query($conn, $qry);

                if(!$res)
                    die(mysqli_error($conn));

                mysqli_close($conn);

                header("Location: /home");
            }
            else {
                $err_msg = "Invalid Login!";
                require 'views/login_view.php';
            }
        }

    }
}
else
    require 'views/login_view.php';

?>