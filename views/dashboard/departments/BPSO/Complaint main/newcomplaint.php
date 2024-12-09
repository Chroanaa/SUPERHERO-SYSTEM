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
   <style>
      #BADAC-assessment {
         display: none;
      }

      .pwud-question {
         display: none;
      }

      .adult-person {
         display: none;
      }

      #bcpc-form-container,
      #badac-form-container {
         display: none;
      }

      #respondent-both-btn {
         margin-top: 10px;
         font-size: 20px;
         background-color: #3437eb;
         color: #ffffff;
         border-radius: 50%;
         width: 30px;
         height: 30px;
         display: none;
         justify-content: center;
         align-items: center;
      }

      #complainant-both-btn {
         margin-top: 10px;
         font-size: 20px;
         background-color: #3437eb;
         color: #ffffff;
         border-radius: 50%;
         width: 30px;
         height: 30px;
         display: none;
         justify-content: center;
         align-items: center;
      }

      #hideGreen {
         margin-top: 10px;
         font-size: 20px;
         background-color: #009717;
         color: #ffffff;
         border-radius: 50%;
         width: 30px;
         height: 30px;
         display: inline-flex;
         justify-content: center;
         align-items: center;
      }

      #second_dropdown_category {
         display: none;
         width: 100%;
         height: 50px;
         font-size: 1rem;
         background-color: #ffffff;
         border: 1px solid #b1b1b1;
      }
   </style>
</head>

