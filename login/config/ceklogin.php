<?php
// Start the session
session_start();

// Include database configuration file
include 'config/controller.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $username = mysqli_real_escape_string($user, $_POST['username']);
    $password = $_POST['password']; // Do not escape this, we'll hash later

    // Prepare SQL statement
    $stmt = $user->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $data['password'])) {
            // Set session variables based on user level
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];

            // Redirect to the appropriate dashboard
            if ($data['level'] == "admin") {
                header("Location: index.html");
            } else if ($data['level'] == "user") {
                header("Location: index.html");
            } else {
                header("Location: index.php?pesan=gagal");
            }
            exit(); // Always exit after a header redirect
        } else {
            header("Location: index.php?pesan=gagal");
            exit();
        }
    } else {
        header("Location: index.php?pesan=gagal");
        exit();
    }

}

// Close the database connection
$contact_us->close();

// Error reporting (for development, you may want to comment this out in production)
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));