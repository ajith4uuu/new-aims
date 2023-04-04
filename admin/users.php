<?php
// Require authentication
require_once('../auth.php');

// Require database connection
require_once('../db.php');

// Require header and footer templates
require_once('../includes/header.php');
require_once('../includes/footer.php');

// Check if user is an admin
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

// Handle user management form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // TODO: Validate form data and handle errors

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $stmt = $db->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $password_hash, $role);
    $stmt->execute();
    $stmt->close();

    // Redirect to the users page
    header('Location: users.php');
    exit();
}

// Get the list of users
$stmt = $db->prepare("SELECT id, email, role FROM users");
$stmt->execute();
$stmt->bind_result($id, $email, $role);

$users = [];
while ($stmt->fetch()) {
    $users[] = [
        'id' => $id,
        'email' => $email,
        'role' => $role,
    ];
}
$stmt->close();

// Display the user management form and the list of users
?>
<div class="container">
    <h1>User Management</h1>

    <h2>Add User</h2>

    <form method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit">Add User</button>
    </form>

    <h2>Users</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
