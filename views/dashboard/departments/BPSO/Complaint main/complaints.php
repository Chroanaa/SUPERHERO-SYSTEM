<?php
session_start();
require_once '../../../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../../');
$dotenv->load();

// Get the AWS credentials from the environment
$awsAccessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$awsSecretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$awsRegion = $_ENV['AWS_REGION'];

// Create the DynamoDB client
$dynamoDbClient = new DynamoDbClient([
   'region' => $awsRegion,
   'version' => 'latest',
   'credentials' => [
      'key'    => $awsAccessKeyId,
      'secret' => $awsSecretAccessKey,
   ],
]);

// Query to get complaint data
$complaintsTable = 'bms_bpso_portal_complaint_records'; // Your table name in DynamoDB
$response = $dynamoDbClient->scan([
   'TableName' => $complaintsTable,
]);

// Retrieve items from DynamoDB
$complaints = $response['Items'];

// Convert and format case created date (assuming it's stored in ISO8601 format in DynamoDB)
function formatCaseCreatedDate($caseCreated)
{
   // If case_created is stored as a string in ISO8601 format (e.g., '2024-11-23T13:45:00Z')
   $dateTime = new DateTime($caseCreated, new DateTimeZone('GMT'));
   $dateTime->setTimezone(new DateTimeZone('Asia/Taipei'));

   // Format the date in 'Nov, 24, 2024 as of 03:33 PM'
   return $dateTime->format('M, d, Y \a\s \o\f h:i A'); // Using 'M' for short month and adding "as of"
}

// Convert case_number if it's stored as a number
function formatCaseNumber($caseNumber)
{
   return (string)$caseNumber; // Converts number to string
}

// Format incident date and time
function formatIncidentDateTime($incidentCaseTime, $incidentCaseIssued) {
   $dateTime = new DateTime($incidentCaseTime, new DateTimeZone('GMT'));
   $dateTime->setTimezone(new DateTimeZone('Asia/Taipei'));

   // Combine incidentCaseTime and incidentCaseIssued and format
   return $dateTime->format('M, d, Y \a\s \o\f h:i A');
}

function formatNames($namesArray) {
    // Debug the incoming data structure
    error_log('Names Array: ' . print_r($namesArray, true));
    
    // Check if $namesArray is a DynamoDB 'L' (List) type
    if (isset($namesArray['L']) && is_array($namesArray['L'])) {
        $names = array_map(function ($item) {
            // Each item in the list should be an 'M' (Map) type
            if (isset($item['M']['name']['S'])) {
                return htmlspecialchars($item['M']['name']['S']);
            }
            return '';
        }, $namesArray['L']);

        // Filter out empty values and join
        $names = array_filter($names);
        return implode(', ', $names);
    }
    
    return '';
}

// Sort complaints by 'case_created' in descending order (latest first)
usort($complaints, function ($a, $b) {
   $dateA = strtotime($a['case_created']['S']);
   $dateB = strtotime($b['case_created']['S']);
   return $dateB <=> $dateA; // Descending order
});

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
   <link rel="stylesheet" href="bpso.css">
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
            <h2>COMPLAINT (BPSO)</h2>
         </div>
         <div id="complaintsection" style="display: block;">
            <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff; display: flex; flex-direction: column; align-items: flex-start;">
               <input type="text" id="search-input" placeholder="Search..." onkeyup="filterTable()" style="padding: 10px; width: 35%; max-width: 700px;">
               <!-- Category dropdown -->
               <div class="dropdown" style="display: flex; justify-content: flex-start; align-items: center;">
                  <button id="dropdownButton" class="btn btn-info dropdown-toggle btn-hover" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: block; width: 250px; height: 50px; font-size: 20px; background-color: #ffffff; border: 1px solid #b1b1b1;">
                     Category
                  </button>
                  <ul class="dropdown-menu" style="z-index: 2;">
                     <li><a class="dropdown-item" href="#" onclick="selectCategory('Minor case')">Minor case</a></li>
                     <li><a class="dropdown-item" href="#" onclick="selectCategory('Major case')">Major case</a></li>
                  </ul>
               </div>
               <!-- Case table -->
               <table id="tablecase" class="table table-bordered" style="border: 1px solid #d4d4d4; text-align: center;">
                  <thead>
                     <tr>
                        <th scope="col">Case Number</th>
                        <th scope="col">Case Created</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Case Status</th>
                        <th scope="col">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($complaints as $complaint): ?>
                        <tr>
                           <td><?= formatCaseNumber($complaint['case_number']['N']) ?></td> 
                           <td><?= formatCaseCreatedDate($complaint['case_created']['S']) ?></td>
                           <td><?= $complaint['case_type']['S'] ?></td>
                           <td><?= $complaint['case_status']['S'] ?></td>
                           <td>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewDetailsModal" onclick="
                                 populateModal(
                                    '<?= isset($complaint['case_number']['N']) ? formatCaseNumber($complaint['case_number']['N']) : '' ?>',
                                    '<?= isset($complaint['incident_case_time']['S']) && isset($complaint['incident_case_issued']['S']) ? formatIncidentDateTime($complaint['incident_case_time']['S'], $complaint['incident_case_issued']['S']) : '' ?>',
                                    '<?= isset($complaint['case_type']['S']) ? $complaint['case_type']['S'] : '' ?>',
                                    '<?= isset($complaint['case_status']['S']) ? $complaint['case_status']['S'] : '' ?>',
                                    '<?= isset($complaint['case_complainants']) ? formatNames($complaint['case_complainants']) : '' ?>',
                                    '<?= isset($complaint['case_respondents']) ? formatNames($complaint['case_respondents']) : '' ?>',
                                    '<?= isset($complaint['case_description']['S']) ? htmlspecialchars($complaint['case_description']['S']) : '' ?>'
                                 )">
                                 View Details
                              </button>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <!-- View Details Modal -->
   <div class="modal fade" id="viewDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="viewDetailsModalLabel">Case Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
               <p><strong>Case Number:</strong> <span id="modal-case-number"></span></p>
               <p><strong>Incident Date:</strong> <span id="modal-incident-date"></span></p>
               <p><strong>Case Type:</strong> <span id="modal-case-type"></span></p>
               <p><strong>Case Status:</strong> <span id="modal-case-status"></span></p>
               <p><strong>Complainants:</strong> <span id="modal-complainants"></span></p>
               <p><strong>Respondents:</strong> <span id="modal-respondents"></span></p>
               <p><strong>Description:</strong> <span id="modal-case-description"></span></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger">Forward Case</button>
            </div>
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
   <script src="../sidebar.js" type="module"></script>
   <script src="dashboard.js"></script>
   <script>
      // Function to filter the table based on search input
      function filterTable() {
         let input = document.getElementById('search-input').value.toUpperCase();
         let table = document.getElementById('tablecase');
         let rows = table.getElementsByTagName('tr');

         for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < cells.length; j++) {
               if (cells[j].textContent.toUpperCase().includes(input)) {
                  match = true;
                  break;
               }
            }

            rows[i].style.display = match ? '' : 'none';
         }
      }

      function populateModal(caseNumber, incidentDate, caseType, caseStatus, complainants, respondents, description) {
         document.getElementById('modal-case-number').textContent = caseNumber;
         document.getElementById('modal-incident-date').textContent = incidentDate;
         document.getElementById('modal-case-type').textContent = caseType;
         document.getElementById('modal-case-status').textContent = caseStatus;
         document.getElementById('modal-complainants').textContent = complainants;
         document.getElementById('modal-respondents').textContent = respondents;
         document.getElementById('modal-case-description').textContent = description;
      }
   </script>
</body>

</html>