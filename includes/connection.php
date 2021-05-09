<?php 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'e-code';

    $conn = new mysqli($server, $user, $pass, $db);
    if($conn->connect_error)
        $db_error = "Can't made connection with database";
?>