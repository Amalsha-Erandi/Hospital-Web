<?php

session_start();
require_once "config.php";

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = "Email is already registered";
        $_SESSION['active_form'] = "register";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $user_type);
        $stmt->execute();
    }

    $stmt->close();
    header("Location: loging.php");
    exit();
}


//Login 


if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password']) && $user['user_type'] === $user_type) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type'];

            
            if ($user['user_type'] === 'admin') {
                header("Location: Admin/php/admin.php");
            } elseif ($user['user_type'] === 'staff') { // Lowercase
                header("Location: Admin/php/staffdashboard.php");
            } elseif ($user['user_type'] === 'patient') { // Lowercase
                header("Location: Admin/php/patientportal.php");
            }
            
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email, password, or user type';
    $_SESSION['active_form'] = 'login';
    header("Location: loging.php");
    exit();
}
?>
