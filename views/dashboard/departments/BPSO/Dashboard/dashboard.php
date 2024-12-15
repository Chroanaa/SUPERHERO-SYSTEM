<?php
// I just remove about that shit (DB Backend)
// include_once 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';

// $sql = "SELECT COUNT(DISTINCT case_number) AS total_cases FROM complaint";
// $stmt = $pdo->query($sql);
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// $total_cases = $row['total_cases'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user! - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Complaint main/bpso.css">
    <link rel="stylesheet" href="dashboard.css">
    <meta property="og:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <header class="header"></header>
        <div class="main-content">
            <div class="welcome-message">
                <h2>DASHBOARD</h2>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Column 1  -->
                    <div class="col-md-6 mb-4">
                        <a href="../Complaint%20main/complaints.php" class="text-decoration-none">
                            <div id="total-case" class="clickable-div" style="width: 100%; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
                                <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Complaint</span>
                                <h1 class="mt-3" style="color: #303030; font-weight: 500;">
                                    0
                                </h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 mb-4">
                        <a href="" style="text-decoration: none; color: inherit;">
                            <div class="clickable-div" style="width: 100%; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
                                <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Resolved Cases</span>
                                <h1 class="mt-3" style="color: #303030; font-weight: 500;">
                                    0
                                </h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 mb-4">
                        <a href="" style="text-decoration: none; color: inherit;">
                            <div class="clickable-div" style="width: 100%; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
                                <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Ongoing Cases</span>
                                <h1 class="mt-3" style="color: #303030; font-weight: 500;">
                                    0
                                </h1>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <a href="" style="text-decoration: none; color: inherit;">
                            <div class="clickable-div" style="width: 100%; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
                                <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Pending Cases</span>
                                <h1 class="mt-3" style="color: #303030; font-weight: 500;">
                                    0
                                </h1>
                            </div>
                        </a>
                    </div>
                    
            </div>


        </div>

        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Added modal-dialog-centered here -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signOutModalLabel">Confirm Sign Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to sign out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmSignOutBtn" data-bs-dismiss="modal">Sign
                            Out</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="../Complaint main/dashboard.js"></script>
        <script src="../sidebar.js" type="module"></script>
</body>

</html>