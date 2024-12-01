<?php
include 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';

header('Content-Type: application/json');
if (isset($_GET['case_number'])) { $case_number = $_GET['case_number'];
 try { $sql = "SELECT case_number, hearing_date, hearing_time, case_officer, case_notes FROM turnover WHERE case_number = :case_number";
        $stmt = $pdo->prepare($sql); $stmt->bindParam(':case_number', $case_number, PDO::PARAM_STR); $stmt->execute(); $case = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($case) { $formatted_time = date("g:iA", strtotime($case['hearing_time']));
echo json_encode([
                'success' => true,'case_number' => $case['case_number'], 'hearing_date' => $case['hearing_date'], 'hearing_time' => $formatted_time, 'case_officer' => $case['case_officer'], 'case_notes' => $case['case_notes']
            ]); } else { echo json_encode(['success' => false, 'message' => 'Case not found.']);} } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage()); echo json_encode(['success' => false, 'message' => 'Error fetching case details.']); }
} else {
    echo json_encode(['success' => false, 'message' => 'Case number is required.']);
}
?>

