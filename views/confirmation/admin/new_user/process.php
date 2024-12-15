<?php
session_start();
require_once '../../../../controllers/db_connection.php'; // Ensure this path is correct for your setup

// Choose the database you want to use; change the key as needed
$pdo = $databaseConnections['bms_account_portal']; // Using the account portal database

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the session and other necessary fields
    $registered_email = $_POST['email'] ?? '';
    $account_id = null; // Replace this with the logic to fetch the actual account_id if available
    $otp = rand(1000, 9999); // Generate a random 4-digit OTP
    $otp_sent_at = date('Y-m-d H:i:s'); // Current timestamp when OTP is sent
    $verification_at = null; // This can be set when the OTP is verified
    $date_issued = date('Y-m-d H:i:s'); // Current timestamp

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $pdo->prepare("INSERT INTO brgy_admin_login_process (account_id, registered_email, otp, otp_sent_at, verification_at, date_issued) 
    VALUES (:account_id, :registered_email, :otp, :otp_sent_at, :verification_at, :date_issued)");

    // Bind parameters
    $stmt->bindParam(':account_id', $account_id);
    $stmt->bindParam(':registered_email', $registered_email);
    $stmt->bindParam(':otp', $otp);
    $stmt->bindParam(':otp_sent_at', $otp_sent_at);
    $stmt->bindParam(':verification_at', $verification_at);
    $stmt->bindParam(':date_issued', $date_issued);

    // Execute the statement
    if ($stmt->execute()) {
        // Successful insertion, you might want to send the OTP to the user's email here
        // For example, use a mail function to send the OTP to the registered_email
        // mail($registered_email, "Your OTP", "Your OTP is: " . $otp);

        // Redirect to verification-code.php
        header("Location: verification-code.php");
        exit(); // Make sure to exit after the redirect
    } else {
        // Handle the error (for example, log it or display a message)
        echo "Error inserting data: " . $stmt->errorInfo()[2];
    }
} else {
    // Handle invalid access (optional)
    echo "Invalid request method.";
}
?>
