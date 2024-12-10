<?php
session_start();
require_once '../../../../vendor/autoload.php'; // Include Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../');
$dotenv->load();
$TREASURER_ENV = $_ENV['TREASURER_API_URL'];
function getTreasurerData($url){
$response = file_get_contents($url);
return json_decode($response, true);

}
$records = getTreasurerData($TREASURER_ENV);
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
             <form action="./treasurer.php" method = "POST" class="bg-light shadow rounded-3 p-3">
               <h2>Expense: </h2>
               <div class="form-group mt-3"> 
               <label for="department">Department: </label>
               <input type="text" id="department" name = "department" class="form-control" required>
               </div>
               
               <div class="form-group mt-3"> 
               <label for="id">Treasurer_id: </label>
               <input type="number" id="id" name = "id" class="form-control" required>
               </div>
               <div class="form-group mt-3"> 
               <label for="amount">Cost: </label>
               <input type="number" id="amount" name = "amount" class="form-control" required>
               </div>
               
               <div class="form-group mt-3"> 
               <label for="description">Description: </label>
               <textarea name="description" id="description" class="form-control" required></textarea>
               </div>
               <button type = "submit" id="btn" class = "btn btn-primary mt-3">Submit</button>
             </form>

             <table class="table mt-3">
   <thead>
      <tr>
         <th>Treasurer Id</th>
         <th>Department</th>
         <th>Amount</th>
         <th>Date</th>
         <th>description</th>
      </tr>
   </thead>
   <tbody class = "tBody">
    
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
</body>
<script>
   const container = document.querySelector('.tBody');
   const records = <?php echo json_encode($records); ?>;
   const record =records.records
   record.forEach(record =>{
      const tr = document.createElement('tr');
      tr.innerHTML = `
      <td>${record.treasurer_id}</td>
      <td>${record.department}</td>
      <td>${record.amount}</td>
      <td>${record.date_created}</td>
      <td>${record.description}</td>
      `;
      container.appendChild(tr);
   })
</script>

<script>
   let btn = document.getElementById('btn');
   btn.addEventListener('click', function(){
      alert("Submitted Successfully");
   })
</script>
</html>