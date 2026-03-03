<?php
session_start();

$server = $_SERVER['REQUEST_METHOD'];


//====HANDLES GUEST LOGIN==========
if($server === 'POST' && isset($_GET['action']) && $_GET['action'] === 'user-login') {
        
            $user_name = $_POST['username'] ?? '';
            $password = $_POST['password'] ??'';
        // VALIDATION
        if(empty($user_name)) {
                $_SESSION['error'] = "Username is required!";  // ← SETS the error!
                header("Location: login.php");
            exit();
        }
        
        if( isset($user_name) && !empty($user_name) && isset($password) && !empty($password) ) {
                $_SESSION['session_user'] = $user_name;
                $_SESSION['session_password'] = $password;
        }

        // SUCCESS
           
            $_SESSION['user_type'] = 'USER';
         setcookie("user_type", "USER", time() + 3600);  // Set cookie for 1 hour
            header("Location: dashboard.php");
            exit();
    
}

//====HANDLES SIGNUP==========
if ($server == 'POST' && isset($_GET['action']) && $_GET['action'] == 'signup') {
    if(isset($_GET['action']) && $_GET['action'] == 'signup') {
        
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';
        
        // VALIDATIONS
        if(empty($fullname) || empty($email) || empty($password) || empty($confirm)) {
                $_SESSION['error'] = "All fields are required!";  // ← SETS the error!
                $_SESSION['form_data'] = $_POST;  // ← Saves form data
                header("Location: signup.php");
            exit();
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email format!";  // ← SETS the error!
                $_SESSION['form_data'] = $_POST;
                header("Location: signup.php");
            exit();
        }
        
        if(strlen($fullname) < 3) {
                $_SESSION['error'] = "Name must be at least 3 characters!";  // ← SETS error!
                $_SESSION['form_data'] = $_POST;
                header("Location: signup.php");
            exit();
        }
        
        if($password != $confirm) {
                $_SESSION['error'] = "Passwords do not match!";  // ← SETS error!
                $_SESSION['form_data'] = $_POST;
                header("Location: signup.php");
            exit();
        }
        
        // SUCCESS
            $_SESSION['success'] = "Registration successful! Please login.";  // ← SETS success message!
            header("Location: login.php");
            exit();
    }
}
?>