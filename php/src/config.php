<?php
    $servername = "db";
    $username = "MYSQL_USER";
    $password = "MYSQL_PASSWORD";
    $dbname = "MYSQL_DATABASE";


    $conn = new mysqli($servername,$username,$password,$dbname);
    $conn->set_charset("utf8");
    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    // echo("Successfully connected to server <br>");

?>