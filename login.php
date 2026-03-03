    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="container">
     
        <h2> LogIn </h2>
            <form method="POST" action="process.php?action=user-login">
                    Username: <input type="text" name="username" minlength="3" maxlength="20" required><br><br>
                    Password: <input type="password" name="password" minlength="6" maxlength="20" required><br><br>
                        <button type="submit">Login</button>
            </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>

    </body>
    </html>