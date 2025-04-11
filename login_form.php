<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <section class="form-container">
        <form action="login.php" method="post">
            <h3>Login</h3>
            <input type="text" name="user_id" class="box" placeholder="Enter your ID" required>
            <input type="password" name="password" class="box" placeholder="Enter your Password" required>
            <input type="submit" value="Login" class="btn">
            <p>Don't have an account? <a href="registation_form.php">Create Account</a></p>
        </form>
    </section>
</body>
</html>
