<?php
session_start();
require_once '../../../../vendor/autoload.php'; // Include Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../');
$dotenv->load();

$_ENV['TRANSACTION_LOGS_API_URL'];

function getTransactions($url)
{
   $response = file_get_contents($url);
   if ($response === FALSE) {
      return "Error fetching data from API";
   }
   return json_decode($response);
}
?>
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
   <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
   <link rel="stylesheet" href="../../../../custom/css/index.css">
   <!-- Open Graph Meta Tags -->
   <meta property="og:title" content="Onboarding as BADAC Officer for Brgy. Management">
   <meta property="og:description" content="Still in development phase.">
   <meta property="og:image" content="URL_to_your_image.jpg">
   <meta property="og:url" content="https://yourwebsite.com">
   <meta property="og:type" content="website">
   <!-- Twitter Card Meta Tags -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="Onboarding as BADAC Officer for Brgy. Management">
   <meta name="twitter:description" content="Still in development phase.">
   <meta name="twitter:image" content="URL_to_your_image.jpg">
   <meta name="twitter:url" content="https://yourwebsite.com">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   a {
      text-decoration: none;
   }
</style>

<body>
   <div id="app">
      <header class="header"></header>
      <div class="main-content">
         <table class="table table-striped table-bordered">
            <thead class="thead-dark">
               <tr>
                  <th>Resident Id</th>
                  <th>Log Id</th>
                  <th>Status</th>
                  <th>Payment</th>
                  <th>Log Date</th>
                  <th>Staff Id</th>
                  <th>Type</th>
               </tr>
            </thead>
            <tbody class="tBody">
            </tbody>
         </table>

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

   </div>
   <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
   <script src="./sidebar.js" type="module"></script>
   <script>
      const container = document.querySelector('.tBody');
      const transactions = <?php echo json_encode(getTransactions($_ENV['TRANSACTION_LOGS_API_URL'])); ?>;
      const transactionLogs = transactions.bms_resident_transaction_logs;
      const records = Array.isArray(transactionLogs) ? transactionLogs : [];
      records.forEach(record => {
         container.innerHTML += `
            <tr>
                <td>${record.resident_id}</td>
                <td>${record.log_id}</td>
                <td class = "status">${record.status}</td>
                <td>${record.payment}</td>
                <td>${record.log_date}</td>
                <td>${record.staff_id}</td>
                <td>${record.type}</td>
            </tr>
            `;
      });
      const status = document.querySelectorAll('.status');
      status.forEach((stat) => {
         const text = stat.textContent.toLowerCase();
         if (text === 'pending') {
            stat.style.color = 'red';
         } else if (text === 'completed') {
            stat.style.color = 'green';
         } else if (text === 'denied') {
            stat.style.color = 'blue';
         }
      });
   </script>
</body>

</html>