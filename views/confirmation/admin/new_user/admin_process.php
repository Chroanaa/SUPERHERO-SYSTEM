<?php
session_start();
require_once '../../../../controllers/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $account_id = $_POST['account_id'];
    $registered_email = $_POST['registered_email'];
    $otp = $_POST['otp'];
    $otp_sent_at = $_POST['otp_sent_at'];

    // Fetch the previously sent OTP from the database (if stored) for validation
    // Assuming you have a query to get the previous OTP and its details based on account_id or email
    // $previousOTP = // Fetch from the database

    // Example validation logic
    if ($otp == $_SESSION['otp']) {
        // If OTP matches, update verification_at timestamp in the database
        $verification_at = date('Y-m-d H:i:s');
        
        // Update your database (brgy_admin_login_process table)
        // Example SQL statement
        $stmt = $pdo->prepare("UPDATE brgy_admin_login_process SET verification_at = ? WHERE account_id = ? AND registered_email = ?");
        $stmt->execute([$verification_at, $account_id, $registered_email]);

        // Clear session variables or redirect to success page
        unset($_SESSION['otp']);
        // Redirect or load the success page
        header("Location: success_page.php");
        exit();
    } else {
        // Handle invalid OTP case
        echo "Invalid OTP. Please try again.";
    }
}
?>
