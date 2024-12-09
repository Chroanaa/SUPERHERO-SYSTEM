<?php
session_start();
require_once './vendor/autoload.php';
require_once './controllers/db_connection.php'; // Include the database connection

// Define user credentials and types
$userCredentials = [
    ['email' => 'test_user@superadmin.ph', 'password' => 'kenneth', 'user_type' => 'super_admin'],
    ['email' => 'test_user@headadmin.ph', 'password' => 'kenneth', 'user_type' => 'head_admin'],
    ['email' => 'test_user@badac.ph', 'password' => 'kenneth', 'user_type' => 'BADAC'],
    ['email' => 'test_user@bpso.ph', 'password' => 'kenneth', 'user_type' => 'BPSO'],
    ['email' => 'test_user@admin1.ph', 'password' => 'kenneth', 'user_type' => 'Admin1'],
    ['email' => 'test_user@treasurer.ph', 'password' => 'kenneth', 'user_type' => 'Admin2'],
    ['email' => 'test_user@bcpc.ph', 'password' => 'kenneth', 'user_type' => 'BCPC'],
    ['email' => 'test_user@lupon.ph', 'password' => 'kenneth', 'user_type' => 'LUPON']
];

// Function to fetch the template path based on user type
function getTemplatePath($userType) {
    $paths = [
        'super_admin' => 'views/dashboard/super_admin/templates/pages/dashboard.php',
        'head_admin' => 'views/dashboard/head_admin/templates/pages/dashboard.php',
        'BADAC' => 'views/dashboard/departments/BADAC/templates/dashboard.php',
        'BPSO' => 'views/dashboard/departments/BPSO/Dashboard/dashboard.php',
        'Admin1' => 'views/dashboard/departments/Admin1/templates/dashboard.php',
        'Admin2' => '/views/dashboard/departments/Admin2/dashboard.php',
        'BCPC' => 'views/dashboard/departments/BCPC/dashboard.php',
        'LUPON' => 'views/dashboard/departments/LUPON/dashboard/dashboard.php'
    ];
    return $paths[$userType] ?? null;
}

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get submitted email and password
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Fetch user from the database based on email
    $dbConnections = getDatabaseConnections();
    $stmt = $dbConnections['bms_account_portal']->prepare('SELECT * FROM brgy_admin_users WHERE brgy_email = :email');
    $stmt->execute(['email' => $email]); 
    $user = $stmt->fetch();

    // Initialize userType variable
    $userType = null;

    if ($user) {
        // Log the hashed password and input password for debugging
        error_log("Hashed Password in DB: " . $user['brgy_password_hashed']);
        error_log("Input Password: " . $password);

        // Attempt to verify password using password_verify
        $isPasswordValid = password_verify($password, $user['brgy_password_hashed']);

        // If password_verify fails, check hardcoded credentials
        if (!$isPasswordValid) {
            foreach ($userCredentials as $hardcodedUser) {
                if ($hardcodedUser['email'] === $email && $hardcodedUser['password'] === $password) {
                    $userType = $hardcodedUser['user_type'];
                    $_SESSION['user_type'] = $userType;
                    $isPasswordValid = true; // Set as valid after matching hardcoded credentials
                    break;
                }
            }
        } else {
            $userType = $user['user_type']; // Set user type from database
            $_SESSION['user_type'] = $userType;
        }

        if ($isPasswordValid) {
            // Set session variable for email
            $_SESSION['email'] = $email;

            // Check first_time_admin_user flag and redirect accordingly
            if (strtolower($user['first_time_admin_user']) === 'yes') {
                header('Location: views/confirmation/admin/new_user/onboard.php');
                exit();
            } else {
                // Redirect to verification code page if first_time_admin_user is 'no'
                header('Location: views/confirmation/admin/verification-code.php');
                exit();
            }
        } else {
            // Invalid password
            $_SESSION['message'] = 'Invalid password. Please try again.';
            header('Location: index.php'); // Redirect back to login page
            exit();
        }
    } else {
        // User not found, check hardcoded credentials
        foreach ($userCredentials as $hardcodedUser) {
            if ($hardcodedUser['email'] === $email && $hardcodedUser['password'] === $password) {
                $userType = $hardcodedUser['user_type'];
                $_SESSION['user_type'] = $userType;
                $_SESSION['email'] = $email; // Set session variable for email
                break;
            }
        }

        if ($userType) {
            // Get the template path based on user type
            $templatePath = getTemplatePath($userType);
            if ($templatePath) {
                // Redirect to the appropriate template
                header('Location: ' . $templatePath);
                exit();
            }
        }

        // Invalid credentials
        $_SESSION['message'] = 'Invalid email or password. Please try again.';
        header('Location: index.php'); // Redirect back to login page
        exit();
    }
}
?>
