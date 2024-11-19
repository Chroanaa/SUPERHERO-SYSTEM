<!-- CUSTOM PROGRAM (FEEL FREE TO CHANGE IT) -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user! - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <link href="sidebar.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../../../custom/css/index.css">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as BCPC Officer for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as BCPC Officer for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">

    <!-- External libraries -->
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>
    
</head>

<body>
    <div id="app">
        <header class="header"></header>

        <div class="main-content content-area active">
            <div id="content">
                <div class="grid-container">
                    <article>
                        <strong>Department of Social Welfare and Development</strong>
                        <br>
                        DSWD Central Office, Constitution Hills, Batasan Complex, Quezon City, Philippines 1126
                        <br>
                        GLOBE: 09171105686 and 09178272543
                        <br>
                        SMART: 09199116200
                        <br>
                        &nbsp;inquiry@dswd.gov.ph
                        <br>
                        <br>
                        <strong>Office Hours:</strong>
                        <br>
                        Mondays to Fridays (except holidays), 8:00 AM to 5:00 PM
                    </article>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.709289650059!2d120.97992197583868!3d14.615629485872564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5f957156c4f%3A0x6dac4018b910b527!2sDepartment%20of%20Health!5e0!3m2!1sen!2sph!4v1730728530036!5m2!1sen!2sph" 
                    width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered here -->
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
    </div>

<script src="./javascript/sidebar.js" type="module"></script>
</body>
</html>