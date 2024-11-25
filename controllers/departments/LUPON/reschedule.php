<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'C:/xampp/htdocs/SUPERHERO-SYSTEM/controllers/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$case_officer = $_POST['case_officer'] ?? null;
$hearing_date = $_POST['hearing_date'] ?? null;
$venue = $_POST['venue'] ?? null;
$hearing_time = $_POST['hearing_time'] ?? null;
$case_number = $_POST['case_number'] ?? null;
if ($case_officer && $hearing_date && $venue && $hearing_time && $case_number) {
    try { $checkStmt = $pdo->prepare("SELECT * FROM turnover WHERE hearing_date = ? AND hearing_time = ?"); $checkStmt->execute([$hearing_date, $hearing_time]); $existingRecord = $checkStmt->fetch();
if ($existingRecord) { $_SESSION['error_message'] = 'A hearing already exists at the same time and date';
     header("Location: http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php");
    exit(); } else { $stmt = $pdo->prepare("UPDATE turnover SET case_officer = ?, hearing_date = ?, venue = ?, hearing_time = ? WHERE case_number = ?"); $stmt->execute([$case_officer, $hearing_date, $venue, $hearing_time, $case_number]);
$_SESSION['success_message'] = 'The record was rescheduled successfully'; header("Location: http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php");
exit(); } } catch (PDOException $e) { $_SESSION['error_message'] = "Error: " . $e->getMessage();
 header("Location: http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php");
exit();
        }
    } else {
        $_SESSION['error_message'] = "Every field is required";
        header("Location: http://localhost:3000/views/dashboard/departments/LUPON/complaint%20management/schedule/schedule.php");
        exit();
    }
}
?>
