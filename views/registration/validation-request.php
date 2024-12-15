<?php
session_start(); // Start the session

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wait for Confirmation - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Spinner styles */
        .spinner-border {
            width: 64px;
            height: 64px;
        }

        #approval-message i {
            font-size: 64px;
            color: #28a745;
        }

        /* this-feature */

        .this-feature {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .this-feature h2 {
            font-size: 1rem;
            /* margin-bottom: 10px; */
        }

        .this-feature p {
            font-size: 0.9rem;
            margin-bottom: 0;
            word-break: normal;
        }

        /* Notice tips styles */
        .notice-tips {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 450px;
        }

        .notice-tips h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .notice-tips p {
            font-size: 0.9rem;
            margin-bottom: 0;
            word-break: normal;
        }

        .notice-icon {
            position: absolute;
            top: -20px;
            right: 0px;
            font-size: 40px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-flex align-items-center justify-content-center vh-100 position-relative">
            <div class="login-wrapper">
                <div class="login-header text-center">
                    <h1 class="text-dark">Wait for a moment...</h1>
                    <p class="text-muted">You're in line, don't close this tab.</p>
                </div>

                <!-- Spinner UI -->
                <div class="spinner-container text-center" id="spinner">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- Approval Message -->
                <!-- <div class="approval-message text-center" id="approval-message">
                    <i class="fa-solid fa-circle-check mb-4 mt-4"></i>
                    <p>Your request to authorize in our system was approved.</p>
                </div> -->
            </div>
        </section>

        <!-- Notice Tips -->
        <button class="this-feature" onclick="window.location.href='clear_session.php'">
            This feature is currently working in progress.
        </button>

        <!-- Notice Tips -->
        <div class="notice-tips">
            <i class="fas fa-lightbulb notice-icon"></i>
            <h2>Notice to New User (Admin)</h2>
            <p>Kindly wait for those are authorized persons in system to ensure that they gave you access as soon as possible.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        function showSpinner() {
            document.getElementById('spinner').style.display = 'block';
        }

        // Call showSpinner when the page loads to simulate waiting
        window.onload = showSpinner;
    </script>
</body>

</html>