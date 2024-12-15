<?php
session_start();
require_once '../../controllers/db_connection.php'; // Ensure this path is correct for your setup
require_once '../../vendor/autoload.php'; // Include Composer's autoloader if needed for any dependencies

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = trim($_POST['email']);

    // Check if email is provided
    if (empty($email)) {
        echo "Error: Email is required.";
        exit();
    }

    // Generate OTP and set the current timestamp
    $otp = rand(1000, 9999);
    $otp_sent_at = date('Y-m-d H:i:s');

    // Check if the 'bms_account_portal' database connection is available
    if (isset($databaseConnections['bms_account_portal'])) {
        $db = $databaseConnections['bms_account_portal'];

        try {
            // Insert OTP request into the `brgy_user_registration_process` table
            $stmt = $db->prepare("INSERT INTO brgy_user_registration_process (email, otp, otp_sent_at) VALUES (?, ?, ?)");
            $stmt->execute([$email, $otp, $otp_sent_at]);

            // Store the OTP and email in the session for verification
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
            $_SESSION['otp_step_in_progress'] = true; // Flag to track OTP step

            // Redirect to OTP verification page
            header('Location: verification-code.php');
            exit();
        } catch (PDOException $e) {
            // Handle potential database errors
            echo "Database error: " . $e->getMessage();
            exit();
        }
    } else {
        // Handle case where the database connection isn't available
        echo "Error: Could not connect to the database.";
        exit();
    }
} else {
    // If accessed directly, redirect to signup page
    header('Location: signup.php');
    exit();
}
?>
