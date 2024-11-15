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
   </head>
   <body>
      <div id="app">
         <div style="position: relative; top: 0; left: 0; height: 104px; width: 100%; border: 1px solid #d4d4d4; background-color: #ffffff; display: flex; align-items: center; padding-left: 20%; ">
            <h1 style="font-size: 2rem;">GENERATE REPORT</h1>
         </div>
         <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%;">

               <div style="width: 100%; margin-left: 240px;">
                  <textarea id="generatedescription" name="complaint_description" placeholder="Report description..." 
                     style="width: 50rem; height: 50vh; border: 1px solid #b1b1b1; border-radius: 3px; padding: 15px; font-size: 1rem;">
                  </textarea>
               </div>

            <div style="margin-left: 240px; margin-top: 5px; display: flex; gap: 30px;">
               <button id="printButton" 
                  style="font-weight: 500; width: 200px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; 
                  display: flex; justify-content: center; align-items: center; text-decoration: none; 
                  color: white; background-color: #007bff;">
               PRINT
               </button>
               <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/report.php" id="backbutton" class="btn btn-primary btn-hover" 
                  style="font-weight: 500; width: 200px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; 
                  display: flex; justify-content: center; align-items: center; text-decoration: none; color: white; background-color: #007bff;">
               BACK
               </a>
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
      </div>
      <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
         crossorigin="anonymous"></script>
      <script src="../Complaint main/dashboard.js"></script>
      <script src="../sidebar.js" type="module"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
   </body>
</html>