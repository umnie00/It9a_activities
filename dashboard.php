<?php
session_start();


if (!isset($_SESSION['session_user']) && !isset($_SESSION['user_type'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<?php

if( isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'USER'){
    
        echo "<h2>Welcome to Dashboard</h2>";
        echo "<h3>UNLIMITED CONTENT(Server-side)</h3>";
        echo "<p>Session User Name: " . $_SESSION['session_user'] . "</p>";
}
?>
</div>


    <a class="logout-btn" href="logout.php">Logout</a>


</body>
</html>
