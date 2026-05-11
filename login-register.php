<?php 
session_start();
require_once "conf.php";

// Debug: Check if $conn is set
if(!isset($conn) || $conn === null){
    die("ERROR: Database connection failed. Please check conf.php");
}

if(isset($_POST['register'])){
    $username = $_POST['Username'];
    $age = $_POST['age'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender']; 

    $check_user = $conn->query("SELECT * FROM users WHERE username='$username'");  
    if($check_user->num_rows > 0){
        $_SESSION['register_error'] = "Username already exists.";
        $_SESSION['active_form'] = 'register-form';
    } else {
        if($conn->query("INSERT INTO users (username, age, password, gender) VALUES ('$username', $age, '$password', '$gender')")){
            $_SESSION['register_error'] = "Registration successful! Please login.";
            $_SESSION['active_form'] = 'login-form';
        } else {
            $_SESSION['register_error'] = "Error: " . $conn->error;
            $_SESSION['active_form'] = 'register-form';
        }
    }
    header("Location: index.php");
    exit();
}

if(isset($_POST['login'])){
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            header("Location: lifeXp.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
            $_SESSION['active_form'] = 'login-form';
        }
    } else {
        $_SESSION['login_error'] = "User not found.";
        $_SESSION['active_form'] = 'login-form';
    }
    header("Location: index.php");
    exit();
}
?>