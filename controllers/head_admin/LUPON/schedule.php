<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'C:/xampp/htdocs/SUPERHERO-SYSTEM/controllers/db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['case_number'])) {
        $case_number = $_POST['case_number'];  
    } else {
        echo "Error: Case number is missing!";
        exit();  
    }
    $hearing_date = $_POST['hearing_date'];
    $hearing_time = $_POST['hearing_time'];
    $venue = $_POST['venue'];
    $case_officer = $_POST['case_officer'];
    $query_check = "SELECT * FROM turnover WHERE case_number = :case_number AND hearing_date IS NOT NULL AND hearing_time IS NOT NULL";
    $stmt_check = $pdo->prepare($query_check);
    $stmt_check->execute(['case_number' => $case_number]);
    if ($stmt_check->rowCount() > 0) {
        echo "<script>
        alert('Error: This case number already has a scheduled hearing. Please review your data.');
        window.history.back();
      </script>";
    } else {
        $stmt = $pdo->prepare("UPDATE turnover SET hearing_date = ?, hearing_time = ?, venue = ?, case_officer = ? WHERE case_number = ?");
        $stmt->execute([$hearing_date, $hearing_time, $venue, $case_officer, $case_number]);
        header("Location: http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php");
        exit();
    }
}
?>



