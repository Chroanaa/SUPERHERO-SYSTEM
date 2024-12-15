<?php
session_start();
require_once '../../../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../../');
$dotenv->load();

// Get the AWS credentials from the environment
$awsAccessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$awsSecretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$awsRegion = $_ENV['AWS_REGION'];

// Create the DynamoDB client
$dynamoDbClient = new DynamoDbClient([
    'region' => $awsRegion,
    'version' => 'latest',
    'credentials' => [
        'key'    => $awsAccessKeyId,
        'secret' => $awsSecretAccessKey,
    ],
]);

// Get the complaint details from the POST request
$caseNumber = $_POST['case_number'];
$caseDescription = $_POST['case_description'];
$incidentCaseTime = $_POST['incident_case_time'];
// Add any other necessary data here

// Create the payload to send to LUPON API
$luponData = [
    "lupon_all_complaints" => [
        [
            "case_number" => (int)$caseNumber,
            "case_notes" => "Initial investigation conducted; awaiting further action.",
            "time_of_incident" => "14:30", // Adjust as needed
            "status" => "Pending",
            "case_status" => "Under Investigation",
            "complainant_address" => "123 Main St, Quezon City", // Adjust as needed
            "hearing_time" => "10:00",
            "special_case" => "Land Dispute", // Adjust as needed
            "date_of_incident" => "2024-12-08", // Adjust as needed
            "venue" => "Barangay Conference Room", // Adjust as needed
            "origin_department" => "Barangay Hall", // Adjust as needed
            "complaint_category" => "Property Dispute", // Adjust as needed
            "hearing_date" => "2024-12-15", // Adjust as needed
            "place_of_incident" => "789 Oak St, Quezon City", // Adjust as needed
            "ongoing" => true,
            "case_officer" => "Officer Alex Cruz", // Adjust as needed
            "respondent_address" => "456 Elm St, Quezon City", // Adjust as needed
            "complaint_description" => $caseDescription,
            "complainant_name" => "John Doe", // Adjust as needed
            "date_forward" => "2024-12-10" // Adjust as needed
        ]
    ]
];

// Send the POST request to the LUPON API
$apiUrl = 'https://yjme796l3k.execute-api.ap-southeast-2.amazonaws.com/dev/api/v1/brgy/lupon/complaint_records/';
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($luponData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);

// Handle the API response
if ($response) {
    // Handle success (you can redirect, show success message, etc.)
    $_SESSION['message'] = 'Complaint turned over to LUPON successfully.';
    header('Location: complaints.php'); // Redirect back to complaints page
    exit;
} else {
    // Handle failure (you can show an error message)
    $_SESSION['message'] = 'Failed to turn over complaint to LUPON.';
    header('Location: complaints.php'); // Redirect back to complaints page
    exit;
}
?>
