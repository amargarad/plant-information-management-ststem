<?php
session_start();
include 'db_connect.php'; // Database connection

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT full_name, email, username FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// If user not found, set default values
$full_name = $user['full_name'] ?? 'Not available';
$email = $user['email'] ?? 'Not available';
$username = $user['username'] ?? 'Not available';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile_style.css">
</head>
<body>

    <div class="profile-container">
        <h2>User Profile</h2>
        <div class="profile-details">
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</body>
</html>
