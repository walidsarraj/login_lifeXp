<?php

session_start();
$errors = [
'login' => $_SESSION['login_error'] ?? '',
'register' => $_SESSION['register_error'] ?? ''
]; 
$activeform= $_SESSION['active_form'] ?? 'login-form';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error'>$error</p>" : "";
    
}
function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? "active" : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>xp-login</title>
  <link rel="stylesheet" href="XP.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">
</head>
 <body>
    <div class="container">
<div class="form-box <?=isActiveForm('login-form', $activeform); ?>" id="login-form">
    <form action="login-register.php" method="POST">
        <h2>Login</h2>
        <?=showError($errors['login']); ?>
        <input type="text" name="Username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="#" onclick="shownForm('register-form')">Sign up</a></p>
    </form>
</div>
<div class="form-box <?=isActiveForm('register-form', $activeform); ?>" id="register-form">
    <form action="login-register.php" method="POST">
        <h2>Register</h2>
        <?=showError($errors['register']); ?>
        <input type="text" name="Username" placeholder="Username" />
        <input type="number" name="age" placeholder="Age" />    
        <input type="password" name="password" placeholder="Password" />
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <button type="submit" name="register">Register</button>
        <p>Already have an account? <a href="#" onclick="shownForm('login-form')">Login</a></p>
    </form>
</div>

    </div>
    <script src="Xp.js"></script>
 </body>
</html> 