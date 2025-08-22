<?php 
session_start();
require_once 'config.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkuser = $conn->query("SELECT username from users WHERE username = '$username'");
    if($checkuser->num_rows > 0) {
        $user=$result->fetch_assoc();
        if(password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header("Location: admin-dashboard.php");
            exit();
        }
    }
    $_SESSION['login_error'] = "Invalid username or password.";
    header("Location: index.php");
    exit();
}
?>