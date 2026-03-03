<?php
session_start();

// Remove session
session_unset();
session_destroy();

// Remove cookie
setcookie("user_cookie", "", time() - 3600);

header("Location: login.php");
exit();