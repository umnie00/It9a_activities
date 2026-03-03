<?php
session_start();  // ← ONLY ONE session_start() at the VERY TOP!

/* ================================
   INITIAL VARIABLES
================================ */
$fullname = "";
$email = "";
$error = "";
$success = "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Signup</h2>

    <!-- ================================
         ERROR VALIDATION SECTION
    ================================ -->
    
    <!-- ERROR MESSAGE DISPLAY -->
    <?php if($error != ""): ?>
        <div class="error-validation">
            <p class="error"><?php echo $error; ?></p>
        </div>
    <?php endif; ?>

    <!-- SUCCESS MESSAGE DISPLAY -->
    <?php if($success != ""): ?>
        <div class="success-validation">
            <p class="success"><?php echo $success; ?></p>
        </div>
    <?php endif; ?>

    <!-- ================================
         MAIN FORM SECTION
    ================================ -->
    
        <form method="POST" action="process.php?action=signup">
            <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="fullname" value="<?php echo $fullname; ?>" >
                </div>

            <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" >
                </div>
            
            <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" minlength="6" >
                </div>

            <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" name="confirm_password">
                </div>

            <button type="submit">Sign Up</button>
        </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>