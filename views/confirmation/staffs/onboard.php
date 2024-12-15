<?php
session_start();
require_once '../../../controllers/db_connection.php'; // Ensure this path is correct for your setup

// Get the email from the session
$email = $_SESSION['email'] ?? ''; // Fallback to empty if not set
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brgy. Sta Lucia's Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="./components/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Brgy. Sta Lucia's Portal">
    <meta property="og:description" content="Your description here for the portal.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Brgy. Sta Lucia's Portal">
    <meta name="twitter:description" content="Your description here for the portal.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-none d-md-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">First Time Login Attempt as Head Admin</h1>
                    <p class="text-muted">We've detected that you need authorization follow steps.</p>
                </div>
                <form method="POST" action="process.php">
                    <ul class="list-unstyled mb-3">
                        <li>
                            <p>Your email is: <strong><?php echo htmlspecialchars($email); ?></strong></p>
                        </li>
                        <li>
                            <p>First is that your user credentials must be secured</p>
                        </li>
                        <li>
                            <p>Then you need to change your temporary email address and password.</p>
                        </li>
                    </ul>
                    
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"> <!-- Hidden input for email -->
                    
                    <button type="button" class="btn btn-danger w-100 mb-3" data-bs-toggle="modal" data-bs-target="#confirmationModal">Proceed</button>
                    
                    <!-- Confirmation Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to proceed with the login attempt?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Confirm</button> <!-- Submit button -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <a class="btn btn-light w-100" data-bs-toggle="modal"
                data-bs-target="#signOutModal">Log Out</a>
            </div>
        </section>

        <!-- Confirmation Modal to Sign Out -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Sign Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This process cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmLogout">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- show test user creds ^^ -->
    <!-- <div class="principal-author">
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#infoModal">
                Try this out.
            </button>
        </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        function confirmProceed() {
            // Redirect to verification-code.php
            window.location.href = 'verification-code.php';
        }

        document.getElementById('confirmLogout').onclick = function() {
            // Redirect to the desired page after confirming logout
            window.location.href = 'clear_session.php'; // Replace with your logout URL
        };
    </script>
</body>

</html>