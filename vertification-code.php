<?php
include('db/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    $verification_code = isset($_POST['verification_code']) ? mysqli_real_escape_string($conn, $_POST['verification_code']) : '';
    $user_id = isset($_POST['user_id']) ? mysqli_real_escape_string($conn, $_POST['user_id']) : '';

    // Check if the verification code matches the one stored in the database
    $sql = "SELECT * FROM verification_codes WHERE user_id = '$user_id' AND code = '$verification_code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Update the user's email verification status
        $sql_update = "UPDATE users SET is_email_verified = 1 WHERE id = '$user_id'";
        mysqli_query($conn, $sql_update);

        // Delete the verification code from the database
        $sql_delete = "DELETE FROM verification_codes WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);

        echo "Email verified successfully!";
    } else {
        echo "Invalid verification code.";
    }
}
?>