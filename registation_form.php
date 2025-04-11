<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <section class="form-container">
        <form action="register.php" method="post">
            <h3>Create an Account</h3>
            <div class="form-group">
                <input type="text" name="full_name" class="box" placeholder="Full Name" required>
                <input type="email" name="email" class="box" placeholder="Email" required>
           
                <input type="text" name="username" class="box" placeholder="Username" required>
                <input type="password" name="password" class="box" placeholder="Password" required>
            
            <input type="password" name="confirm_password" class="box" placeholder="Confirm Password" required>
            </div>
            <input type="submit" value="Register" class="btn">
            <p>Already have an account? <a href="login_form.php">Login Here</a></p>
        </form>
    </section>
</body>
</html>