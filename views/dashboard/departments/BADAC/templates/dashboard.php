<?php
$apiUrl = "https://yjme796l3k.execute-api.ap-southeast-2.amazonaws.com/dev/api/v1/brgy/badac/complaint_records/";

// Initialize cURL to fetch data from the API
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL and fetch the response
$response = curl_exec($ch);

// Check if the request was successful
if ($response === false) {
   echo "Error fetching data from API.";
   exit;
}

// Decode the JSON response into an array
$data = json_decode($response, true);

// Close cURL session
curl_close($ch);
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
                        <tbody>

                           <!-- <tr>
                              <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">sdfg</td>
                              <td>dfg</td>
                              <td style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">dsfg</td>
                              <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">fdg</td>
                              <td>
                                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#caseModal">
                                    View Details
                                 </button>
                                 <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#caseModal">
                                    Forward
                                 </button>
                              </td>
                           </tr> -->


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

   <!-- Modal Structure -->
   <div class="modal fade" id="caseModal" tabindex="-1" role="dialog" aria-labelledby="caseModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="caseModalLabel">Case Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
               <!-- Case Number -->
               <div class="mb-3">
                  <h6 for="caseNumber" class="form-label">Case Number</h6>
                  <span id="caseNumber"></span>
               </div>

               <!-- Case Complainants -->
               <div class="mb-3">
                  <h6 for="complainants" class="form-label">Case Complainants</h6>
                  <span id="complainants"></span>
               </div>

               <!-- Case Respondents -->
               <div class="mb-3">
                  <h6 for="respondents" class="form-label">Case Respondents</h6>
                  <span id="respondents"></span>
               </div>

               <!-- PWUD Status -->
               <div class="mb-3">
                  <h6 for="pwud" class="form-label">Does the case fall under PWUD?</h6>
                  <span id="pwud"></span>
               </div>

               <!-- Case Description -->
               <div class="mb-3">
                  <h6 for="description" class="form-label">Case Description</h6>
                  <span id="description"></span>
               </div>

               <!-- Case Place of Incident -->
               <div class="mb-3">
                  <h6 for="place" class="form-label">Case of Incident</h6>
                  <span id="place"></span>
               </div>

               <!-- Incident Date & Time -->
               <div class="mb-3">
                  <h6 for="incidentDateTime" class="form-label">Incident Date & Time</h6>
                  <span id="incidentDateTime"></span>
               </div>

               <!-- Case Type -->
               <div class="mb-3">
                  <h6 for="caseType" class="form-label">Case Type</h6>
                  <span id="caseType"></span>
               </div>

               <!-- Case Status -->
               <div class="mb-3">
                  <h6 for="caseStatus" class="form-label">Case Status</h6>
                  <span id="caseStatus"></span>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary">Edit Status</button>
               <button type="button" class="btn btn-primary">Edit Case Type</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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

   <!--Edit Cases-->
   <!-- <div class="modal" id="editSection">
                  <div class="modal-dialog modal-fullscreen">
                     <div class="modal-content">
                        <div class="modal-header">
                           <div class="h4">
                              Edit Cases
                           </div>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <label for="">Case #</label>
                                    <input type="text" class="form-control" name="caseNumber">
                                 </td>
                                 <td>
                                    <label>People Who Used Drug
                                       (PWUD) </label>
                                    <input type="text" class="form-control" name="pwud">
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <label>Complainants</label>
                                    <input type="text" class="form-control" name="complainants">
                                 </td>
                                 <td>
                                    <label>Case Type</label> <br>
                                    <select name="caseType" id="editCaseType" style="width: 100%;" class="p-2">
                                       <option value="" disabled selected>Pick
                                          Case Type
                                       </option>
                                       <option value="Severe">
                                          Severe
                                       </option>
                                       <option value="Mild">
                                          Mild
                                       </option>
                                       <option value="Moderate">
                                          Moderate
                                       </option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <label>Respondent</label>
                                    <input type="text" class="form-control" name="respondent">
                                 </td>
                                 <td>
                                    <label>Case Status</label>
                                    <select name="caseStatus" id="editCaseStatus" style="width: 100%;" class="p-2">
                                       <option value="" disabled selected>Pick
                                          Case Status
                                       </option>
                                       <option value="Ongoing">
                                          Ongoing
                                       </option>
                                       <option value="Pending">
                                          Pending
                                       </option>
                                       <option value="Resolved">
                                          Resolved
                                       </option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <label>Description</label> <br>
                                    <textarea name="description" id="" style="width: 100%;" class="p-2"></textarea>
                                 </td>
                                 <td>
                                    <label for="">Date &
                                       Time</label>
                                    <input type="datetime-local" name="dateTime" id="" class="form-control">
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <label for="">Place</label>
                                    <input type="text" class="form-control" name="place">
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <button type="button" class="btn btn-success"
                                       style="background-color: #2D9276; color: white;">Save
                                       Changes</button>
                                    <button type="button" class="btn btn-danger"
                                       style="background-color: #A9262E; color: white;">Cancel</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
               </div> -->


   <!--End Edit Modal-->
   <!--Add Cases-->
   <!--
               <div class="modal" id="addSection">
                  <div class="modal-dialog modal-fullscreen">
                     <div class="modal-content">
                        <div class="modal-header">
                           <div class="h4">
                              Add Cases
                           </div>
                           <button type="button" 
                              class="btn-close" 
                              data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                           <form id="addCaseForm">
                              <table class="table table-borderless">
                                 <tr>
                                    <td>
                                       <label for="caseNumber">Case #</label>
                                       <input type="text" 
                                          id="caseNumber" 
                                          class="form-control" 
                                          required>
                                    </td>
                                    <td>
                                       <label>People Who Used Drug (PWUD) </label>
                                       <input type="text" 
                                          id="pwud" 
                                          class="form-control" 
                                          required>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <label>Complainants</label>
                                       <input type="text" id="complainants" class="form-control" required>
                                    </td>
                                    <td>
                                       <label>Case Type</label> <br>
                                       <select id="caseType" 
                                          style="width: 100%;"  
                                          class="p-2" 
                                          required>
                                          <option value="" disabled selected>Pick Case Type</option>
                                          <option value="Severe">Severe</option>
                                          <option value="Mild">Mild</option>
                                          <option value="Moderate">Moderate</option>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <label>Respondent</label>
                                       <input type="text" id="respondent" class="form-control" required>
                                    </td>
                                    <td>
                                       <label>Case Status</label>
                                       <select id="caseStatus" style="width: 100%;" class="p-2" required>
                                          <option value="" disabled selected>Pick Case Status</option>
                                          <option value="Ongoing">Ongoing</option>
                                          <option value="Pending">Pending</option>
                                          <option value="Resolved">Resolved</option>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <label>Description</label> <br>
                                       <textarea id="description" style="width: 100%;" class="p-2" required></textarea>
                                    </td>
                                    <td>
                                       <label for="dateTime">Date & Time</label>
                                       <input type="datetime-local" id="dateTime" class="form-control" required>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <label for="place">Place</label>
                                       <input type="text" id="place" class="form-control" required>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <button type="submit" 
                                          class="btn" 
                                          style="background-color: #2D9276; color: white;">Add to table</button>
                                       <button type="button" 
                                          class="btn" 
                                          style="background-color: #A9262E; color: white;" 
                                          data-bs-dismiss="modal">Cancel</button>
                                    </td>
                                 </tr>
                              </table>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
                -->
   <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
   <script src="./javascript/sidebar.js" type="module"></script>
   <!-- <script src="./javascript/addCaseForm.js"></script> -->
   <script>
      // Get all buttons with data-bs-toggle="modal"
      const viewDetailButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

      // For each button, add event listener to populate the modal
      viewDetailButtons.forEach(button => {
         button.addEventListener('click', function() {
            const caseNumber = this.getAttribute('data-case-number');
            const complainants = this.getAttribute('data-complainants');
            const respondents = this.getAttribute('data-respondents');
            // const pwud = this.getAttribute('data-pwud');
            const description = this.getAttribute('data-description');
            const place = this.getAttribute('data-place');
            const incidentTime = this.getAttribute('data-incident-time');
            const caseType = this.getAttribute('data-case-type');
            const caseStatus = this.getAttribute('data-case-status');

            // Populate modal fields
            document.getElementById('caseNumber').textContent = caseNumber;
            document.getElementById('complainants').textContent = complainants;
            document.getElementById('respondents').textContent = respondents;
            // document.getElementById('pwud').textContent = pwud;
            document.getElementById('description').textContent = description;
            document.getElementById('place').textContent = place;
            document.getElementById('incidentDateTime').textContent = incidentTime;
            document.getElementById('caseType').textContent = caseType;
            document.getElementById('caseStatus').textContent = caseStatus;
         });
      });
   </script>
</body>

</html>