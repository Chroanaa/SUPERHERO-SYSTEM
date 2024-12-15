<?php
session_start();

// Include the database connection
require_once '../../controllers/db_connection.php';

// // Check if the email and OTP verification status are set in the session
// if (!isset($_SESSION['email']) || !isset($_SESSION['otp_verified'])) {
//     session_unset();
//     session_destroy();
//     header("Location: clear_session.php");
//     exit();
// }

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the form
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

    // Hash the password securely using password_hash
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Generate a random account ID between 000000 and 999999
    $brgy_account_id = str_pad(random_int(000000, 999999), STR_PAD_LEFT);

    try {
        // Ensure the $pdo connection to the 'bms_account_portal' database is available
        $pdo = $databaseConnections['bms_account_portal'] ?? null; // Use the correct database connection

        if ($pdo) {
            // Prepare the SQL statement to insert the user data
            $stmt = $pdo->prepare("
                INSERT INTO brgy_existing_staff_users (brgy_email, brgy_password_hashed, brgy_password, brgy_account_id)
                VALUES (:email, :password_hashed, :password, :account_id)
            ");

            // Bind the parameters
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password_hashed', $password_hashed, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Note: storing plain password is generally discouraged
            $stmt->bindParam(':account_id', $brgy_account_id, PDO::PARAM_STR); // Bind the account ID

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: next-step.php"); // Redirect to success page or next step
                exit();
            } else {
                echo "Error: Could not save user data. Please try again.";
            }
        } else {
            echo "Error: Database connection to 'bms_account_portal' is not available.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Registration - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">Password</h1>
                    <p class="text-muted">Step ahead, before you proceed to our portal.</p>
                </div>
                <form id="signup-form" method="POST" action="provide-password.php">
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 mb-3">
                        Submit
                    </button>

                    <!-- Loading Modal -->
                    <!-- <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script>
            function showLoadingModal(event) {
                event.preventDefault(); // Prevent the form from submitting immediately
                var modal = document.getElementById('loadingModal');
                var bootstrapModal = new bootstrap.Modal(modal); // Create a Bootstrap modal instance
                bootstrapModal.show(); // Show the loading modal

                setTimeout(function() {
                    // Submit the form after the delay
                    document.getElementById('signup-form').submit();
                }, 3000); // Wait for 3000 milliseconds before submitting
            }
        </script>


</body>

</html>