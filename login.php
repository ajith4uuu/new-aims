<?php
// Require database connection
require_once('db.php');

// Start the session
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // TODO: Validate form data and handle errors

    // Retrieve user from the database
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Save user data in the session
        $_SESSION['user'] = $user;

        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        // Display error message
        $error = 'Invalid email or password.';
    }
}

// Display the login form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
