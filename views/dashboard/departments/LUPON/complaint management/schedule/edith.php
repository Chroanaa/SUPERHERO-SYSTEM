<?php
session_start();
include 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php'; 
if (isset($_GET['case_number'])) {
    $case_number = $_GET['case_number'];
} else { echo "Case number is required."; exit;}
$sql = "SELECT * FROM turnover WHERE case_number = :case_number"; $stmt = $pdo->prepare($sql); $stmt->bindParam(':case_number', $case_number); $stmt->execute(); $case = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $summon_letters = (int) $_POST['summon_letters']; $case_status = $_POST['case_status']; $case_notes = $_POST['case_notes']; $update_sql = "UPDATE turnover SET ongoing = :summon_letters, case_status = :case_status, case_notes = :case_notes WHERE case_number = :case_number"; $update_stmt = $pdo->prepare($update_sql); $update_stmt->bindParam(':summon_letters', $summon_letters);
    $update_stmt->bindParam(':case_status', $case_status);$update_stmt->bindParam(':case_notes', $case_notes);$update_stmt->bindParam(':case_number', $case_number); $update_stmt->execute(); $_SESSION['success_message'] = "Case updated successfully!";
    header('Location: schedule.php'); exit();}
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
                    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/complaint.php "class="sidebar-link">
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
                        <a href="http://localhost:3000/views/dashboard/departments/LUPON/notification/notification.php" class="sidebar-link">
                        <span><i class="fa-solid fa-bell category-icon"></i>Notification</span>
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
 <nav style="width: 100%; height: 104px; border: 1px solid #d4d4d4; background-color: #ffffff; position: relative;">
    <h1 style="font-size: 2rem; position: absolute; left: 20%; top: 25px;">
        MARK AS
    </h1>  
</nav>



<!-- Dashboard body -->
 <!-- Dashboard body -->
  <!-- Dashboard body -->
 <nav style="margin-top: 13px; padding: 20px; min-height: 105vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">

 <form method="POST" action="edith.php?case_number=<?php echo urlencode($case_number); ?>">
    <div style="margin-left: 25%; width: 70%;">
        <textarea style="margin-top: 5%; width: 100%; height: 60vh; border: 1px solid #b1b1b1; border-radius: 3px; padding: 15px; box-sizing: border-box;" placeholder="Take notes..." name="case_notes"><?php echo htmlspecialchars($case['case_notes']); ?></textarea>
    <div style="margin-top: 15px;">
    <label for="summon_letters" style="display: block; margin-bottom: 5px;">Number of Summon Letters:</label>
     <input type="number" id="summon_letters" name="summon_letters" value="<?php echo htmlspecialchars($case['ongoing']); ?>" min="0" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-top: 15px;">
     <label for="case_status" style="display: block; margin-bottom: 5px;">Case Status:</label>
     <select id="case_status" name="case_status" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">
     <option value="ongoing" <?php echo ($case['case_status'] == 'ongoing' ? 'selected' : ''); ?>>ongoing</option>
     <option value="settled" <?php echo ($case['case_status'] == 'settled' ? 'selected' : ''); ?>>Settled</option>
     <option value="unsettled" <?php echo ($case['case_status'] == 'unsettled' ? 'selected' : ''); ?>>Unsettled</option>
    </select>
    </div>
     <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
    <button type="submit" class="btn btn-primary" style="padding: 10px 20px; width: 23%; height: 50px; font-size: 1rem; font-weight: 500; border: none; background-color: #004080; color: white; cursor: pointer;">Update Case</button>
    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php" style="text-decoration: none; width: 23%;">
        <button type="button" class="btn btn-primary" style="padding: 10px 20px; width: 100%; height: 50px; font-size: 1rem; font-weight: 500; border: none; background-color: #004080; color: white; cursor: pointer;">Back</button>
    </a>
</div>





    </div>
</form>

    
    

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