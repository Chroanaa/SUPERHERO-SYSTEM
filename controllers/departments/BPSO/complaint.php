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

// Get the AWS credentials from the environment
$awsAccessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$awsSecretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$awsRegion = $_ENV['AWS_REGION'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form data
    $case_complainants = [];
    $case_respondents = [];
    $bcpc_children_infos = [];  // Array to hold BCPC child info

    // Handle complainant data
    if (isset($_POST['complainant_name']) && is_array($_POST['complainant_name'])) {
        foreach ($_POST['complainant_name'] as $index => $complainant_name) {
            $case_complainants[] = [
                'name' => $complainant_name,
                'address' => $_POST['complainant_address'][$index] ?? '' // Default to empty if not provided
            ];
        }
    }

    // Handle respondent data
    if (isset($_POST['respondent_name']) && is_array($_POST['respondent_name'])) {
        foreach ($_POST['respondent_name'] as $index => $respondent_name) {
            $case_respondents[] = [
                'name' => $respondent_name,
                'address' => $_POST['respondent_address'][$index] ?? ''
            ];
        }
    }

    // Handle BCPC child data
    if (isset($_POST['child_name']) && is_array($_POST['child_name'])) {
        foreach ($_POST['child_name'] as $index => $child_name) {
            $bcpc_children_infos[] = [
                'child_name' => $child_name,
                'child_age' => $_POST['child_age'][$index] ?? '',
                'child_gender' => $_POST['child_gender'][$index] ?? '',
                'child_address' => $_POST['child_address'][$index] ?? ''
            ];
        }
    }

    // Convert incident_case_time to ISO 8601 format
    $incidentCaseTime = '';
    if (isset($_POST['incident_case_time'])) {
        try {
            // Create a DateTime object from the provided time
            $timeObject = DateTime::createFromFormat('H:i', $_POST['incident_case_time']);
            if ($timeObject) {
                // Convert to ISO 8601 format
                $incidentCaseTime = $timeObject->format('H:i:sP'); // Example: 14:30:00+00:00
            } else {
                throw new Exception("Invalid time format.");
            }
        } catch (Exception $e) {
            echo "Error converting time: " . $e->getMessage();
            exit;
        }
    }

    // Convert incident_case_issued to ISO 8601 format (YYYY-MM-DD)
    $incidentCaseIssued = '';
    if (isset($_POST['incident_date'])) {
        try {
            // Create a DateTime object from the provided date
            $dateObject = DateTime::createFromFormat('Y-m-d', $_POST['incident_date']);
            if ($dateObject) {
                // Convert to ISO 8601 format
                $incidentCaseIssued = $dateObject->format('Y-m-d'); // Example: 2024-10-31
            } else {
                throw new Exception("Invalid date format.");
            }
        } catch (Exception $e) {
            echo "Error converting date: " . $e->getMessage();
            exit;
        }
    }

    // Get the current timestamp for case creation
    $caseCreated = (new DateTime())->format(DateTime::ATOM); // Current date and time in ISO 8601 format

    // Prepare the data to be sent in the POST request
    $postData = [
        'case_complainants' => $case_complainants,
        'case_respondents' => $case_respondents,
        'case_type' => $_POST['case_type'] ?? '',
        'case_number' => time(), // auto-generated case number based on current time
        'place_of_incident' => $_POST['place_of_incident'] ?? '',
        'incident_case_issued' => $incidentCaseIssued, // Store in ISO 8601 format
        'incident_case_time' => $incidentCaseTime,
        'case_description' => $_POST['case_description'] ?? '',
        'affiliated_dept_case' => $_POST['special_case'] ?? 'None', // Special case involved from the dropdown
        'case_status' => 'Ongoing', // Default case status
        'case_created' => $caseCreated, // Add the case creation timestamp
        'bcpc_children_infos' => ['L' => array_map(fn($c) => [
            'M' => [
                'child_name' => ['S' => $c['child_name']],
                'child_age' => ['N' => (string) $c['child_age']],
                'child_gender' => ['S' => $c['child_gender']],
                'child_address' => ['S' => $c['child_address']]
            ]
        ], $bcpc_children_infos)],
    ];

    // Determine the DynamoDB table based on the special case
    $tableName = 'bms_bpso_portal_complaint_records'; // Default table for BPSO

    if ($postData['affiliated_dept_case'] === 'BCPC') {
        $tableName = 'bms_bcpc_portal_complaint_records'; // Use this table for BCPC
    }

    // Initialize the DynamoDbClient
    $dynamoDbClient = new DynamoDbClient([
        'region' => $awsRegion,
        'version' => 'latest',
        'credentials' => [
            'key' => $awsAccessKeyId,
            'secret' => $awsSecretAccessKey,
        ]
    ]);

    // Prepare the data to insert into DynamoDB
    $item = [
        'case_number' => ['N' => (string) $postData['case_number']],
        'case_complainants' => ['L' => array_map(fn($c) => ['M' => ['name' => ['S' => $c['name']], 'address' => ['S' => $c['address']]]], $case_complainants)],
        'case_respondents' => ['L' => array_map(fn($r) => ['M' => ['name' => ['S' => $r['name']], 'address' => ['S' => $r['address']]]], $case_respondents)],
        'case_type' => ['S' => $postData['case_type']],
        'place_of_incident' => ['S' => $postData['place_of_incident']],
        'incident_case_issued' => ['S' => $postData['incident_case_issued']], // Use ISO 8601 format
        'incident_case_time' => ['S' => $postData['incident_case_time']],
        'case_description' => ['S' => $postData['case_description']],
        'affiliated_dept_case' => ['S' => $postData['affiliated_dept_case']],
        'case_status' => ['S' => $postData['case_status']],
        'case_created' => ['S' => $postData['case_created']],  // Add case_created here
        'bcpc_children_infos' => $postData['bcpc_children_infos'],  // Add BCPC children info here
    ];

    // Put the item into DynamoDB
    try {
        $result = $dynamoDbClient->putItem([
            'TableName' => $tableName,
            'Item' => $item
        ]);
        // Redirect to the success page
        header('Location: http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/complaints.php');
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>
