<?php
    function ConnectToDatabase() {
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'btth01_cse485';
    
        $conn = new mysqli($server, $user, $pass, $database);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
?>
