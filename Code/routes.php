<?php

$Routes = [
    '' => 'controllers/home.php',
    'login' => 'controllers/login.php',
    'signup'=> 'controllers/signup.php',
    'home' => 'controllers/home.php',
    'makeappointment'=> 'controllers/makeappointment.php',
    'medhistory' => 'controllers/medhistory.php',
    'profile' => 'controllers/profile.php',
    'bloodbank' => 'controllers/bloodbank.php',
    'order' => 'controllers/order.php',
    'drugstock' => 'controllers/drugstock.php',
    'billing' => 'controllers/billing.php',
    'patient' => 'controllers/patient.php',
    'patientmedhist' => 'controllers/patient_medhist.php',
    'logout' => 'controllers/logout.php',

    'supplier' => 'controllers/home_supplier.php',
    'supplier/login' => 'controllers/login_supplier.php',
    'supplier/signup' => 'controllers/signup_supplier.php',
    'supplier/home' => 'controllers/home_supplier.php',
    'supplier/profile' => 'controllers/profile_supplier.php',
    'supplier/orderview' => 'controllers/orderview_supplier.php',
    'supplier/logout' => 'controllers/logout_supplier.php',

    'ajax/fetchdruginfo' => 'controllers/ajax/fetch_druginfo.php',
    'ajax/acksupply' => 'controllers/ajax/ack_supply.php'
    
];

?>