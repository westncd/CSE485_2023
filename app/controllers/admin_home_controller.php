<?php
    require_once(__DIR__ . '/../models/admin_home.php');
    require_once(__DIR__ . '/../../config/database.php');

    function showAllNum() {
        $conn = ConnectToDatabase();
        $result = GetNum($conn);
    return $result;
    }

?>