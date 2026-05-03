<?php
    $accounts = [
        'admin' => ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
        'user' => ['username' => 'user', 'password' => 'user123', 'role' => 'user']
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (isset($accounts[$username]) && $accounts[$username]['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $accounts[$username]['role'];
            header("Location: ../views/admin/index.php");
            exit();
        }
    }
?>