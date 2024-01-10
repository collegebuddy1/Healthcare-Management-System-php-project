<?php

function connect_database(){
    $config = [
        'servername' => 'localhost',
        'database' => 'HMS',
        'username' => 'root',
        'password' => '',
    ];

    $conn = mysqli_connect(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['database']
    );
    if(!$conn) {
        die("MySQL connection failed: ". mysqli_connect_error());
    }
    return $conn;
}

?>