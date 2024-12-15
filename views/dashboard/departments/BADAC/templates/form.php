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

   .invisible {
      display: none !important;
   }

   .small-font {
      font-size: 0.88em;
      /* Adjust this value as needed */
   }

   .form label,
   .form input[type="text"],
   .form input[type="number"],
   .form input[type="date"],
   .form input[type="radio"],
   .form input[type="checkbox"],
   .form textarea {
      margin-bottom: 10px;
      /* Adjust this value as needed */
   }
</style>

<body>
   <div id="app">
      <div class="main-content">
         <header class="header"></header>

         <div class="main-container container-fluid" style="height: 100vh; overflow: scroll;">
            <div class="container-fluid d-flex justify-content-end">
               <div class="breadcrumb">
                  <span class="breadcrumb-item active">BADAC</span>
                  <div class="breadcrumb-item">
                     <a href="Home">Form</a>
                  </div>
               </div>
            </div>
            <div class="form section border" style="background-color: white;">

               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a href="#waiverForAdult"
                        data-bs-toggle="tab"
                        class="nav-link active">Waiver for adult</a>
                  </li>
                  <li class="nav-item">
                     <a href="#waiverForMinor"
                        data-bs-toggle="tab"
                        class="nav-link">Waiver for minor</a>
                  </li>
                  <li class="nav-item">
                     <a href="#assistingTool"
                        data-bs-toggle="tab"
                        class="nav-link">Assisting tool</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="container tab-pane active p-5       " id="waiverForAdult">
                     <div id="waiverForAdultForm">
                        <h2>Drug Test Consent Waiver for Adult</h2>
                        <div class="mb-3">
                           <label>Name:</label>
                           <span contenteditable="true">[Enter Name]</span>
                        </div>
                        <div class="mb-3">
                           <label>Address:</label>
                           <span contenteditable="true">[Enter Address]</span>
                        </div>
                        <div class="mb-3">
                           <label>City, State, ZIP Code:</label>
                           <span contenteditable="true">[Enter City, State, ZIP Code]</span>
                        </div>
                        <div class="mb-3">
                           <label>Email Address:</label>
                           <span contenteditable="true">[Enter Email Address]</span>
                        </div>
                        <div class="mb-3">
                           <label>Phone Number:</label>
                           <span contenteditable="true">[Enter Phone Number]</span>
                        </div>
                        <div class="mb-3">
                           <label>Date:</label>
                           <span contenteditable="true">[Enter Date]</span>
                        </div>
                        <p>Barangay Sta. Lucia<br>
                           Barangay Drug Abuse Council<br>
                           [P334+W7Q, Engineer St, Quezon City, 1117 Metro Manila
                           <br>
                        </p>
                        <h4>Subject: Drug Test Consent Waiver</h4>
                        <p>I, the undersigned, hereby consent to undergo a drug test as part of the investigation concerning suspected drug use related to [specific individual or situation] in Barangay Sta. Lucia.</p>
                        <p>I acknowledge the following:</p>
                        <ul>
                           <li>Purpose of Testing: The drug test is conducted to ensure community safety and compliance with barangay policies.</li>
                           <li>Confidentiality: I understand that the results of the drug test will be kept confidential and shared only with authorized personnel involved in the investigation.</li>
                           <li>Voluntary Participation: My participation in this drug testing process is voluntary; however, I recognize that refusal may impact the investigation.</li>
                           <li>Testing Procedures: I consent to the collection and testing of my specimen (urine, saliva, etc.) by authorized personnel, in accordance with applicable laws and regulations.</li>
                           <li>Release of Liability: I release the Barangay Drug Abuse Council and its representatives from any liability resulting from the testing process or the disclosure of test results.</li>
                           <li>Right to Review Results: I have the right to review the results of the test and, if necessary, contest any findings I believe to be incorrect.</li>
                        </ul>
                        <p>By signing below, I acknowledge that I have read and understood this consent waiver and agree to participate in the drug testing program.</p>
                        <p>Signature: ___________________________________<br>
                           Printed Name: ___________________________________________<br>
                           Date: ____________________________________________________
                        </p>
                        <button type="button" style="background-color: #2D9276; color: white;" class="btn mt-3 no-print" onclick="saveWaiverAdultAsPDF()">Save as PDF</button>
                     </div>
                  </div>
                  <div class="container tab-pane fade p-5" id="waiverForMinor">
                     <div id="waiverForMinorForm">
                        <h2>Drug Test Consent Waiver for Minor</h2>
                        <div class="mb-3">
                           <label>Parent/Guardian Name:</label>
                           <span contenteditable="true">[Parent/Guardian Name]</span>
                        </div>
                        <div class="mb-3">
                           <label>Parent/Guardian Address:</label>
                           <span contenteditable="true">[Parent/Guardian Address]</span>
                        </div>
                        <div class="mb-3">
                           <label>City, State, ZIP Code:</label>
                           <span contenteditable="true">[City, State, ZIP Code]</span>
                        </div>
                        <div class="mb-3">
                           <label>Email Address:</label>
                           <span contenteditable="true">[Email Address]</span>
                        </div>
                        <div class="mb-3">
                           <label>Phone Number:</label>
                           <span contenteditable="true">[Phone Number]</span>
                        </div>
                        <div class="mb-3">
                           <label>Date:</label>
                           <span contenteditable="true">[Date]</span>
                        </div>
                        <p>Barangay Sta. Lucia<br>
                           Barangay Drug Abuse Council<br>
                           P334+W7Q, Engineer St, Quezon City, 1117 Metro Manila
                        </p>
                        <h4>Subject: Drug Test Consent Waiver for Minor</h4>
                        <p>I, the undersigned, am the parent/legal guardian of [Minor's Name], who is [Minor's Age] years old. I hereby give my consent for my child to undergo a drug test as part of the investigation concerning suspected drug use related to [specific individual or situation] in Barangay Sta. Lucia.</p>
                        <p>I acknowledge the following:</p>
                        <ul>
                           <li>Purpose of Testing: The drug test is conducted to ensure community safety and compliance with barangay policies.</li>
                           <li>Confidentiality: I understand that the results of the drug test will be kept confidential and shared only with authorized personnel involved in the investigation.</li>
                           <li>Voluntary Participation: My child's participation in this drug testing process is voluntary; however, I recognize that refusal may impact the investigation.</li>
                           <li>Testing Procedures: I consent to the collection and testing of my child's specimen (urine, saliva, etc.) by authorized personnel, in accordance with applicable laws and regulations.</li>
                           <li>Release of Liability: I release the Barangay Drug Abuse Council and its representatives from any liability resulting from the testing process or the disclosure of test results.</li>
                           <li>Right to Review Results: I understand that I have the right to review the results of the test and, if necessary, contest any findings I believe to be incorrect.</li>
                        </ul>
                        <p>By signing below, I acknowledge that I have read and understood this consent waiver and agree to the terms outlined above.</p>
                        <p>Parent/Guardian Signature: ___________________________________<br>
                           Printed Name: ___________________________________________<br>
                           Date: ____________________________________________________<br>
                           Minor's Name: __________________________________________<br>
                           <button type="button" style="background-color: #2D9276; color: white;" class="btn mt-3 no-print" onclick="saveWaiverAsPDF()">Save as PDF</button>
                     </div>
                  </div>
                  <div class="container tab-pane fade p-5" id="assistingTool">
                     <div id="assistingToolForm">
                        <h2>Assisting Tool Screening Form</h2>
                        <p>Instructions: This form is designed to assess possible behavioral changes or substance use concerns. Please answer each section honestly. All information will remain confidential and only be shared with authorized personnel.</p>
                        <h3>Section 1: Personal Information</h3>
                        <label>Full Name:</label>
                        <span contenteditable="true">[Full Name]</span> <br>
                        <label>Age:</label>
                        <span contenteditable="true">[Age]</span> <br>
                        <label>Gender:</label>
                        <span contenteditable="true">[Gender]</span> <br>
                        <label>Date of Screening:</label>
                        <span contenteditable="true">[Date of Screening]</span> <br>
                        <label>Name of Screener (if applicable):</label>
                        <span contenteditable="true">[Name of Screener]</span> <br>
                        <h3>Section 2: Behavioral Screening Questions</h3>
                        <p>Have you noticed any recent mood swings?</p>
                        <input type="radio" id="moodSwingsYes" name="moodSwings" value="Yes">
                        <label for="moodSwingsYes">Yes</label>
                        <input type="radio" id="moodSwingsNo" name="moodSwings" value="No">
                        <label for="moodSwingsNo">No</label>
                        <p>Do you feel the need to use any substance to relax or cope?</p>
                        <input type="radio" id="substanceUseYes" name="substanceUse" value="Yes">
                        <label for="substanceUseYes">Yes</label>
                        <input type="radio" id="substanceUseNo" name="substanceUse" value="No">
                        <label for="substanceUseNo">No</label>
                        <p>Have you experienced any significant changes in your sleeping or eating habits?</p>
                        <input type="radio" id="sleepingEatingChangesYes" name="sleepingEatingChanges" value="Yes">
                        <label for="sleepingEatingChangesYes">Yes</label>
                        <input type="radio" id="sleepingEatingChangesNo" name="sleepingEatingChanges" value="No">
                        <label for="sleepingEatingChangesNo">No</label>
                        <p>Do you feel guilty or embarrassed about something you’re currently doing?</p>
                        <input type="radio" id="guiltyEmbarrassedYes" name="guiltyEmbarrassed" value="Yes">
                        <label for="guiltyEmbarrassedYes">Yes</label>
                        <input type="radio" id="guiltyEmbarrassedNo" name="guiltyEmbarrassed" value="No">
                        <label for="guiltyEmbarrassedNo">No</label>
                        <p>Have family or friends expressed concern about your behavior recently?</p>
                        <input type="radio" id="concernedBehaviorYes" name="concernedBehavior" value="Yes">
                        <label for="concernedBehaviorYes">Yes</label>
                        <input type="radio" id="concernedBehaviorNo" name="concernedBehavior" value="No">
                        <label for="concernedBehaviorNo">No</label>
                        <h3>Section 3: Drug Use Indicators</h3>
                        <p>Select all that apply (these questions are based on self-reported observations or perceptions from peers/family members):</p>
                        <p>Physical Indicators</p>
                        <input type="checkbox" id="bloodshotEyes" name="physicalIndicators" value="Bloodshot eyes">
                        <label for="bloodshotEyes">Bloodshot eyes</label>
                        <input type="checkbox" id="tremorsShaking" name="physicalIndicators" value="Tremors or shaking">
                        <label for="tremorsShaking">Tremors or shaking</label>
                        <input type="checkbox" id="suddenWeightChanges" name="physicalIndicators" value="Sudden weight changes">
                        <label for="suddenWeightChanges">Sudden weight changes</label>
                        <input type="checkbox" id="poorHygiene" name="physicalIndicators" value="Poor personal hygiene">
                        <label for="poorHygiene">Poor personal hygiene</label> <br><br>
                        <p>Behavioral Changes</p>
                        <input type="checkbox" id="increasedSecrecy" name="behavioralChanges" value="Increased secrecy or isolation">
                        <label for="increasedSecrecy">Increased secrecy or isolation</label>
                        <input type="checkbox" id="frequentAbsenteeism" name="behavioralChanges" value="Frequent absenteeism (school/work)">
                        <label for="frequentAbsenteeism">Frequent absenteeism (school/work)</label>
                        <input type="checkbox" id="declinePerformance" name="behavioralChanges" value="Decline in academic or job performance">
                        <label for="declinePerformance">Decline in academic or job performance</label>
                        <input type="checkbox" id="irritabilityMoodSwings" name="behavioralChanges" value="Irritability or mood swings">
                        <label for="irritabilityMoodSwings">Irritability or mood swings</label>
                        <h3>Section 4: Substance Use History</h3>
                        <p>Please indicate any substances you have used in the past 30 days (Check all that apply)</p>
                        <input type="checkbox" id="alcohol" name="substancesUsed" value="Alcohol">
                        <label for="alcohol">Alcohol</label>
                        <input type="checkbox" id="tobaccoNicotine" name="substancesUsed" value="Tobacco/Nicotine">
                        <label for="tobaccoNicotine">Tobacco/Nicotine</label>
                        <input type="checkbox" id="marijuana" name="substancesUsed" value="Marijuana">
                        <label for="marijuana">Marijuana</label>
                        <input type="checkbox" id="prescriptionDrugs" name="substancesUsed" value="Prescription Drugs (misused)">
                        <label for="prescriptionDrugs">Prescription Drugs (misused)</label>
                        <input type="checkbox" id="stimulants" name="substancesUsed" value="Stimulants (e.g., cocaine, methamphetamine)">
                        <label for="stimulants">Stimulants (e.g., cocaine, methamphetamine)</label> <br>
                        <input type="checkbox" id="opioids" name="substancesUsed" value="Opioids (e.g., heroin, prescription opioids)">
                        <label for="opioids">Opioids (e.g., heroin, prescription opioids)</label>
                        <input type="checkbox" id="otherSubstances" name="substancesUsed" value="Other">
                        <label for="otherSubstances">Other: <span contenteditable="true">[Other]</span></label>
                        <h3>Section 5: Observational Notes (For Use by Screener)</h3>
                        <label>Behavioral Observations:</label>
                        <span contenteditable="true">[Behavioral Observations]</span> <br>
                        <label>Physical Indicators Noted:</label>
                        <span contenteditable="true">[Physical Indicators Noted]</span> <br>
                        <label>Reported Symptoms:</label>
                        <span contenteditable="true">[Reported Symptoms]</span> <br>
                        <h3>Section 6: Initial Assessment and Recommendations</h3>
                        <p>Based on responses, is further assessment recommended?</p>
                        <input type="radio" id="furtherAssessmentYes" name="furtherAssessment" value="Yes">
                        <label for="furtherAssessmentYes">Yes</label>
                        <input type="radio" id="furtherAssessmentNo" name="furtherAssessment" value="No">
                        <label for="furtherAssessmentNo">No</label>
                        <p>Recommended Next Steps</p>
                        <input type="checkbox" id="referralCounselor" name="nextSteps" value="Referral to counselor/psychologist">
                        <label for="referralCounselor">Referral to counselor/psychologist</label>
                        <input type="checkbox" id="familyConsultation" name="nextSteps" value="Suggest family consultation">
                        <label for="familyConsultation">Suggest family consultation</label>
                        <input type="checkbox" id="followUpAssessment" name="nextSteps" value="Schedule follow-up assessment">
                        <label for="followUpAssessment">Schedule follow-up assessment</label>
                        <input type="checkbox" id="noFurtherAction" name="nextSteps" value="No further action at this time">
                        <label for="noFurtherAction">No further action at this time</label>
                        <br>
                        <button type="button" style="background-color: #2D9276; color: white;" class="btn mt-3 no-print" onclick="saveAsPDF()">Save as PDF</button>
                     </div>
                  </div>
               </div>
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

   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
   <script src="./javascript/sidebar.js" type="module"></script>
   <script>
      function saveAsPDF() {
         const element = document.getElementById('assistingToolForm');
         const button = element.querySelector('.btn.no-print');

         // Temporarily hide the button and reduce font size
         button.style.display = 'none';
         element.classList.add('small-font');

         // Generate the PDF
         html2pdf(element, {
            margin: [0.5, 0.5, 1, 0.5], // top, left, bottom, right
            filename: 'Assisting_Tool_Screening_Form.pdf',
            html2canvas: {
               scale: 2
            },
            jsPDF: {
               unit: 'in',
               format: 'letter',
               orientation: 'portrait'
            }
         }).then(() => {
            // Restore button visibility and font size
            button.style.display = 'block';
            element.classList.remove('small-font');
         });
      }

      function saveWaiverAsPDF() {
         const element = document.getElementById('waiverForMinorForm');
         const button = element.querySelector('.btn.no-print');

         // Temporarily hide the button and reduce font size
         button.style.display = 'none';
         element.classList.add('small-font');

         // Generate the PDF
         html2pdf(element, {
            margin: [0.5, 0.5, 1, 0.5], // top, left, bottom, right
            filename: 'Drug_Test_Consent_Waiver_for_Minor.pdf',
            html2canvas: {
               scale: 2
            },
            jsPDF: {
               unit: 'in',
               format: 'letter',
               orientation: 'portrait'
            }
         }).then(() => {
            // Restore button visibility and font size
            button.style.display = 'block';
            element.classList.remove('small-font');
         });
      }

      function saveWaiverAdultAsPDF() {
         const element = document.getElementById('waiverForAdultForm');
         const button = element.querySelector('.btn.no-print');

         // Temporarily hide the button and reduce font size
         button.style.display = 'none';
         element.classList.add('small-font');

         // Generate the PDF
         html2pdf(element, {
            margin: [0.5, 0.5, 1, 0.5], // top, left, bottom, right
            filename: 'Drug_Test_Consent_Waiver_for_Adult.pdf',
            html2canvas: {
               scale: 2
            },
            jsPDF: {
               unit: 'in',
               format: 'letter',
               orientation: 'portrait'
            }
         }).then(() => {
            // Restore button visibility and font size
            button.style.display = 'block';
            element.classList.remove('small-font');
         });
      }
   </script>
</body>

</html>