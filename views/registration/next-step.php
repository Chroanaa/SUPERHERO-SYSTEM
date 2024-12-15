<?php
session_start();
require_once '../../controllers/db_connection.php'; // Ensure to include your DB connection file

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
                    <h1 class="text-dark">Next Steps</h1>
                    <p class="text-muted">There are among needed to consider to verify who you are.</p>
                </div>
                <form id="signup-form" method="POST" action="submit-ID.php" onsubmit="showLoadingModal(event)">
                    <div class="mb-2">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first-name" name="first_name" required>
                    </div>

                    <div class="mb-2">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="account_user_type" class="form-label">Affiliated Department</label>
                        <select class="form-select" id="account_user_type" name="account_user_type" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="admin1">Administrator 1 (Document Service)</option>
                            <option value="admin2">Administrator 2 (Secretary Portal)</option>
                            <option value="bpso">Barangay Public Safety Officer (BPSO)</option>
                            <option value="badac">Barangay Anti Drug Abuse Council (BADAC)</option>
                            <option value="bcpc">Barangay Council for the Protection of Children (BCPC)</option>
                            <option value="lupon-clerical">LUPON Tagapamayapa</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 mb-3" id="register-button">Proceed</button>

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