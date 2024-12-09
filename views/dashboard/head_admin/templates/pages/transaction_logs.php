<!-- // STANDARD (DON'T MAKE ANY CHANGES) -->
<?php
require_once '../../../../../vendor/autoload.php'; // Include Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../../');
$dotenv->load();

$TRANSACTIONS_ENV = $_ENV['TRANSACTION_LOGS_API_URL'];

function getTransactions($url)
{
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return "Error fetching data from API";
    }
    return json_decode($response);
}

?>
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
     <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <header class="header"></header>

        <div class="main-content">
            <div class="welcome-message">
                <h2 class="text-danger">Transaction Logs</h2>
                <p>This contains real-time processes made by other departments to record their transactions.</p>
            </div>
          <div class="card-container">

          </div>
                
        </div>

        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
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

        <!-- View Details Modal -->
      

          

        <!-- Make sure Bootstrap JS is included -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../diff-sidebar.js" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    

    <script>
        const container = document.querySelector('.card-container');
        function populateModal(caseNumber, incidentTime, status, complainantName, respondentName) {
            document.getElementById('modal-case-number').textContent = caseNumber;
            document.getElementById('modal-incident-time').textContent = incidentTime;
            document.getElementById('modal-case-status').textContent = status;
            document.getElementById('modal-case-complainantName').textContent = complainantName;
            document.getElementById('modal-case-respondentName').textContent = respondentName;
        }
        const transactions = <?php echo json_encode(getTransactions($_ENV['TRANSACTION_LOGS_API_URL'])); ?>;   
        const transactionLogs = transactions.bms_resident_transaction_logs;
        const records = Array.isArray(transactionLogs) ? transactionLogs : [];
        console.log(records)
        records.forEach(record =>{
            container.innerHTML += `
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title>Log Id: ${record.log_id}</h5>
                    <p class="card-text">Resident Id: ${record.resident_id ?? "No Id"}</p>
                    <p class="card-text">Log Date: ${record.log_date}</p>
                    <p class="card-text">Log Time: ${record.log_time}</p>
                    <p class="card-text">Payment: ${record.payment}</p>
                    <p class="card-text">Status: ${record.status}</p>
                    <p class="card-text">Staff Id: ${record.staff_id ?? "No Id"}</p>
                    <p class="card-text">Type: ${record.type}</p>
                </div>
            </div>

            `
        })   

    </script>
</body>

</html>