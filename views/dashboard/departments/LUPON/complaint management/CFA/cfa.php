<?php
include 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';

if (isset($_GET['case_number'])) {
    $case_number = $_GET['case_number']; $sql = "SELECT * FROM turnover WHERE case_number = :case_number"; $stmt = $pdo->prepare($sql); $stmt->bindParam(':case_number', $case_number, PDO::PARAM_STR);
    $stmt->execute(); $turnover = $stmt->fetch(PDO::FETCH_ASSOC);
 if (!$turnover) { echo "No case."; exit; }
 $date_of_incident = $turnover['date_of_incident']; $formatted_date = date('F j, Y', strtotime($date_of_incident));  
 $hearing_time = $turnover['hearing_time'];  $formatted_time_12hr = date('g:i A', strtotime($hearing_time));  
} else { echo "No casenumber."; exit;}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
    CERTIFICATE TO FILE ACTION
    </h1>  
</nav>



<!-- Dashboard body -->
 <!-- Dashboard body -->
  <!-- Dashboard body -->
  <nav style="margin-top: 30px; margin-left: 21%; padding: 20px; min-height: 10vh; width: 77%; box-sizing: border-box; background-color: #ffffff; border-radius: 10px; overflow: hidden;">

<div style="display: flex; justify-content: center; align-items: center;">
  <div style="height: 906px; width: 916px; margin-left: 0; overflow-y: hidden;">

        
        <div id="generatedescription" name="complaint_description" placeholder="Report description..." style="overflow-y: auto; height: 506px; border-radius: 5px; ">
        <div id="loading">Please wait... Generating PDF...</div>
        <!--Summon letter format -->
        <h5 style="text-align: center; margin-left: auto; margin-right: auto;">
  REPUBLIC OF THE PHILIPPINES<br>
  OFFICE OF THE LUPON TAGAPAMAYAPA<br>
  BRGY. STA. LUCIA NOVALICHES<br>
  QUEZON CITY DISTRICT V<br>
  Contact #: 417-1412 / 358-3664 / 0939-950-9991 / 625-1755
</h5>

<h6 style="margin-left: 10%; margin-top: 6%;">KP Kalatas Blg. 9</h6>
<h6 style="margin-left: 60%; margin-top: 4%;">Barangay Case No: 
  <span id="case_number" style="color: red;"><?php echo htmlspecialchars($turnover['case_number']); ?></span>
</h6>

<h6 style="margin-left: 10%; margin-top: 6%; line-height: 1.8;">
  <span id="complainant_name" style="color: red;"><?php echo htmlspecialchars($turnover['complainant_name']); ?></span><br>
  Complainant/s<br>
  -Laban kay/kina<br>
  <span id="respondent_name" style="color: red;"><?php echo htmlspecialchars($turnover['respondent_name']); ?></span><br>
  Respondent/s
</h6>




<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
    This is to certify that:
</h6>

<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
    1. This complaint was filed on <span style="color: red;"><?php echo htmlspecialchars($formatted_date); ?></span>
</h6>


<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
2. There has been personal confrontation between the parties before the Punong Barangay because the respondent was absent and that mediation failed.
</h6>

<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
3. The Pangkat ng Tagapagkasundo was constituted but there has been personal confrontation before the Pangkat likewise did not result into a settlement. 
</h6>

<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
4. Therefore, the corresponding complaint for the dispute may now be filed in court/government office.
</h6>

<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
The [Day]
</h6>

<h6 style="text-align: left; margin-left: auto; margin-right: auto; line-height: 1.8; width: 80%; margin-top: 6%;">
Attested by [Lupon Team]
</h6>

<div style="display: flex; justify-content: center; align-items: center; gap: 40%;">
    <h6 style="margin-top: 10%;">
        Clarence Ordejon<br>
        Lupon Tagapamayapa
    </h6>

    <h6 style="margin-top: 10%; margin-left: 0%;">
        Clarence Ordejon<br>
        Lupon Secretary
    </h6>
</div>


<div style="display: flex; justify-content: center; align-items: center; gap: 40%;">
    <h6 style="margin-top: 10%;">
        Clarence Ordejon<br>
        Lupon Secretary
    </h6>

    <h6 style="margin-top: 10%;">
        Clarence Ordejon<br>
        Lupon Tagapamayapa
    </h6>
</div>


<div style="display: flex; justify-content: center; align-items: center; ">
    <h6 style="margin-top: 10%;">
        Clarence Ordejon<br>
        Lupon Tagapamayapa
    </h6>
</div>





       
</div>

     </div>
  </div>


  <div style=" margin-left: 65%; margin-top: -350px; display: flex; gap: 20px; width: 400px;">
  <button id="printButton" class="btn btn-primary btn-hover" style="font-weight: 500; width: 200px; height: 60px; border-radius: 6px; border: 1px solid #b1b1b1; display: flex; justify-content: center; align-items: center; text-decoration: none; 
