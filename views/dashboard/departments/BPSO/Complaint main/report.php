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
<style>
   #date {
      padding: 10px;
      width: 300px;
      height: 50px;
      border-radius: 3px;
      border: 1px solid #b1b1b1;
      font-weight: 300;
   }

   #tablecase {
      border: 1px solid #d4d4d4;
      text-align: center;
      margin-top: 24px;
   }

   th,
   td {
      vertical-align: middle;
   }
</style>

<body>
   <div id="app">
      <header class="header"></header>
      <div class="main-content">
         <div class="welcome-message">
            <h2>CREATE REPORT</h2>
         </div>
         <div style="padding: 20px; background-color: #ffffff; display: flex; flex-direction: column; align-items: flex-start;">
            <div style="display: flex; align-items: center; gap: 30px;">
               <input type="date" id="date" name="date" placeholder="Date..."
                  style="padding: 10px; width: 300px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; font-weight: 300; margin-right: 20px;">
               <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/generatereport.php" id="Updatebutton" class="btn btn-primary btn-hover"
                  style="font-weight: 500; width: 300px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; font-weight: 500; 
                  display: flex; justify-content: center; align-items: center; text-decoration: none; color: white; background-color: #007bff;">
                  Generate report
               </a>
            </div>
            <table id="tablecase" class="table table-bordered" style="border: 1px solid #d4d4d4; text-align: center;">
               <thead>
                  <tr>
                     <th scope="col" style="background-color: #004080; color: white;">Number</th>
                     <th scope="col" style="background-color: #004080; color: white;">Complainant</th>
                     <th scope="col" style="background-color: #004080; color: white;">Respondent</th>
                     <th scope="col" style="background-color: #004080; color: white;">Case Date</th>
                     <th scope="col" style="background-color: #004080; color: white;">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">1B11022376</th>
                     <td>Mark</td>
                     <td>Clarence</td>
                     <td>2024-10-24</td>
                     <td>
                        <button type="submit" id="Updatebutton" class="btn btn-primary btn-hover" style="font-weight: 500;">Update</button>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">1C11032376</th>
                     <td>Angelo</td>
                     <td>Clarence</td>
                     <td>2024-09-24</td>
                     <td>
                        <button type="submit" id="Updatebutton" class="btn btn-primary btn-hover" style="font-weight: 500;">Update</button>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">1B11022376</th>
                     <td>Garry</td>
                     <td>Garry</td>
                     <td>2024-05-24</td>
                     <td>
                        <button type="submit" id="Updatebutton" class="btn btn-primary btn-hover" style="font-weight: 500;">Update</button>
                     </td>
                  </tr>
               </tbody>
            </table>
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
   <script src="../sidebar.js" type="module"></script>
   <script src="dashboard.js"></script>
</body>

</html>