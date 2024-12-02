<!-- // STANDARD (DON'T MAKE ANY CHANGES) -->
<?php
require_once '../../../../../vendor/autoload.php'; // Include Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../../');
$dotenv->load();

$BCPC_ENV = isset($_ENV['BCPC_API_URL']) ? $_ENV['BCPC_API_URL'] : '';
$BPSO_ENV = isset($_ENV['BPSO_API_URL']) ? $_ENV['BPSO_API_URL'] : '';
$BADAC_ENV = isset($_ENV['BADAC_API_URL']) ? $_ENV['BADAC_API_URL'] : '';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
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
                <h2 class="text-danger">Transactions</h2>
                <p>This contains real-time processes made by other departments to record their transactions.</p>
            </div>

            <div class="transaction-page shadow bg-light rounded-3 py-5 px-4 container-fluid mt-2">
                <table class="table table-striped table-bordered" id="tableData">
                    <thead>
                        <tr>
                            <th>Transaction No.</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (getTransactions($BADAC_ENV) as $data) {
                            foreach ($data as $d) {
                                $complainant_name = htmlspecialchars($d->case_complainants[0]->name);
                                $respondent_name = htmlspecialchars($d->case_respondents[0]->name);
                                echo "<tr id='{$d->case_number}'>";
                                echo "<td>{$d->case_number}</td>";
                                echo "<td>{$d->case_description}</td>";
                                echo "<td>{$d->affiliated_dept_case}</td>";
                                echo "<td>" . date("d-m-Y", strtotime($d->case_created)) . "</td>";
                                echo "<td>{$d->case_status}</td>";
                                echo "<td>
                                    <button class='btn btn-primary' id='{$d->case_number}' data-id='{$d->case_number}' type='button'
                                        data-bs-toggle='modal' data-bs-target='#viewDetailsModal'
                                        onclick='populateModal(
                                            \"" . htmlspecialchars($d->case_number) . "\",
                                            \"" . date("H:i", strtotime($d->incident_case_time)) . "\",
                                            \"" . htmlspecialchars($d->case_type) . "\",
                                            \"" . htmlspecialchars($d->case_status) . "\",
                                            \"" . htmlspecialchars($d->case_description) . "\",
                                            \"" . $complainant_name . "\",
                                            \"" . $respondent_name . "\"
                                        )'>
                                        View
                                    </button>
                                </td>";
                                echo "</tr>";
                            }
                        }
                        foreach (getTransactions($BCPC_ENV) as $data) {
                            foreach ($data as $d) {
                                $complainant_name = htmlspecialchars($d->case_complainants[0]->name);
                                $respondent_name = htmlspecialchars($d->case_respondents[0]->name);
                                echo "<tr id='{$d->case_number}'>";
                                echo "<td>{$d->case_number}</td>";
                                echo "<td>{$d->case_description}</td>";
                                echo "<td>{$d->affiliated_dept_case}</td>";
                                echo "<td>" . date("d-m-Y", strtotime($d->case_created)) . "</td>";
                                echo "<td>{$d->case_status}</td>";
                                echo "<td>
                                    <button class='btn btn-primary' id='{$d->case_number}' data-id='{$d->case_number}' type='button'
                                        data-bs-toggle='modal' data-bs-target='#viewDetailsModal'
                                        onclick='populateModal(
                                            \"" . htmlspecialchars($d->case_number) . "\",
                                            \"" . date("H:i", strtotime($d->incident_case_time)) . "\",
                                            \"" . htmlspecialchars($d->case_type) . "\",
                                            \"" . htmlspecialchars($d->case_status) . "\",
                                            \"" . htmlspecialchars($d->case_description) . "\",
                                            \"" . $complainant_name . "\",
                                            \"" . $respondent_name . "\"
                                        )'>
                                        View
                                    </button>
                                </td>";
                                echo "</tr>";
                            }
                        }
                        foreach (getTransactions($BPSO_ENV) as $data) {
                            foreach ($data as $d) {
                                $complainant_name = htmlspecialchars($d->case_complainants[0]->name);
                                $respondent_name = htmlspecialchars($d->case_respondents[0]->name);
                                echo "<tr id='{$d->case_number}'>";
                                echo "<td>{$d->case_number}</td>";
                                echo "<td>{$d->case_description}</td>";
                                echo "<td>{$d->affiliated_dept_case}</td>";
                                echo "<td>" . date("d-m-Y", strtotime($d->case_created)) . "</td>";
                                echo "<td>{$d->case_status}</td>";
                                echo "<td>
                                    <button class='btn btn-primary' id='{$d->case_number}' data-id='{$d->case_number}' type='button'
                                        data-bs-toggle='modal' data-bs-target='#viewDetailsModal'
                                        onclick='populateModal(
                                            \"" . htmlspecialchars($d->case_number) . "\",
                                            \"" . date("H:i", strtotime($d->incident_case_time)) . "\",
                                            \"" . htmlspecialchars($d->case_type) . "\",
                                            \"" . htmlspecialchars($d->case_status) . "\",
                                            \"" . htmlspecialchars($d->case_description) . "\",
                                            \"" . $complainant_name . "\",
                                            \"" . $respondent_name . "\"
                                        )'>
                                        View
                                    </button>
                                </td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">Case Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Case Number:</strong> <span id="modal-case-number"></span></p>
                        <p><strong>Incident Time:</strong> <span id="modal-incident-time"></span></p>
                        <p><strong>Case Type:</strong> <span id="modal-case-type"></span></p>
                        <p><strong>Status:</strong> <span id="modal-case-status"></span></p>
                        <p><strong>Description:</strong> <span id="modal-case-description"></span></p>
                        <p><strong>Complainant Name:</strong> <span id="modal-case-complainantName"></span></p>
                        <p><strong>Respondent Name:</strong> <span id="modal-case-respondentName"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add this script section before closing body tag -->
        <script>
            function populateModal(caseNumber, incidentTime, caseType, status, description, complainant, respondent) {
                document.getElementById('modal-case-number').textContent = caseNumber;
                document.getElementById('modal-incident-time').textContent = incidentTime;
                document.getElementById('modal-case-type').textContent = caseType;
                document.getElementById('modal-case-status').textContent = status;
                document.getElementById('modal-case-description').textContent = description;
                document.getElementById('modal-case-complainantName').textContent = complainant;
                document.getElementById('modal-case-respondentName').textContent = respondent;
            }
        </script>

        <!-- Make sure Bootstrap JS is included -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../diff-sidebar.js" type="module"></script>
    <script src="../acc_manage.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

    <script>
        new DataTable('#tableData', {
            responsive: true
        });

        const badac = <?= getTransactions($BADAC_ENV) ?>;
        console.log(badac);

        function populateModal(caseNumber, incidentTime, caseType, status, description) {
            document.getElementById('modal-case-number').textContent = caseNumber;
            document.getElementById('modal-incident-time').textContent = incidentTime;
            document.getElementById('modal-case-type').textContent = caseType;
            document.getElementById('modal-case-status').textContent = status;
            document.getElementById('modal-case-description').textContent = description;
        }
    </script>
</body>

</html>