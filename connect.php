<?php
    function getDBConnection() {
        $servername = "127.0.0.1";
        $username = "lukas";
        $password = "#lukas_mysql#";
        $database = "sm_android_users";
        $port = "3306";

        $conn = new mysqli($servername, $username, $password, $database, $port);
        if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        return $conn;
    }
?>
