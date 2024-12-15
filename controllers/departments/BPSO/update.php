
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'C:/xampp/htdocs/SUPERHERO-SYSTEM/controllers/db_connection.php';
if (!$pdo) {
    die("Connection failed: hindi pa nakakonek");
}  if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // idedebug kopa to bali since gamit natin ay query don naman sa table gumamit ako ng sql hindi mahanap ng form ko ang id mula sa db table kaya siguro ihiwalay ko mona 
        $id = ($_POST['id']);  
        $complainant_name = ($_POST['complainant_name']);
        $complainant_address = ($_POST['complainant_address']);
        $respondent_name = ($_POST['respondent_name']);
        $respondent_address =  ($_POST['respondent_address']);
        $complaint_category =  ($_POST['complaint_category']);
        $place_of_incident = ($_POST['place_of_incident']);
        $time_of_incident = ($_POST['incidence_time']);
        $date_of_incident =  ($_POST['incidence_date']);
        $complaint_description =  ($_POST['complaint_description']);
        $special_case =  ($_POST['special_case']);
        $query = "UPDATE complaint SET 
       complainant_name = :complainant_name, 
     complainant_address = :complainant_address, 
      respondent_name = :respondent_name, 
        respondent_address = :respondent_address, 
    complaint_category = :complaint_category, 
        place_of_incident = :place_of_incident, 
    time_of_incident = :time_of_incident, 
        date_of_incident = :date_of_incident, 
    complaint_description = :complaint_description, 
     special_case = :special_case
        WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':complainant_name', $complainant_name);
         $stmt->bindParam(':complainant_address', $complainant_address);
         $stmt->bindParam(':respondent_name', $respondent_name);
        $stmt->bindParam(':respondent_address', $respondent_address);
          $stmt->bindParam(':complaint_category', $complaint_category);
        $stmt->bindParam(':place_of_incident', $place_of_incident);
             $stmt->bindParam(':time_of_incident', $time_of_incident);
         $stmt->bindParam(':date_of_incident', $date_of_incident);
        $stmt->bindParam(':complaint_description', $complaint_description);
    $stmt->bindParam(':special_case', $special_case);
        $stmt->bindParam(':id', $id);  
        if ($stmt->execute()) {
            header("Location: http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/complaints.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->errorInfo()[2];
        }
    }

?>