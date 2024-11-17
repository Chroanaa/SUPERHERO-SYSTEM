<?php
session_start();
require_once '../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

// Configure DynamoDB client
$dynamoDb = new DynamoDbClient([
    'region' => $_ENV['AWS_REGION'],
    'version' => 'latest',
    'credentials' => [
        'key' => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
    ],
]);

// Get the table name
$tableName = 'bms_bpso_portal_complaint_records';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caseNumber = (int)(microtime(true) * 1000);
    $incidentCaseTime = (new DateTime())->format('c');

    // Collect all complainants
    $complainants = [];
    if (isset($_POST['complainant_name']) && isset($_POST['complainant_address'])) {
        foreach ($_POST['complainant_name'] as $key => $name) {
            $complainants[] = [
                'name' => $name,
                'address' => $_POST['complainant_address'][$key] ?? ''
            ];
        }
    }

    // Collect all respondents
    $respondents = [];
    if (isset($_POST['respondent_name']) && isset($_POST['respondent_address'])) {
        foreach ($_POST['respondent_name'] as $key => $name) {
            $respondents[] = [
                'name' => $name,
                'address' => $_POST['respondent_address'][$key] ?? ''
            ];
        }
    }

    $data = [
        'incident_case_time' => $incidentCaseTime, // ISO 8601 date-time
        'case_type' => $_POST['complaint_category'] ?? '',
        'place_of_incident' => $_POST['place_of_incident'] ?? '',
        'case_number' => $caseNumber,  // Auto-generated case number
        'case_description' => $_POST['complaint_description'] ?? '',
        'incident_case_issued' => $incidentCaseTime, // Use the same ISO 8601 format
        'complaint_status' => 'Pending',
        'affiliated_dept_case' => 'bpso',
        'case_complainants' => $complainants,
        'case_respondents' => $respondents,
        'incident_case_created' => $incidentCaseTime, // Use the same ISO 8601 format
        'special_case' => $_POST['special_case'] ?? '',
    ];

    // Add data to DynamoDB
    try {
        $dynamoDb->putItem([
            'TableName' => $tableName,
            'Item' => array_map(
                fn($value) => is_array($value)
                    ? ['L' => array_map(
                        fn($v) => ['M' => array_map(
                            fn($vv) => ['S' => $vv],
                            $v
                        )],
                        $value
                    )]
                    : (is_numeric($value) ? ['N' => (string)$value] : ['S' => $value]), // Ensure numeric values are passed as 'N'
                $data
            ),
        ]);

        $_SESSION['success'] = 'Complaint submitted successfully!';
        header("Location: http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/complaints.php");
        exit();
    } catch (Aws\Exception\AwsException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>