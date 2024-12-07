<!-- // STANDARD (DON'T MAKE ANY CHANGES) -->

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
    <link href="../../../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
    <style>
        .record-item {
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .record-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .record-item.selected {
            background-color: #007bff;
            color: white;
        }

        .record-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <header class="header">

        </header>

        <div class="main-content">
            <div class="welcome-message">
                <h2 class="text-danger">City Ordinances</h2>
            </div>

            <div class="city-ordinance-action d-flex justify-content-end align-items-center" style="gap: 5px">
              
            <div class="search">
                  <label for="">Search:</label>
                    <input type="text">          
                </div>
          

            <div class="city-ordinance-page shadow bg-light rounded-3 py-5 px-4 container-fluid">
                <div class="city-ordinance-header d-flex justify-content-end align-items-center">
                    <label for="ordinanceNumber">Select from what Council</label>
                    <select name="ordinanceNumber" id="ordinanceNumber">
                     <option value="" selected disabled><--- SELECT ---> </option>    
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="pre-war">pre-war</option>
                    </select>
                </div>
                <div class="city-ordinance-body row row-cols-sm-2">
                    
                   
                </div>

            </div>


    <!-- City Ordinance Details modal -->


           
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- <script src="../../../user_data.js"></script> -->
    <script src="../../../diff-sidebar.js" type="module"></script>
</body>
<script>
    const selectOrdinance =document.querySelector('#ordinanceNumber');
    const ordinanceBody = document.querySelector('.city-ordinance-body');
    selectOrdinance.addEventListener('change', (e) => {
        getOrdinanceData(e.target.value);
    });
    const getOrdinanceData = async (number) =>{
        
       try{
        const response = await fetch(`./get_ordinance_controller.php?number=${number}`);
        const data = await response.json();
         data.forEach(item => {
            ordinanceBody.innerHTML += `
            <div class="col p-2">
                        <div class="city-ordinance-card p-3 border">
                            <div class="city-ordinance-header d-flex justify-content-between align-items-center">
                                <p>Approved No: <a href =${item.href}>${item.link}</a> </h5>
                            </div>
                            <div class="city-ordinance-footer d-flex justify-content-between align-items-center">
                            <p>Title: ${item.title ?? "no title"} </p>
                                <p>Author: ${item.author ?? "no auhor"}</p>
                            
                            </div>
                        </div>
                    </div>
            `
         })
       
       }
         catch(error){
              console.log(error);
         }
    }
</script>
</html>