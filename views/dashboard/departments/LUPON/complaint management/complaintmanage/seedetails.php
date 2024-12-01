<?php
include 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';
if (isset($_GET['case_number'])) { $case_number = $_GET['case_number']; $sql = "SELECT * FROM turnover WHERE case_number = :case_number"; 
$stmt = $pdo->prepare($sql); $stmt->bindParam(':case_number', $case_number, PDO::PARAM_STR); $stmt->execute(); $case_details = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$case_details) { echo "No case."; exit;}} else { echo "No casenumber.";exit;}
?>

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
    <link href="../../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as LUPON for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as LUPON for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <nav class="sidebar" style="z-index: 1000;">
            <div class="sidebar-content">
                <div class="sidebar-header">Brgy. Sta. Lucia</div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <a href="http://localhost:3000/views/dashboard/departments/LUPON/dashboard/dashboard.php" class="sidebar-link" style="text-decoration: none; color: inherit;">
                        <span><i class="fa-solid fa-desktop category-icon"></i>Dashboard</span>
                    </a>
                    </div>
                </div>


                <div class="sidebar-category">
                    <div class="sidebar-category-header" onclick="toggleSubMenu()">
                        <span><i class="fa-solid fa-folder category-icon"></i>Complaint Management</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu-show">
                    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/complaint.php" class="sidebar-link">
                        <div class="sidebar-submenu-item">Complaints</div>
                    </a> 
                    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/issuecfa.php" class="sidebar-link">
                        <div class="sidebar-submenu-item">Issue CFA</div>
                   </a>
                   <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php" class="sidebar-link">
                        <div class="sidebar-submenu-item">Schedule Hearing</div>
                   </a>
                   <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/pendingcase.php" class="sidebar-link">
                        <div class="sidebar-submenu-item">Pending Cases</div>
                   </a>
                    </div>
                </div>

                <div class="sidebar-category">
    <div class="sidebar-category-header">
        <a href="http://localhost/SUPERHERO-SYSTEM/views/dashboard/departments/LUPON/notification/notification.php" class="sidebar-link">
            <span>
                <i class="fa-solid fa-bell category-icon"></i> Notification
                <?php
                $unreadCountStmt = $pdo->prepare("SELECT COUNT(*) FROM lupon_notification WHERE is_read = 0");
                $unreadCountStmt->execute();
                $unreadCount = $unreadCountStmt->fetchColumn();
                if ($unreadCount > 0) {
                    echo '<span class="badge">' . $unreadCount . '</span>';
                }
                ?>
            </span>
        </a>
    </div>
</div>
                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header" data-bs-toggle="modal" data-bs-target="#signOutModal">
                        <span><i class="fa-solid fa-door-open category-icon"></i>Sign Out</span>
                    </div>
                </div>
            </div>
        </nav>



 <!-- Dashboard Side -->
 <nav style="width: 77%; margin-top: 10px; border-radius: 7px; margin-left: 21%; height: 104px; border: 1px solid #d4d4d4; background-color: #ffffff; position: relative; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 2rem; position: absolute; left: 3%; top: 25px;">
    COMPLAINTS DETAILS
    </h1>  
</nav>