<body>
   <div id="app">
      <header class="header"></header>
      <div class="main-content">
         <div class="welcome-message">
            <h2>NEW COMPLAINT</h2>
         </div>

         <!-- New Complaint -->
         <div id="newcomplaintsection">

            <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">
               <form action="../../../../../controllers/departments/BPSO/complaint.php" method="POST" style="max-width: 1200px; margin: 0 auto;">
                  <input type="hidden" name="case_status" id="hiddenCaseStatus" value="Ongoing">
                  <!-- Complainant and Respondent Section -->
                  <div style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                     <div style="width: 45%;">
                        <label style="font-size: 20px; font-weight: 600;">Complainant 1</label>
                        <div id="complainant-container" style="display: flex; flex-direction: column; gap: 10px;">
                           <input type="text" name="complainant_name[]" placeholder="Name" class="form-control">
                           <input type="text" name="complainant_address[]" placeholder="Address" class="form-control">
                        </div>
                        <label style="font-size: 16px; font-weight: 600; margin-top: 10px;">Are you a resident in our barangay?</label>
                        <div style="display: flex; gap: 20px;">
                           <label>
                              <input type="radio" name="is_complainant_resident[]" value="yes" class="form-check-input">
                              Yes
                           </label>
                           <label>
                              <input type="radio" name="is_complainant_resident[]" value="no" class="form-check-input">
                              No
                           </label>
                        </div>
                        <!-- <button type="button" id="hideGreen" onclick="addComplainant()">+</button>
                        <button type="button" id="complainant-both-btn" onclick="bothCheckedAddComplainant()">+</button> -->
                     </div>
                     <div style="width: 45%;">
                        <label style="font-size: 20px; font-weight: 600;">Respondent 1</label>
                        <div id="respondent-container" style="display: flex; flex-direction: column; gap: 10px;">
                           <input type="text" name="respondent_name[]" placeholder="Name" class="form-control">
                           <input type="text" name="respondent_address[]" placeholder="Address" class="form-control">
                        </div>
                        <label style="font-size: 16px; font-weight: 600; margin-top: 10px;">Is this a resident in our barangay?</label>
                        <div style="display: flex; gap: 20px;">
                           <label>
                              <input type="radio" name="is_respondent_resident[]" value="yes" class="form-check-input">
                              Yes
                           </label>
                           <label>
                              <input type="radio" name="is_respondent_resident[]" value="no" class="form-check-input">
                              No
                           </label>
                           <label>
                              <input type="radio" name="is_respondent_resident[]" value="Unidentified" class="form-check-input">
                              Unidentified
                           </label>
                        </div>
                        <!-- <button type="button" id="hideGreen" onclick="addRespondent()">+</button>
                        <button type="button" id="respondent-both-btn" onclick="bothCheckedAddRespondent()">+</button> -->
                     </div>
                  </div>

                  <!-- Complaint Description -->
                  <div class="mb-3">
                     <label for="complaint-description" class="form-label">I-hayag ang iyong reklamo:</label>
                     <textarea class="form-control" id="complaint-description" name="case_description" rows="12" placeholder="Complainant statement starts here ..." readonly></textarea>
                  </div>

                  <!-- Evaluate Assessment based on the statement given by complainant -->
                  <div id="evaluate-button">
                     <button id="evaluateBtn" class="btn btn-danger w-100 mt-2" disabled>Identify Case</button>
                  </div>

                  <!-- Loading Spinner for Evaluate button -->
                  <!-- <div class="modal fade" id="loadingModalBtn" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px;">
                              <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                                 <span class="sr-only"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->

                  <div id="confirmatory" style="display: flex; flex-direction: column; margin-top: 24px;">
                     <!-- Add Case Type Label -->
                     <label for="caseType" class="mb-3">
                        Specify initial case (Kindly specify all applicable options)
                     </label>
                     <div id="case-options" class="d-flex flex-wrap">
                        <!-- Minor Involved -->
                        <div id="Checkbox1" class="mb-2 me-3">
                           <input type="checkbox" id="minorInvolved" name="initial_case[minorInvolved]" value="Minor Involved" style="margin-right: 2px;" disabled>
                           <label for="minorInvolved">Minor Involved</label>
                        </div>

                        <!-- Drug Involved -->
                        <div id="Checkbox2" class="mb-2 me-3">
                           <input type="checkbox" id="drugInvolved" name="initial_case[drugInvolved]" value="Drug Related" style="margin-right: 2px;" disabled>
                           <label for="drugInvolved">Drug Related</label>
                        </div>

                        <!-- Theft or Robbery -->
                        <div id="Checkbox3" class="mb-2 me-3">
                           <input type="checkbox" id="theftInvolved" name="initial_case[theftInvolved]" value="Theft / Robbery" style="margin-right: 2px;" disabled>
                           <label for="theftInvolved">Theft or Robbery</label>
                        </div>

                        <!-- Physical Violence -->
                        <div id="Checkbox4" class="mb-2 me-3">
                           <input type="checkbox" id="violenceInvolved" name="initial_case[violenceInvolved]" value="Violence" style="margin-right: 2px;" disabled>
                           <label for="violenceInvolved">Physical Violence</label>
                        </div>

                        <!-- Domestic Issues -->
                        <div id="Checkbox5" class="mb-2 me-3">
                           <input type="checkbox" id="domesticIssue" name="initial_case[domesticIssue]" value="Domestic" style="margin-right: 2px;" disabled>
                           <label for="domesticIssue">Domestic Issue</label>
                        </div>

                        <!-- Vandalism -->
                        <div id="Checkbox6" class="mb-2 me-3">
                           <input type="checkbox" id="vandalismInvolved" name="initial_case[vandalismInvolved]" value="Vandalism" style="margin-right: 2px;" disabled>
                           <label for="vandalismInvolved">Vandalism</label>
                        </div>

                        <!-- Fraud -->
                        <div id="Checkbox7" class="mb-2 me-3">
                           <input type="checkbox" id="fraudInvolved" name="initial_case[fraudInvolved]" value="Fraud" style="margin-right: 2px;" disabled>
                           <label for="fraudInvolved">Fraud</label>
                        </div>

                        <!-- Harassment -->
                        <div id="Checkbox8" class="mb-2 me-3">
                           <input type="checkbox" id="harassmentInvolved" name="initial_case[harassmentInvolved]" value="Harassment" style="margin-right: 2px;" disabled>
                           <label for="harassmentInvolved">Harassment</label>
                        </div>

                        <!-- Public Disturbance -->
                        <div id="Checkbox9" class="mb-2 me-3">
                           <input type="checkbox" id="publicDisturbance" name="initial_case[publicDisturbance]" value="Public Disturbance" style="margin-right: 2px;" disabled>
                           <label for="publicDisturbance">Public Disturbance</label>
                        </div>

                        <!-- Cyber Crime -->
                        <div id="Checkbox13" class="mb-2 me-3">
                           <input type="checkbox" id="cyberCrimeInvolved" name="initial_case[cyberCrimeInvolved]" value="Cyber Crime" style="margin-right: 2px;" disabled>
                           <label for="cyberCrimeInvolved">Cyber Crime</label>
                        </div>

                        <!-- Trespassing -->
                        <div id="Checkbox14" class="mb-2 me-3">
                           <input type="checkbox" id="trespassingInvolved" name="initial_case[trespassingInvolved]" value="Trespassing" style="margin-right: 2px;" disabled>
                           <label for="trespassingInvolved">Trespassing</label>
                        </div>

                        <!-- Illegal Parking -->
                        <div id="Checkbox15" class="mb-2 me-3">
                           <input type="checkbox" id="illegalParkingInvolved" name="initial_case[illegalParkingInvolved]" value="Illegal Parking" style="margin-right: 2px;" disabled>
                           <label for="illegalParkingInvolved">Illegal Parking</label>
                        </div>

                     </div>
                  </div>


                  <div id="caseTypeContainer">
                     <div id="caseTypeButton" style="display: flex; justify-content: flex-start; margin-top: 24px;">
                        <!-- <input type="hidden" name="case_type" id="hiddenCategory" value=""> -->
                        <button id="dropdowncategory" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;" disabled>
                           Case Type
                        </button>
                        <ul id="caseTypeDropdown" class="dropdown-menu">
                           <!-- This will be dynamically filled with case types -->
                        </ul>
                     </div>
                  </div>

                  <!-- Place of Incident and Date/Time -->
                  <div id="nested-container" class="mt-3">
                     <div id="nested-incident">
                        <label for="place-of-incident">Place of Incident:</label>
                        <input type="text" id="place-of-incident" name="place_of_incident" placeholder="Place of Incident..." style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                     </div>
                  </div>

                  <div id="nested-container" style="margin-bottom: 24px;">
                     <div id="nested-children" class="mb-3">
                        <label for="incidence-date">Incident Date:</label>
                        <input type="date" id="incidence-date" name="incidence_case_issued" style=" width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                     </div>
                     <div id="nested-children" class="mb-3">
                        <label for="incidence-time">Incident Time:</label>
                        <input type="time" id="incidence-time" name="incident_case_time" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                     </div>
                  </div>


                  <!-- This will shown if special case specified to BCPC from minor involved -->
                  <div id="badac-form-container">
                     <div id="header-label-badac">
                        <h2>Ano ang iyong ebidensiya?</h2>
                     </div>
                     <div id="badac-form">
                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <!-- <label for="drug-evidence" class="mb-2">Current Address</label> -->
                              <textarea id="drug-evidence" name="case_drug_related_description" placeholder="Pagdating sa usaping droga I-hayag ang detalye" style="width: 100%; height: 300px; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- This will shown if special case specified to BCPC from minor involved -->
                  <div id="bcpc-form-container">
                     <div id="header-label-bcpc">
                        <h2>Children's Information</h2>
                     </div>
                     <div id="bcpc-form">
                        <!-- Child Name -->
                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-name" class="mb-2">Child Name</label>
                              <input type="text" id="child-name" name="child_name[]" placeholder="Child Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>

                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-age" class="mb-2">Child Age (Numbers only)</label>
                              <input type="number" id="child-age" name="child_age[]" placeholder="Child Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>

                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-gender" class="mb-2">Gender</label>
                              <select id="child-gender" name="child_gender[]" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                                 <option value="" default>Please specify:</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                                 <option value="rather-not-say">Rather not say</option>
                              </select>
                           </div>
                        </div>

                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-age" class="mb-2">Current Address</label>
                              <input type="text" id="child-address" name="child_address[]" placeholder="Current address of children" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>
                     </div>
                     <!-- 
                     <div style="width: 100%; display: flex; align-items: center; justify-content: center; margin-top: 20px;">
                        <button id="add-children-btn" type="button" style="font-size: 20px; background-color: #009717; color: #ffffff; border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;">+</button>
                     </div> -->

                     <div id="header-label-bcpc" class="mt-3">
                        <span class="mb-2 d-block">Parents / Guardian</span>
                        <div id="Parent-name">
                           <input type="text" id="person-to-charge" name="person_in_charge" placeholder="Parent Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                        </div>
                     </div>

                  </div>

                  <!-- Confirm Button -->
                  <div class="d-flex justify-content-between mt-3">
                     <!-- Special Case Dropdown -->
                     <div id="special-case-things">
                        <input type="hidden" name="affiliated_dept_case" id="hiddenAffiliatedDeptCase" value="BPSO">
                        <input type="hidden" name="special_case" id="hiddenSpecialCase" value="">
                        <button id="specialcasedrop" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 400px; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;" disabled>
                           Affiliated Department
                        </button>
                        <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; width: 100%; max-width: 400px;">
                           <li type="button" onclick="updateButtonText('BADAC & BCPC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BADAC & BCPC</li>
                           <li type="button" onclick="updateButtonText('BCPC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BCPC</li>
                           <li type="button" onclick="updateButtonText('VAWC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">VAWC (under BCPC)</li>
                           <li type="button" onclick="updateButtonText('BADAC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BADAC</li>
                           <li type="button" onclick="updateButtonText('BPSO', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BPSO</li>
                        </ul>
                     </div>
                     <div>
                        <button type="submit" id="openModalButton" class="btn btn-primary" style="width: 300px; height: 60px; font-size: 1rem; font-weight: 600;" disabled>Confirm</button>
                     </div>
                  </div>
                  <!-- <div id="report-create" class="create">
                     <div class="create-content">
                        <span class="close-btn">&times;</span>
                        <input type="text" name="case_number" placeholder="Case Number..." style="position: absolute; width: 600px; height: 55px; top: 45%;  left: 21%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; padding: 10px;">
                        <button type="submit" id="submitbutton" class="btn btn-primary btn-hover" style="width: 300px; height: 60px; font-weight: 600; font-size: 20px;">Submit</button>
                     </div>
                  </div> -->
               </form>
            </div>
         </div>
      </div>

      <!-- Modal for Minor Involved -->
      <div id="minorInvolvedModal" class="modal" tabindex="-1" aria-labelledby="minorModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="minorModalLabel">Important Notice</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  This complaint involves a minor so this case should be forwarded to Barangay Council for the Protection of Children (BCPC).
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal for Drug Involved -->
      <div id="drugInvolvedModal" class="modal" tabindex="-1" aria-labelledby="drugModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="drugModalLabel">Important Notice</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  This complaint has drug related so this case should be forwarded to Barangay Anti-Drug Abuse Council (BADAC).
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal for VAWC  -->
      <div id="VAWCInvolvedModal" class="modal" tabindex="-1" aria-labelledby="VAWCModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="VAWCModalLabel">Important Notice</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  This complaint has sexual harassment related so this case should be forwarded to Violence Against Women and Children (under BCPC).
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Sign Out Confirmation Modal -->
      <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
   <script src="../sidebar.js" type="module"></script>
   <script src="./dashboard.js"></script>
   <script src="./evaluateData/evaluateBtn.js" type="module"></script>
   <script>

   </script>
   <!-- <script src="./ComplaintForm.js"></script> -->
   <!-- <script src="./MoreComplaints.js"></script> -->
</body>

</html>