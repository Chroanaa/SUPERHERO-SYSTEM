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
                    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/complaintmanage/complaint.php "class="sidebar-link">
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
        MARK AS
    </h1>  

    <button type="button" id="settleButton" class="btn btn-info open-modal" data-case-number="<?php echo htmlspecialchars($case_details['case_number']); ?>" style="margin-left: 82%; margin-top: 2%; width: 15%;  height: 50px; font-size: 1rem; font-weight: 500;">
        Reschedule
    </button>
</nav>




<!-- Dashboard body -->
 <!-- Dashboard body -->
  <!-- Dashboard body -->
  <nav style="margin-top: 30px; margin-left: 21%; padding: 20px; min-height: 80vh; width: 77%; box-sizing: border-box; background-color: #ffffff; border-radius: 10px;">
    
 <div style="position: relative; padding: 5px; margin-top: 10px; margin-left: 0%; min-height: 75vh; width: 100%; border-bottom: 2.5px solid #004080; border-top: 50px solid #004080; border-left: 2.5px solid #004080; border-right: 2.5px solid #004080; border-radius: 5px;">
  <span style="position: absolute; top: -38px; left: 40%; padding: 0 10px; font-weight: bold; font-size: 18px; color: white;">
   Case Resolution
  </span>

 <form method="POST" action="edith.php?case_number=<?php echo urlencode($case_number); ?>">
    <div style="margin-left: 5%; width: 90%;">
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
     <div style="margin-top: 40px; display: flex; justify-content: flex-end; gap: 10px; margin-bottom: 5%;">
    <button type="submit" class="btn btn-primary" style="padding: 10px 20px; width: 23%; height: 50px; font-size: 1rem; font-weight: 500; border: none; background-color: #004080; color: white; cursor: pointer;">Update Case</button>
    <a href="http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php" style="text-decoration: none; width: 23%;">
        <button type="button" class="btn btn-primary" style="padding: 10px 20px; width: 100%; height: 50px; font-size: 1rem; font-weight: 500; border: none; background-color: rgb(23, 23, 23); color: white; cursor: pointer;">Back</button>
    </a>
</div>





    </div>
</form>

    
    

 </nav>








 <div id="complaint-create" class="create" style="display: none;">
    <div class="create-content animate-modal" style="width: 70%; min-height: 90vh; top: 40px; left: 15%; overflow-y: auto; max-height: 80vh;">
        <!-- Close Button -->
        <span id="closeModalBtn" class="close-btn">&times;</span> 
        <h1 style="text-align: center;">Reschedule</h1>
        <div id="complaint-details">
            <!-- FORM -->
            <form action="../../../../../../controllers/departments/LUPON/reschedule.php" method="POST">
                <input type="hidden" name="case_number" value="<?php echo htmlspecialchars($case_details['case_number']); ?>">

                <div style="display: flex; justify-content: center; gap: 250px; margin-bottom: 30px;">
                    <div style="width: 400px;">
                        <label style="font-size: 20px; font-weight: 600;">Complainant 1</label>
                        <div id="complainant-container" style="display: flex; flex-direction: column; gap: 10px;">
                            <input type="text" name="complainant_name" value="<?php echo htmlspecialchars($case_details['complainant_name']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                            <input type="text" name="complainant_address" value="<?php echo htmlspecialchars($case_details['complainant_address']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                        </div>
                    </div>

                    <div style="width: 400px;">
                        <label style="font-size: 20px; font-weight: 600;">Respondent 1</label>
                        <div id="respondent-container" style="display: flex; flex-direction: column; gap: 10px;">
                            <input type="text" name="respondent_name" value="<?php echo htmlspecialchars($case_details['respondent_name']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                            <input type="text" name="respondent_address" value="<?php echo htmlspecialchars($case_details['respondent_address']); ?>" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;" disabled>
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 22%; margin-top: 100px; justify-content: center;">
                    <div style="flex: 1; min-width: 280px; max-width: 400px;">
                        <label for="case_officer">Case Officer</label>
                        <input type="text" id="case_officer" name="case_officer" value="<?php echo htmlspecialchars($case_details['case_officer']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                    <div style="flex: 1; min-width: 280px; max-width: 400px;">
                        <label for="hearing_date">Hearing Date</label>
                        <input type="date" id="hearing_date" name="hearing_date" value="<?php echo htmlspecialchars($case_details['hearing_date']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 22%; margin-top: 50px; justify-content: center;">
                    <div style="flex: 1; min-width: 280px; max-width: 400px;">
                        <label for="venue">Venue</label>
                        <input type="text" id="venue" name="venue" value="<?php echo htmlspecialchars($case_details['venue']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                    <div style="flex: 1; min-width: 280px; max-width: 400px;">
                        <label for="hearing_time">Hearing Time</label>
                        <input type="time" id="hearing_time" name="hearing_time" value="<?php echo htmlspecialchars($case_details['hearing_time']); ?>" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 200px; height: 60px; font-size: 1rem; font-weight: 500; margin-top: 10%; margin-left: 78%;">Submit</button>
            </form>
        </div>
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



    .create {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #191212bb;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: ease 0.5s;
    display: none;
    z-index: 8000;
    opacity: 0;
    animation: fadeIn 0.5s forwards;
}
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
.create-content {
    position: absolute;
    background-color: white;
    padding: 20px;
    top: 25%;
    border-radius: 5px;
    width: 1000px;
    height: 50%;
    left: 23%;
    transform: translateY(-20px);
    animation: slideIn 0.5s ease-out forwards;
}
@keyframes slideIn {
    from {
        transform: translateY(-20px);
    }
    to {
        transform: translateY(0); 
    }
}

.close-btn {
    cursor: pointer;
    float: right;
    font-size: 30px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(45deg, #fcde7b, #fc7b7b);
    color: rgb(83, 83, 83);
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
    animation: spin 3s infinite linear;
}

@keyframes spin {
    100% {
        transform: rotate(360deg);
    }
}

.close-btn:hover {
    background: linear-gradient(45deg, #7bfc7b, #ec7777);
    color: rgb(83, 83, 83);
}

/* The Modal (background) */
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
  padding-top: 60px;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
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




document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("complaint-create");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const complaintDetails = document.getElementById("complaint-details");
    document.querySelectorAll(".open-modal").forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const caseNumber = button.getAttribute("data-case-number");
            modal.style.display = "block";
        });
    });
    closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
    </script>
</body>

</html>