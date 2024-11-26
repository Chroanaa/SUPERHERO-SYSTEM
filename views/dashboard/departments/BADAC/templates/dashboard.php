<?php
// Start the session to manage user login or any other session-based data
session_start();

// Declare API endpoint URL for fetching BCPC complaints
$api_url = 'https://yjme796l3k.execute-api.ap-southeast-2.amazonaws.com/dev/api/v1/brgy/badac/complaint_records/';

// Fetch the data from the API using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response from the API
$complaints = json_decode($response, true);

// Check if the API request was successful
if (!$complaints || !isset($complaints['badac_all_complaints'])) {
   $error_message = "Error fetching complaints data.";
}

// Sort complaints array by 'case_created' field
if (isset($complaints['badac_all_complaints']) && count($complaints['badac_all_complaints']) > 0) {
   usort($complaints['badac_all_complaints'], function ($a, $b) {
      $dateA = new DateTime($a['case_created']);
      $dateB = new DateTime($b['case_created']);
      return $dateB <=> $dateA; // Sort in descending order (newest first)
   });
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
   <link rel="stylesheet" href="../../../../../custom/css/index.css">
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
</head>
<style>
   a {
      text-decoration: none;
   }

   .pagination .page-item .page-link {
      color: #1E477D;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
   }

   .pagination .page-item.active .page-link {
      color: #fff;
      background-color: #1E477D;
      border-color: #1E477D;
   }

   .pagination .page-item:hover .page-link {
      color: #1E477D;
      background-color: #e9ecef;
      border-color: #dee2e6;
   }
</style>

<body>
   <div id="app">
      <div class="container-fluid">
         <header class="header"></header>

         <div class="main-content">
            <div class="main-container container-fluid">
               <div class="container-fluid d-flex justify-content-end">
                  <div class="breadcrumb">
                     <span class="breadcrumb-item active">BADAC</span>
                     <div class="breadcrumb-item">
                        <a href="Home" class="text-danger">Dashboard</a>
                     </div>
                  </div>
               </div>
               <section class="dashboard container-fluid">
                  <div class="dashboard-search">
                     <input type="search" id="searchInput" placeholder="Search..." style="width: 30%; border-radius: 20px;" class="p-2">
                  </div>
                  <div class="dashboard-table mt-3">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Case Number</th>
                              <th>Case Created</th>
                              <th>Case Type</th>
                              <th>Case Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <?php
                        if (isset($complaints['badac_all_complaints']) && count($complaints['badac_all_complaints']) > 0) {
                           foreach ($complaints['badac_all_complaints'] as $complaint) {
                              $case_number = $complaint['case_number'] ?? 'N/A';
                              $case_created = $complaint['case_created'] ?? 'N/A';
                              $case_type = $complaint['case_type'] ?? 'N/A';
                              $case_status = $complaint['case_status'] ?? 'N/A';

                              // Format the case_created date
                              $formatted_date = 'N/A';
                              if ($case_created != 'N/A') {
                                 try {
                                    // Create DateTime object with case_created
                                    $date = new DateTime($case_created, new DateTimeZone('UTC'));
                                    // Convert timezone to Asia/Taipei
                                    $date->setTimezone(new DateTimeZone('Asia/Taipei'));
                                    // Format the date in the desired format
                                    $formatted_date = $date->format('M j, Y \a\s \o\f g:i A');
                                 } catch (Exception $e) {
                                    // Handle potential errors with an error message or log
                                    $formatted_date = 'Invalid Date';
                                 }
                              }

                              // Encode complaint data as JSON
                              $complaint_json = htmlspecialchars(json_encode($complaint));
                        ?>
                              <tr>
                                 <td><?php echo htmlspecialchars($case_number); ?></td>
                                 <td><?php echo htmlspecialchars($formatted_date); ?></td>
                                 <td><?php echo htmlspecialchars($case_type); ?></td>
                                 <td><?php echo htmlspecialchars($case_status); ?></td>
                                 <td>
                                    <button class="btn btn-danger"
                                       data-bs-toggle="modal"
                                       data-bs-target="#viewDetailsModal"
                                       onclick="viewDetails('<?php echo $complaint_json; ?>')">
                                       View Details
                                    </button>
                                 </td>
                              </tr>
                        <?php
                           }
                        } else {
                           echo "<tr><td colspan='5'>No complaints available</td></tr>";
                        }
                        ?>
                        </tbody>
                     </table>

                  </div>
                  <div class="pagination-container container-fluid d-flex justify-content-between">
                     <label for="">Showing 1 to 5 of 5 entries </label>
                     <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                     </ul>
                  </div>
               </section>
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
               <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#ConfirmModal">Forward to DOH</button>
               <button type="button" class="btn btn-primary">Message</button>
            </div>
         </div>
      </div>
   </div>

   <!-- Forward to DOH -->
   <div class="modal fade" id="ConfirmModal" tabindex="-1" aria-labelledby="ConfirmModalLabel" aria-hidden="true"
      data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered here -->
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="signOutModalLabel">Forward Case to DOH</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               This action cannot be undone.
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" id="confirmBtn" data-bs-dismiss="modal">Proceed</button>
            </div>
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

   <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
   <script src="./javascript/sidebar.js" type="module"></script>
   <!-- <script src="./javascript/addCaseForm.js"></script> -->
   <script>
      function viewDetails(caseData) {
         // Parse the case data passed to the function
         const caseDetails = JSON.parse(caseData);

         // Populate modal fields
         document.getElementById("modal-case-number").textContent = caseDetails.case_number || "N/A";
         document.getElementById("modal-incident-date").textContent = caseDetails.case_created || "N/A";
         document.getElementById("modal-case-type").textContent = caseDetails.case_type || "N/A";
         document.getElementById("modal-case-status").textContent = caseDetails.case_status || "N/A";

         // Format complainants and respondents
         const complainants = caseDetails.case_complainants.map(complainant => complainant.name).join(", ") || "N/A";
         const respondents = caseDetails.case_respondents.map(respondent => respondent.name).join(", ") || "N/A";

         document.getElementById("modal-complainants").textContent = complainants;
         document.getElementById("modal-respondents").textContent = respondents;
         document.getElementById("modal-case-description").textContent = caseDetails.case_description || "N/A";
      }

      let selectedComplaint = null;

      function viewDetails(caseData) {
         // Parse the case data passed to the function
         const caseDetails = JSON.parse(caseData);

         // Populate modal fields
         document.getElementById("modal-case-number").textContent = caseDetails.case_number || "N/A";
         document.getElementById("modal-incident-date").textContent = caseDetails.case_created || "N/A";
         document.getElementById("modal-case-type").textContent = caseDetails.case_type || "N/A";
         document.getElementById("modal-case-status").textContent = caseDetails.case_status || "N/A";

         const complainants = caseDetails.case_complainants.map(complainant => complainant.name).join(", ") || "N/A";
         const respondents = caseDetails.case_respondents.map(respondent => respondent.name).join(", ") || "N/A";

         document.getElementById("modal-complainants").textContent = complainants;
         document.getElementById("modal-respondents").textContent = respondents;
         document.getElementById("modal-case-description").textContent = caseDetails.case_description || "N/A";

         // Store the currently selected complaint
         selectedComplaint = caseDetails;
      }

      function forwardToDOH() {
         if (!selectedComplaint) {
            alert("No case selected!");
            return;
         }

         // Retrieve existing forwarded cases from localStorage
         const forwardedCases = JSON.parse(localStorage.getItem("forwardedCases")) || [];

         // Add the selected complaint to the list
         forwardedCases.push({
            from: "BADAC Brgy. Sta Lucia", // Or dynamically fetch the current dashboard's source
            description: selectedComplaint.case_description || "No description",
            content: `data:text/plain;base64,${btoa(JSON.stringify(selectedComplaint))}`, // Optional: Encode as base64 for download
         });

         // Save back to localStorage
         localStorage.setItem("forwardedCases", JSON.stringify(forwardedCases));

         alert("Case forwarded to DOH!");
      }

      // Attach forwardToDOH to the confirmation button
      document.getElementById("confirmBtn").addEventListener("click", forwardToDOH);
   </script>
</body>

</html>