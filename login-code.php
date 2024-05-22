<?php
include('db/conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = ? AND is_email_verified = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        //if (password_verify($password, $user['password'])) {
        if ($user['password'] === $password) {
            // Password is correct, login successful
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            // Redirect the user to the dashboard or another page
            header("Location: index.php");
            exit(); // Ensure that no other code is executed after the redirection
        } else {
            // Password is incorrect
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }
}
?>
