<?php
include('db/conn.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = isset($_POST['company_name']) ? mysqli_real_escape_string($conn, $_POST['company_name']) : '';
    $full_name = isset($_POST['full_name']) ? mysqli_real_escape_string($conn, $_POST['full_name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $contact_no = isset($_POST['contact_no']) ? mysqli_real_escape_string($conn, $_POST['contact_no']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $created_date = date("Y-m-d H:i:s");
    $status = 'active';

    $company_result = createCompany($created_date, $company_name, $contact_no, $address, $email, $status);

    if ($company_result['status'] == "success") {
        $company_id = $company_result['company_id'];
        $user_result = registerUser($company_id, $created_date, $full_name, $email, $contact_no, 'admin', $password, 0, 'inactive');

        if ($user_result['status'] == "success") {
            // Generate a verification code
            $verification_code = mt_rand(100000, 999999);

            // Insert the verification code into the verification_codes table
            $user_id = $user_result['user_id'];
            $verification_insert_result = insertVerificationCode($user_id, $verification_code);

            if ($verification_insert_result['status'] == "success") {
                // Send verification email
                $subject = 'Email Verification';
                $message = 'Your verification code is: ' . $verification_code;
                $headers = 'From: your_email@example.com' . "\r\n" .
                           'Reply-To: your_email@example.com' . "\r\n" .
                           'X-Mailer: PHP/' . phpversion();
                
                if (mail($email, $subject, $message, $headers)) {
                    // Email sent successfully, redirect to confirm_email.php
                    header("Location: confirm_email.php?id=$user_id");
                    exit; // Make sure to exit after redirection
                } else {
                    // Email sending failed, handle the error
                    echo "Failed to send email. Please try again later.";
                }


               // echo "User registered successfully. Verification code sent to your email.";
            } else {
                echo "User registered successfully, but failed to insert verification code.";
            }
        } else {
            echo "User registration failed.";
        }
    } else {
        echo "Company creation failed!";
    }
}

function createCompany($created_date, $company_name, $phone, $address, $email, $status){
    $sql = "INSERT INTO `company`(`created_date`, `company_name`, `phone`, `address`, `email`, `status`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bind_param("ssssss", $created_date, $company_name, $phone, $address, $email, $status);

    if ($stmt->execute()) {
        return array("status" => "success", "company_id" => $stmt->insert_id);
    } else {
        error_log($GLOBALS['conn']->error);
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
        return array("status" => "error");
    }
}

function registerUser($company_id, $created_date, $user_full_name, $email, $phone, $role, $password, $is_email_verified, $status){
    $sql = "INSERT INTO `users`(`company_id`, `created_date`, `user_full_name`, `email`, `phone`, `role`, `password`, `is_email_verified`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bind_param("issssssis", $company_id, $created_date, $user_full_name, $email, $phone, $role, $password, $is_email_verified, $status);

    if ($stmt->execute()) {
        
        return array("status" => "success", "user_id" => $stmt->insert_id);
    } else {
        error_log($GLOBALS['conn']->error);
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
        return array("status" => "error");
    }
}

function insertVerificationCode($user_id, $verification_code){
    $sql = "INSERT INTO `verification_codes` (`user_id`, `code`) VALUES (?, ?)";
    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bind_param("is", $user_id, $verification_code);

    if ($stmt->execute()) {
        return array("status" => "success");
    } else {
        error_log($GLOBALS['conn']->error);
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
        return array("status" => "error");
    }
}

?>