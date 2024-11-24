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

      #bcpc-form-container {
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

         <!-- New Complaint-->
         <div id="newcomplaintsection">

            <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">
               <form action="../../../../../controllers/departments/BPSO/complaint.php" method="POST" style="max-width: 1200px; margin: 0 auto;">
                  
                  <input type="hidden" name="case_status" id="hiddenCaseStatus" value="Ongoing">

                  <!-- Complainant Section -->
                  <div style="display: flex; justify-content: flex-end; gap: 250px; margin-bottom: 30px;">
                     <div style="width: 400px;">
                        <label style="font-size: 20px; font-weight: 600;">Complainant 1</label>
                        <div id="complainant-container" style="display: flex; flex-direction: column; gap: 10px;">
                           <input type="text" name="complainant_name[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           <input type="text" name="complainant_address[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">

                           <!-- This is for BADAC things (need it for complainant don't uncomment) -->

                           <fieldset class="adult-person" style="border: 1px solid #d4d4d4; padding: 10px; border-radius: 5px;">
                              <legend style="font-size: 1rem;">Is this person an Adult?</legend>
                              <div style="display: flex; gap: 10px; align-items: center;">
                                 <input type="radio" name="complainant_adult[]" value="yes" style="width: 18px; height: 18px">
                                 <label for="yes">Yes</label>
                                 <input type="radio" name="complainant_adult[]" value="no" style="width: 18px; height: 18px;">
                                 <label for="no">No</label>
                              </div>
                           </fieldset>

                           <!-- This is for BCPC things -->

                           <!-- <label class="adult-person" style="font-size: 1rem;">
                              Is this person a Adult?
                              <div style="display: flex; gap: 10px; align-items: center;">
                                 <input type="radio" name="complainant_adult[]" value="yes"> Yes
                                 <input type="radio" name="complainant_adult[]" value="no"> No
                              </div>
                           </label> -->

                        </div>
                        <button type="button" id="hideGreen" onclick="addComplainant()">+</button>

                        <!-- This button is hidden but this is for two checkboxes -->
                        <button type="button" id="complainant-both-btn" onclick="bothCheckedAddComplainant()">+</button>
                     </div>
                     <!-- Respondent Section -->
                     <div style="width: 400px;">
                        <label style="font-size: 20px; font-weight: 600;">Respondent 1</label>
                        <div id="respondent-container" style="display: flex; flex-direction: column; gap: 10px;">
                           <input type="text" name="respondent_name[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           <input type="text" name="respondent_address[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">

                           <!-- This is for BADAC things -->

                           <label class="pwud-question" style="font-size: 1rem;">
                              Is this person a PWUD?
                              <div style="display: flex; gap: 10px; align-items: center;">
                                 <input type="radio" name="respondent_pwud[]" value="yes"> Yes
                                 <input type="radio" name="respondent_pwud[]" value="no"> No
                              </div>
                           </label>

                           <!-- This is for BCPC things -->

                           <label class="adult-person" style="font-size: 1rem;">
                              Is this person a Adult?
                              <div style="display: flex; gap: 10px; align-items: center;">
                                 <input type="radio" name="respondent_adult[]" value="yes"> Yes
                                 <input type="radio" name="respondent_adult[]" value="no"> No
                              </div>
                           </label>
                        </div>
                        <button type="button" id="hideGreen" onclick="addRespondent()">+</button>

                        <!-- This button is hidden but this is for two checkboxes -->
                        <button type="button" id="respondent-both-btn" onclick="bothCheckedAddRespondent()">+</button>
                     </div>
                  </div>

                  <div id="confirmatory" style="margin-top: 24px;">
                     <!-- Add Check if the Complaint does involve Minor -->
                     <label for="minorInvolved" class="mb-3">Fill out more details (Specify both if necessary)</label>
                     <div id="Checkbox1" class="mb-2">
                        <input type="checkbox" id="minorInvolved" style="margin-right: 10px;">
                        <!-- onclick="handleMinorInvolved(this); bothCheckedComplainant_Respondent();" -->
                        <label for="minorInvolved">Minor Involved</label>
                     </div>

                     <!-- Add Check if the Complaint does involve Drugs -->
                     <div id="Checkbox2">
                        <input type="checkbox" id="drugInvolved" style="margin-right: 10px;">
                        <!-- onclick="handleDrugInvolved(this); bothCheckedComplainant_Respondent();" -->
                        <label for="drugInvolved">Drug Involved</label>
                     </div>
                  </div>

                  <!-- Complaint Category Dropdown -->
                  <div style="display: flex; justify-content: flex-start; margin-top: 24px;">
                     <input type="hidden" name="case_type" id="hiddenCategory" value="">
                     <button id="dropdowncategory" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;">
                        Case Type
                     </button>
                     <ul class="dropdown-menu">
                        <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
                        <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
                     </ul>
                  </div>


                  <!-- Second Complaint Category Dropdown -->
                  <div style="display: flex; justify-content: flex-start; margin-top: 24px;">
                     <input type="hidden" name="second_complaint_category" id="SecondHiddenCategory" value="">
                     <button id="second_dropdown_category" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Case Type
                     </button>
                     <ul class="dropdown-menu">
                        <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
                        <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
                     </ul>
                  </div>

                  <!-- Place of Incident and Date/Time -->
                  <div id="nested-container" class="mt-3">
                     <div id="nested-incident">
                        <label for="place-of-incident">Place of Incident:</label>
                        <input type="text" id="place-of-incident" name="place_of_incident" placeholder="Place of Incident..." style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                     </div>
                  </div>

                  <div id="nested-container" style="margin-bottom: 24px;">
                     <div id="nested-children" class="mb-3">
                        <label for="incidence-date">Incident Date:</label>
                        <input type="date" id="incidence-date" name="incidence_date" style=" width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                     </div>
                     <div id="nested-children" class="mb-3">
                        <label for="incidence-time">Incident Time:</label>
                        <input type="time" id="incidence-time" name="incident_case_time" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                     </div>

                     <!-- Complaint Description -->
                     <div id="complaint-description">
                        <label for="complaint-description">Ilagay ang iyong reklamo:</label>
                        <textarea id="complaint-description" name="case_description" placeholder="Complaint description..." style="width: 100%; height: 300px; max-width: 1200px; border: 1px solid #b1b1b1; border-radius: 3px; padding: 15px; font-size: 1rem;"></textarea>
                     </div>
                  </div>
                  `
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
                              <input type="text" id="child-name" name="child_name" placeholder="Child Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>

                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-age" class="mb-2">Child Age (Numbers only)</label>
                              <input type="number" id="child-age" name="child_age" placeholder="Child Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>

                        <div id="nested-container" class="mt-3 mb-3">
                           <div id="nested-incident">
                              <label for="child-gender" class="mb-2">Gender</label>
                              <select id="child-gender" name="child_gender" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
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
                              <input type="text" id="child-age" name="child_age" placeholder="Current address of children" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                           </div>
                        </div>
                     </div>

                     <div style="width: 100%; display: flex; align-items: center; justify-content: center; margin-top: 20px;">
                        <button id="add-children-btn" type="button" style="font-size: 20px; background-color: #009717; color: #ffffff; border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;">+</button>
                     </div>

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
                        <button id="specialcasedrop" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 400px; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;">
                           Special Case Involved
                        </button>
                        <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; width: 100%; max-width: 400px;">
                           <li type="button" onclick="updateButtonText('BADAC & BCPC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BADAC & BCPC</li>
                           <li type="button" onclick="updateButtonText('BCPC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BCPC</li>
                           <li type="button" onclick="updateButtonText('BADAC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BADAC</li>
                           <li type="button" onclick="updateButtonText('None', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">None</li>
                        </ul>
                     </div>
                     <div>
                        <button type="submit" id="openModalButton" class="btn btn-primary" style="width: 300px; height: 60px; font-size: 1rem; font-weight: 600;">Confirm</button>
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
                  This complaint involves a minor so this case will be automatically forwarded to Barangay Council for the Protection of Children (BCPC).
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
                  This complaint has drug related so this case will be automatically forwarded to Barangay Anti-Drug Abuse Council (BADAC).
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
   <script src="dashboard.js"></script>
   <script src="./ComplaintForm.js"></script>
   <script src="./MoreComplaints.js"></script>
</body>

</html>