color: white; background-color: #007bff;">PRINT </button>

        <a href="issuecfa.php?case_number=<?php echo urlencode($_GET['case_number']); ?>"  class="btn btn-primary btn-hover" 
        style="font-weight: 500; width: 200px; height: 60px; border-radius: 6px; border: 1px solid #b1b1b1; 
        display: flex; justify-content: center; align-items: center; text-decoration: none; color: white;background-color: rgb(23, 23, 23);">
        BACK
    </a>
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

    #loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            font-size: 20px;
            padding-top: 20%;
            z-index: 9999;
        }

        #generatedescription {
        overflow-y: auto;
        width: 100%;
        max-width: 100%;
        height: 80vh;
        border: 1px solid #b1b1b1;
        border-radius: 3px;
        padding: 15px;
        font-size: 1rem;
        box-sizing: border-box;
    }
    @media print {
        #generatedescription {
            width: 100%;
            height: auto;
            page-break-inside: avoid;
            font-size: 12px;
            padding: 10px; 
            border: 1px solid #000;
        }
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



document.getElementById('printButton').addEventListener('click', function() {
     const { jsPDF } = window.jspdf;
        var doc = new jsPDF();
    var caseNumber = document.getElementById('case_number').textContent; var complainantName = document.getElementById('complainant_name').textContent; var respondentName = document.getElementById('respondent_name').textContent;
    doc.setFont('times', 'normal'); doc.setFontSize(10); 
    let topMargin = 10; 
    doc.setFont('times', 'bold');
    doc.setFontSize(10);
    doc.text('REPUBLIC OF THE PHILIPPINES', 105, topMargin, { align: 'center' });
    doc.text('OFFICE OF THE LUPON TAGAPAMAYAPA', 105, topMargin + 10, { align: 'center' });
    doc.text('BRGY. STA. LUCIA NOVALICHES', 105, topMargin + 15, { align: 'center' });
    doc.text('QUEZON CITY DISTRICT V', 105, topMargin + 20, { align: 'center' });
    doc.text('Contact #: 417-1412 / 358-3664 / 0939-950-9991 / 625-1755', 105, topMargin + 25, { align: 'center' });
    // Content script from db
    doc.setFont('times', 'normal');
    doc.setFontSize(10); doc.text('KP Kalatas Blg. 9', 10, 40); doc.text('Barangay Case No: ', 140, 50); doc.setTextColor(255, 0, 0); doc.text(caseNumber, 174, 50);
    doc.setTextColor(255, 0, 0);
    doc.text(complainantName, 10, 60); 
    doc.setTextColor(0, 0, 0);
    doc.text('Complainant/s', 10, 65);
    doc.text('-Laban kay/kina', 10, 70);

    doc.setTextColor(255, 0, 0);
    doc.text(respondentName, 10, 75); 
    doc.setTextColor(0, 0, 0);
    doc.text('Respondent/s', 10, 80);

    doc.text(' CERTIFICATE TO FILE ACTION', 80, topMargin + 100);

    doc.text(' This is to certify that:', 10, topMargin + 120);
    var formattedDate = "<?php echo htmlspecialchars($formatted_date); ?>";
    doc.text('1. This complaint was filed on ' + formattedDate, 10, topMargin + 130);
    doc.text('2. There has been personal confrontation between the parties before the Punong Barangay because the respondent', 10, topMargin + 140);
    doc.text('was absent and that mediation failed.', 10, topMargin + 145);
    doc.text('3. The Pangkat ng Tagapagkasundo was constituted but there has been personal confrontation before the Pangkat likewise did not result. ', 10, topMargin + 155);
    doc.text('into a settlement. sa bahay ng isinusumbong. o', 10, topMargin + 160);
    doc.text('4. Therefore, the corresponding complaint for the dispute may now be filed in court/government office.', 10, topMargin + 170);
    doc.text('This ', 10, topMargin + 180);
    doc.text('Attested by: ', 10, topMargin + 190);

  
    doc.text('Clarence Ordejon', 150, topMargin + 210); doc.text('LUPON Secretary.',150, topMargin + 215);
    doc.text('Clarence Ordejon', 30, topMargin + 210); doc.text('LUPON Tagapamayapa', 30, topMargin + 215); 

    doc.text('Clarence Ordejon', 150, topMargin + 235); doc.text('LUPON Tagapamayapa',150, topMargin + 240);
    doc.text('Clarence Ordejon', 30, topMargin + 235); doc.text('LUPON President', 30, topMargin + 240); 

    doc.text('Hon. Clarence Ordejon', 90, topMargin + 260); doc.text('Punong Barangay.',90, topMargin + 265);
    doc.save('cfa.pdf');
});









    </script>





    <script src="../Complaint main/dashboard.js"></script>
   

</body>

</html>