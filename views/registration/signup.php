<!-- STANDARD PROGRAM (DON'T CHANGE IT) -->

<?php
session_start();
require_once '../../controllers/db_connection.php'; // Ensure this path is correct for your setup

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = trim($_POST['email']);
    
    // Check if email is provided
    if (empty($email)) {
        echo "Error: Email is required.";
        exit();
    }
    
    // Generate a unique account ID
    $account_id = uniqid();

    // Store email and account ID in session for later use
    $_SESSION['email'] = $email;
    $_SESSION['account_id'] = $account_id; // Save account ID

    // Redirect to the process.php for OTP handling
    header("Location: process.php");
    exit();
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
                    <h1 class="text-dark">Sign Up</h1>
                    <p class="text-muted">This registration is for Brgy. Staffs and Residents</p>
                </div>
                <form id="signup-form" method="POST" action="process.php" onsubmit="return validateForm()">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="hidden" name="account_id" value="<?php echo uniqid(); ?>"> <!-- Generates a unique ID -->
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 mb-3" id="register-button" disabled>Proceed</button>
                    <button type="button" class="btn btn-light w-100" id="signInButton" data-bs-toggle="modal" data-bs-target="#confirmModal">Login</button>
                </form>

                <!-- Redirect to Sign In Confirmation Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to go back to the Sign In page? Any unsaved data will be lost.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="clear_session.php">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script>
            document.getElementById('email').addEventListener('input', function() {
                validateEmail(this);
            });

            // Validate email format
            function validateEmail(input) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(input.value)) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
                toggleRegisterButton();
            }

            // Enable or disable the register button based on validation
            function toggleRegisterButton() {
                const emailValid = !document.getElementById('email').classList.contains('is-invalid');
                document.getElementById('register-button').disabled = !(emailValid);
            }

            // Handle form submission with final validation check
            function validateForm() {
                const email = document.getElementById('email');
                // Final validation: prevent submission if invalid
                if (email.value.trim() === '' || email.classList.contains('is-invalid')) {
                    return false;
                }
                return true;
            }

            // Handle Sign In button click with conditional modal display or redirection
            document.getElementById('signInButton').addEventListener('click', function() {
                const email = document.getElementById('email').value.trim();

                if (email === '') {
                    // Redirect directly if both fields are empty
                    window.location.href = 'clear_session.php';
                } else {
                    // Show modal if there’s unsaved data
                    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                    confirmModal.show();
                }
            });
        </script>



</body>

</html>