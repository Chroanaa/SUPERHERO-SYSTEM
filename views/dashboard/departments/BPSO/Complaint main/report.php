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
      width: 75%;
      max-width: 1500px;
      border: 1px solid #d4d4d4;
      text-align: center;
      margin-top: 110px;
      margin-left: 400px;
      }
      th, td {
      vertical-align: middle;
      }
   </style>
   <body>
      <div id="app">
         <nav class="sidebar" style="z-index: 1000;">
            <div class="sidebar-content">
               <div class="sidebar-header">Brgy. Sta. Lucia</div>
               <div class="sidebar-category">
                  <div class="sidebar-category-header">
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Dashboard/dashboard.php" class="category-link" style="text-decoration: none; color: inherit;">
                     <span><i class="fa-solid fa-desktop category-icon"></i>Home</span>
                     </a>
                  </div>
               </div>
               <div class="sidebar-category">
                  <div class="sidebar-category-header" onclick="toggleSubMenu()">
                     <span><i class="fas fa-shield-alt category-icon"></i>Brgy. Public Safety Officer</span>
                     <i class="fas fa-chevron-down toggle-icon"></i>
                  </div>
                  <div class="sidebar-submenu-show">
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/complaints.php" class="sidebar-submenu-item" onclick="showSection('complaintsection')">Complaints</a>
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/newcomplaint.php" class="sidebar-submenu-item" onclick="showSection('newcomplaintsection')">New Complaint</a>
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/report.php" class="sidebar-submenu-item" onclick="showSection('reportsection')">Create Report</a>
                  </div>
               </div>
               <div class="sidebar-category">
                  <div class="sidebar-category-header">
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Team%20Schedule/teamschedule.php" class="category-link" style="text-decoration: none; color: inherit;">
                     <span><i class="fa-solid fa-calendar category-icon"></i>Team Schedule</span>
                     </a>
                  </div>
               </div>
               <div class="sidebar-category">
                  <div class="sidebar-category-header">
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Vehicle%20Dispatchment/vehicle.php" class="category-link" style="text-decoration: none; color: inherit;">
                     <span><i class="fa-solid fa-truck category-icon"></i>Vehicle Dispatchment</span>
                     </a>
                  </div>
               </div>
               <div class="sidebar-category">
                  <div class="sidebar-category-header">
                     <a href="http://localhost:3000/views/dashboard/departments/BPSO/Notification/notification.php" class="category-link" style="text-decoration: none; color: inherit;">
                     <span><i class="fa-solid fa-bell category-icon"></i>Notification</span>
                     </a>
                  </div>
               </div>
               <!-- <div class="sidebar-category">
                  <div class="sidebar-category-header">
                      <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
                  </div>
                  </div> -->
               <div class="sidebar-category">
                  <div class="sidebar-category-header" data-bs-toggle="modal" data-bs-target="#signOutModal">
                     <span><i class="fa-solid fa-door-open category-icon"></i>Sign Out</span>
                  </div>
               </div>
            </div>
         </nav>
         <div style="position: relative; top: 0; left: 0; height: 104px; width: 100%; border: 1px solid #d4d4d4; background-color: #ffffff; display: flex; align-items: center; padding-left: 20%; ">
            <h1 style="font-size: 2rem; ">REPORT</h1>
         </div>
         <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff; display: flex; flex-direction: column; align-items: flex-start;">
            <div style="display: flex; align-items: center; margin-left: 400px; margin-top: 80px; gap: 30px;">
               <input type="date" id="date" name="date" placeholder="Date..." 
                  style="padding: 10px; width: 300px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; font-weight: 300; margin-right: 20px;">
               <a href="http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/generatereport.php" id="Updatebutton" class="btn btn-primary btn-hover" 
                  style="font-weight: 500; width: 300px; height: 50px; border-radius: 3px; border: 1px solid #b1b1b1; font-weight: 500; 
                  display: flex; justify-content: center; align-items: center; text-decoration: none; color: white; background-color: #007bff;">
               Generate report
               </a>
            </div>
            <table id="tablecase" class="table table-bordered" style=" width: 75%; max-width: 1500px; border: 1px solid #d4d4d4; text-align: center; margin-top: 110px; margin-left: 400px;">
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
      <script>
         const sidebar = document.querySelector('.sidebar-content');
         const ps = new PerfectScrollbar(sidebar);
         
         function toggleSubmenu(element) {
             const submenu = element.nextElementSibling;
             const allSubmenus = document.querySelectorAll('.sidebar-submenu');
             const allHeaders = document.querySelectorAll('.sidebar-category-header');
         
             allSubmenus.forEach(menu => {
                 if (menu !== submenu) {
                     menu.classList.remove('show');
                 }
             });
         
             allHeaders.forEach(header => {
                 if (header !== element) {
                     header.classList.remove('active');
                 }
             });
         
             submenu.classList.toggle('show');
             element.classList.toggle('active');
             ps.update();
         }
         
         function createRipple(event) {
             const button = event.currentTarget;
             const ripple = document.createElement('span');
             const rect = button.getBoundingClientRect();
             const size = Math.max(rect.width, rect.height);
             const x = event.clientX - rect.left - size / 2;
             const y = event.clientY - rect.top - size / 2;
         
             ripple.style.width = ripple.style.height = `${size}px`;
             ripple.style.left = `${x}px`;
             ripple.style.top = `${y}px`;
             ripple.classList.add('ripple');
         
             button.appendChild(ripple);
         
             ripple.addEventListener('animationend', () => {
                 ripple.remove();
             });
         }
         
         document.querySelectorAll('.sidebar-submenu-item').forEach(item => {
             item.addEventListener('mouseenter', createRipple);
         });
         
             document.getElementById('confirmSignOutBtn').addEventListener('click', function () {
         // Redirect to signout.php to handle session destruction and redirection
         window.location.href = '../../../../../signout.php';
         });
         
         
         
         
         document.getElementById("date").addEventListener("change", filterTableByDate);
         
         function filterTableByDate() {
         var filterDate = document.getElementById("date").value; // Get the selected date in YYYY-MM-DD format
         var table = document.getElementById("tablecase");
         var rows = table.querySelectorAll("tbody tr");
         
         rows.forEach(row => {
         var caseDateCell = row.cells[3]; // Target the date cell in the 4th column
         if (caseDateCell) {
             var caseDate = caseDateCell.textContent.trim();
             // Check if date formats match
             row.style.display = (filterDate === "" || caseDate === filterDate) ? "" : "none";
         }
         });
         }
         
         
      </script>
      <script src="dashboard.js"></script>
   </body>
</html>