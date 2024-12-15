<?php
session_start();
require_once '../../controllers/db_connection.php';

// Check if the email is set in the session
if (!isset($_SESSION['email']) || !isset($_SESSION['otp'])) {
    session_unset();
    session_destroy();
    header("Location: clear_session.php");
    exit();
}

// Handle OTP verification logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the OTP inputs from the form
    $otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'];

    // Get the email from the session
    $email = $_SESSION['email'];

    try {
        $db = $databaseConnections['bms_account_portal'];
        
        // Verify the OTP
        $stmt = $db->prepare("SELECT otp FROM brgy_user_registration_process WHERE email = ? ORDER BY otp_sent_at DESC LIMIT 1");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['otp'] === $otp) {
            // OTP is valid
            // Update OTP verification status
            $updateStmt = $db->prepare("UPDATE brgy_user_registration_process SET otp_verified = TRUE WHERE email = ?");
            $updateStmt->execute([$email]);

            // Proceed to provide password page
            header("Location: provide-password.php");
            exit();
        } else {
            // Invalid OTP message
            $error_message = "Error: Invalid OTP. Please try again.";
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
    <link href="../../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- applicable for deployment -->
    <meta property="og:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
    <style>
        .otp-input {
            width: 130px;
            height: 100px;
            text-align: center;
            font-size: 48px;
            margin: 0 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .otp-input:focus {
            border-color: #007bff;
            outline: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">One Time Password (OTP)</h1>
                    <p class="text-muted">We sent you a verification code to your email.</p>
                </div>
                <form id="signup-form" method="POST" onsubmit="return validateForm()" action="verification-code.php">
                    <div class="mb-4">
                        <input type="text" name="otp1" class="otp-input" maxlength="1"
                            oninput="validateInput(this); moveToNext(this, 'otp2')">
                        <input type="text" name="otp2" class="otp-input" maxlength="1" id="otp2"
                            oninput="validateInput(this); moveToNext(this, 'otp3')"
                            onkeydown="moveToPrev(event, this, 'otp1')">
                        <input type="text" name="otp3" class="otp-input" maxlength="1" id="otp3"
                            oninput="validateInput(this); moveToNext(this, 'otp4')"
                            onkeydown="moveToPrev(event, this, 'otp2')">
                        <input type="text" name="otp4" class="otp-input" maxlength="1" id="otp4" oninput="validateInput(this)"
                            onkeydown="moveToPrev(event, this, 'otp3')">
                    </div>
                    <!-- Modal Trigger -->
                    <button type="button" class="btn btn-light w-100 mb-3">
                        Resend Code
                    </button>
                    <button type="submit" class="btn btn-danger w-100 mb-3">
                        Submit
                    </button>

                    <!-- Loading Modal -->
                    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php if (isset($error_message)) echo $error_message; ?>


            </div>
        </section>

        <!-- show test user creds ^^ -->
        <div class="principal-author">
            <a href="https://mail.google.com/" class="btn btn-link" target="_blank">
                Open your Gmail
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        function validateForm() {
            const isValid = true; // Replace this with actual validation logic

            if (isValid) {
                // Show loading modal on successful validation
                showModal();

                // Optional: Delay form submission to simulate loading
                setTimeout(() => {
                    document.getElementById("signup-form").submit();
                }, 3000); // 2-second delay
            }

            return false; // Prevent default submission to handle manually
        }

        function showModal() {
            const loadingModal = document.getElementById('loadingModal');

            // Add modal classes
            loadingModal.classList.add('show');
            loadingModal.style.display = 'block';
            loadingModal.setAttribute('aria-hidden', 'false');

            // Create and show backdrop
            const backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade show';
            document.body.appendChild(backdrop);

            // Prevent body scroll
            document.body.classList.add('modal-open');
        }

        function closeModal() {
            const loadingModal = document.getElementById('loadingModal');

            // Remove modal classes
            loadingModal.classList.remove('show');
            loadingModal.style.display = 'none';
            loadingModal.setAttribute('aria-hidden', 'true');

            // Remove backdrop
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.classList.remove('show');
                setTimeout(() => backdrop.remove(), 150);
            }

            // Re-enable body scroll
            document.body.classList.remove('modal-open');
        }

        // Hide modal when clicked outside or after submission
        document.addEventListener('click', function(event) {
            const loadingModal = document.getElementById('loadingModal');
            if (loadingModal.classList.contains('show') && !loadingModal.contains(event.target)) {
                closeModal();
            }
        });
    </script>



</body>

</html>