<?php

include_once 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';
$sql_settled_cases = "SELECT COUNT(DISTINCT case_number) AS total_settled FROM turnover WHERE case_status = 'settled'";
$stmt_settled_cases = $pdo->query($sql_settled_cases);
$row_settled_cases = $stmt_settled_cases->fetch(PDO::FETCH_ASSOC);
$total_settled = $row_settled_cases['total_settled'];

$sql_unsettled_cases = "SELECT COUNT(DISTINCT case_number) AS total_unsettled FROM turnover WHERE case_status = 'unsettled'";
$stmt_unsettled_cases = $pdo->query($sql_unsettled_cases);
$row_unsettled_cases = $stmt_unsettled_cases->fetch(PDO::FETCH_ASSOC);
$total_unsettled = $row_unsettled_cases['total_unsettled'];


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
    <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link href="../../LUPON/complaint management/style.css" rel="stylesheet">
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
                        <a href="http://localhost/SUPERHERO-SYSTEM/views/dashboard/departments/LUPON/dashboard/dashboard.php" class="sidebar-link" style="text-decoration: none; color: inherit;">
                        <span><i class="fa-solid fa-tachometer-alt category-icon"></i>Dashboard</span>
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
        <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/CFA/issuecfa.php" class="sidebar-link">
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
        DASHBOARD
    </h1>  
</nav>



<!-- Dashboard body -->
 <!-- Dashboard body -->
  <!-- Dashboard body -->
 
    
  <div style="display: flex; justify-content: center; align-items: center; gap: 45px; margin-top: 3%; flex-wrap: wrap;">

<!-- First div for total cases -->
<div style="display: flex; justify-content: flex-start; align-items: center; gap: 40px; margin-left: 5%; max-width: 100%; box-sizing: border-box;">
    <a href="#" style="text-decoration: none; color: inherit;">
        <div id="total-case-1" class="clickable-div" style="width: 300px; height: 200px; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
            <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Case</span>
            <h1 style="color: #303030; font-weight: 500; margin-top: 10%;">
                <?php 
                    $sql = "SELECT COUNT(DISTINCT case_number) AS total_complaint FROM turnover";
                    $stmt = $pdo->query($sql); 
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                    $total_complaint = $row['total_complaint']; 
                    echo number_format($total_complaint); 
                ?>
            </h1>
        </div>
    </a>
</div>



<div style="display: flex; gap: 40px; max-width: 100%; box-sizing: border-box;">
<a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/complaint.php" style="text-decoration: none; color: inherit;">
    <div id="total-case-1" class="clickable-div" style="width: 300px; height: 200px; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
        <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Turnover</span>
        <h1 style="color: #303030; font-weight: 500; margin-top: 10%;"> 
            <?php 
                $sql = "SELECT COUNT(DISTINCT case_number) AS total_complaint FROM turnover WHERE hearing_time IS NULL OR hearing_date IS NULL";
                $stmt = $pdo->query($sql);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_complaint = $row['total_complaint']; 
                echo number_format($total_complaint); 
            ?>
        </h1>
    </div>
</a>
</div>



<div style="display: flex; justify-content: flex-start; align-items: center; gap: 40px; max-width: 100%; box-sizing: border-box;">

    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php" style="text-decoration: none; color: inherit;">
     <div id="total-case-1" class="clickable-div" style="width: 300px; height: 200px; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
    <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Ongoing</span>
     <h1 style="color: #303030; font-weight: 500; margin-top: 10%;"> 
        <?php 
           $sql = "SELECT COUNT(DISTINCT case_number) AS total_ongoing FROM turnover WHERE case_status = 'ongoing' OR case_status IS NULL";
          $stmt = $pdo->query($sql);
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $total_ongoing = $row['total_ongoing']; 
                    echo number_format($total_ongoing); 
                ?>
            </h1>
        </div>
    </a>
</div>




</div>


<div style="display: flex; justify-content: center; align-items: center; gap: 45px; margin-top: 5%; flex-wrap: wrap;">

<!-- Second div for unsettled and settled cases -->

<div style="display: flex; justify-content: flex-start; align-items: center; gap: 40px; max-width: 100%; box-sizing: border-box;">
    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/luponcomplaint/luponcomplaint.php" style="text-decoration: none; color: inherit;">
     <div id="total-case-3" class="clickable-div" style="width: 300px; height: 200px; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
    <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Settled</span>
    <h1 style="color: #303030; font-weight: 500; margin-top: 10%;"> 
     <?php echo $total_settled; ?>
     </h1>
        </div>
    </a>
</div>



<div style="display: flex; justify-content: flex-start; align-items: center; gap: 40px; max-width: 100%; box-sizing: border-box;">
    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/CFA/issuecfa.php" style="text-decoration: none; color: inherit;">
    <div id="total-case-2" class="clickable-div" style="width: 300px; height: 200px; padding: 20px; font-weight: 600; text-align: center; background-color: #ffffff; color: #004084; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(56, 56, 56, 0.5);">
     <span style="background-color: #cfdfef; padding: 5px 20px; border-radius: 15px; border: 2px solid #006bdd;">Total Unsettled</span>
     <h1 style="color: #303030; font-weight: 500; margin-top: 10%;"> 
         <?php echo $total_unsettled; ?> 
     </h1>
        </div>
    </a>
</div>

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

    <style>
        
.sidebar-submenu-item {
    display: block;
    text-decoration: none;
    padding: 8px 130px; 
    padding-left: 20px;
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