<!-- Wag gagalawin -->
<!-- Dashboard body -->
 <!-- Dashboard body -->
  <!-- Dashboard body -->
  <nav style="margin-top: 30px; margin-left: 21%; padding: 20px; min-height: 10vh; width: 77%; box-sizing: border-box; background-color: #ffffff; border-radius: 10px; overflow: hidden;">
    
 <div style="margin-top: 13px; padding: 20px; min-height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">
 <nav style="max-width: 1200px; margin: 0 auto;">
    <!-- Complainant Section -->
    <div style="display: flex; justify-content: center; gap: 320px; margin-bottom: 30px;">
        <div style="width: 400px;">
            <label style="font-size: 20px; font-weight: 600;">Complainant 1</label>
            <div id="complainant-container" style="display: flex; flex-direction: column; gap: 10px;">
                <input type="text" name="complainant_name" value="<?php echo htmlspecialchars($case_details['complainant_name']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                <input type="text" name="complainant_address" value="<?php echo htmlspecialchars($case_details['complainant_address']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
            </div>
        </div>
    
        <!-- Respondent Section -->
        <div style="width: 400px;">
            <label style="font-size: 20px; font-weight: 600;">Respondent 1</label>
            <div id="respondent-container" style="display: flex; flex-direction: column; gap: 10px;">
                <input type="text" name="respondent_name" value="<?php echo htmlspecialchars($case_details['respondent_name']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                <input type="text" name="respondent_address" value="<?php echo htmlspecialchars($case_details['respondent_address']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
            </div>
        </div>
    </div>
    
    <!-- Complaint Category -->
    <div style="margin-top: 30px; margin-left: 3%;">
        <label style="font-size: 20px; font-weight: 600;">Complaint Category</label>
        <input type="text" name="complaint_category" value="<?php echo htmlspecialchars($case_details['complaint_category']); ?>" style="width: 97%; padding: 15px; font-size: 1rem; height: 50px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;"disabled>
    </div>
    
    <!-- Complaint Description -->
    <div style="margin-top: 30px; margin-left: 3%;">
        <label style="font-size: 20px; font-weight: 600;">Complaint Description</label>
        <textarea id="complaint-description" name="complaint_description" style="width: 97%; height: 300px; max-width: 1200px; border: 1px solid #b1b1b1; border-radius: 3px; padding: 15px; font-size: 1rem;" disabled><?php echo htmlspecialchars($case_details['complaint_description']); ?></textarea>
    </div>

    <!-- Place of Incident and Date at Time -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; margin-left: 3%;">
        <div style="flex: 1; min-width: 280px; max-width: 361px;">
            <label for="place-of-incident">Place of Incident:</label>
            <input type="text" id="place-of-incident" name="place_of_incident" value="<?php echo htmlspecialchars($case_details['place_of_incident']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
        </div>
        <div style="flex: 1; min-width: 280px; max-width: 361px;">
            <label for="incident-date">Incident Date:</label>
            <input type="date" id="incident-date" name="incident_date" value="<?php echo htmlspecialchars($case_details['date_of_incident']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
        </div>
        <div style="flex: 1; min-width: 280px; max-width: 361px;">
            <label for="incident-time">Incident Time:</label>
            <input type="time" id="incident-time" name="incident_time" value="<?php echo htmlspecialchars($case_details['time_of_incident']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
        </div>
    </div>

    <!-- Special Case Status -->
    <div style="margin-top: 30px; margin-left: 3%;">
        <label style="font-size: 20px; font-weight: 600;">Special Case</label>
        <input type="text" name="special_case" value="<?php echo htmlspecialchars($case_details['special_case']); ?>" style="width: 97%; padding: 15px; font-size: 1rem; height: 50px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" readonly>
    </div>

    <!-- Back and Create schedule Button -->
    <div style="margin-top: 60px; display: flex; justify-content: flex-end; gap: 20px; width: 100%; max-width: 600px; margin-left: 47%;">
    
     <!-- Mark as Settled Button -->
     <a href="createschedule.php?case_number=<?php echo urlencode($case_details['case_number']); ?>" class="btn-container" style="text-decoration: none; width: 100%;">
    <button type="button" id="settleButton" class="btn btn-info" style="width: 100%; height: 60px; font-size: 1rem; font-weight: 500;">
        Create Schedule
    </button>
</a>
    <!-- Back Button -->
    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/complaint.php" style="text-decoration: none; width: 100%;">
        <button type="button" id="backButton" style="width: 100%;  background-color: rgb(23, 23, 23); height: 60px; font-size: 1rem; color: #fff; font-weight: 500;">Back</button>
    </a>

   
</div>


</nav>

</div>
    

 </nav>






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

    <style>
        
.sidebar-submenu-item {
    display: block;
    text-decoration: none;
    padding: 8px 130px; 
   
    padding-left: 20px
}

.sidebar-submenu-show {
    display: none;
}

.sidebar-link {
        text-decoration: none;
        color: inherit; 
        display: flex;
        align-items: center;
        width: 100%; 
    }

    .badge {
    background-color: #ff0000;
    color: white; 
    border-radius: 50%;
    padding: 0.3rem 0.6rem;
    font-size: 0.9rem;
    position: absolute;
    top: 5px; 
    right: 10px;
    transform: translateY(-50%); 
    display: inline-block;
}
.sidebar-category-header {
    position: relative; 
}
    
    </style>
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





    function toggleSubMenu() {
    const submenu = document.querySelector(".sidebar-submenu-show");
    submenu.style.display = submenu.style.display === "none" || submenu.style.display === "" ? "block" : "none";
}
    </script>
</body>

</html>