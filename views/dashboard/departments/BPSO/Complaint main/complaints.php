<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$apiUrl = "https://yjme796l3k.execute-api.ap-southeast-2.amazonaws.com/dev/api/v1/brgy/bpso/complaint_records";

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // We want the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, [
   'Content-Type: application/json',
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check if there was an error
if (curl_errno($ch)) {
   echo 'Error:' . curl_error($ch);
   exit;
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the response contains the expected data
if (isset($data['bpso_all_complaints'])) {
   $complaints = $data['bpso_all_complaints'];
} else {
   $complaints = [];
}

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
                        <th scope="col">Complaint Category</th>
                        <th scope="col">Case Category</th>
                        <th scope="col">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <h2>tinangal ko muna</h2>
                     <?php
                     // if (count($complaints) > 0) {
                     //    foreach ($complaints as $complaint) {
                     //       // Format the incident_case_issued date inside the loop
                     //       $issuedDate = new DateTime($complaint['incident_case_issued']);
                     //       $formattedIssuedDate = $issuedDate->format('m/d/Y h:i A'); // 12-hour format with AM/PM

                     //       echo "<tr>
                     //          <th scope='row'>" . htmlspecialchars($complaint['case_number']) . "</th>
                     //          <td>" . htmlspecialchars($complaint['case_type']) . "</td>
                     //          <td>" . htmlspecialchars($formattedIssuedDate) . "</td>
                     //          <td>" . htmlspecialchars($complaint['special_case']) . "</td>
                     //          <td>
                     //             <button class='btn btn-primary'>See details</button>
                     //             <button class='btn btn-danger'>Forward</button>
                     //          </td>
                     //       </tr>";
                     //    }
                     // } else {
                     //    echo "<tr><td colspan='5'>No records found</td></tr>";
                     // }
                     ?>
                  </tbody>
               </table>
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
   <?php
   ?>
</body>

</html>