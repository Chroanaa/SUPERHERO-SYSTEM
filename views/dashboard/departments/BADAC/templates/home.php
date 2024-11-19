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
</style>

<body>
   <div id="app">
      <header class="header"></header>
      <div class="main-content">

         <div class="container d-flex justify-content-end">
            <div class="breadcrumb">
               <span class="breadcrumb-item active">BADAC</span>
               <div class="breadcrumb-item">
                  <a href="Home">Home</a>
               </div>
            </div>
         </div>
         <div class="home-chart section d-flex justify-content-center align-items-center"
            style="flex-wrap: wrap; gap: 1rem;">
            <div class="card p-2 shadow" style="width: 400px; height: 200px;">
               <div class="total-cases card-body p-4 d-flex justify-content-evenly align-items-center">
                  <div class="card-label" style="color: #1E477D;">
                     <h2>299</h2>
                     <h4>Total Cases</h4>
                  </div>
                  <div class="card-label">
                     <img src="../../BADAC/templates/img/total-case.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="card p-2 shadow" style="width: 400px; height: 200px;">
               <div class="resolved-cases card-body p-4 d-flex justify-content-evenly align-items-center">
                  <div class="card-label" style="color: #1E477D;">
                     <h2>159</h2>
                     <h4>Resolved Cases</h4>
                  </div>
                  <div class="card-label">
                     <img src="../../BADAC/templates/img/resolved-case-bag.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="card p-2 shadow" style="width: 400px; height: 200px;">
               <div class="ongoing-cases card-body p-4 d-flex justify-content-evenly align-items-center">
                  <div class="card-label" style="color: #A9262E;">
                     <h2>150</h2>
                     <h4>Ongoing Cases</h4>
                  </div>
                  <div class="card-label">
                     <img src="../../BADAC/templates/img/ongoing-case-person.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="card p-2 shadow" style="width: 400px; height: 200px;">
               <div class="pending-cases card-body p-4 d-flex justify-content-evenly align-items-center">
                  <div class="card-label" style="color: #A9262E;">
                     <h2>53</h2>
                     <h4>Pending Cases</h4>
                  </div>
                  <div class="card-label">
                     <img src="../templates/img/pending-case-clock.png" alt="" class="img-fluid">
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

      </div>
      <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
         crossorigin="anonymous"></script>
      <script src="./javascript/sidebar.js" type="module"></script>
</body>

</html>