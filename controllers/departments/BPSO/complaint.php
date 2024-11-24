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

    if (isset($_POST['complainant_name']) && is_array($_POST['complainant_name'])) {
        foreach ($_POST['complainant_name'] as $index => $complainant_name) {
            $case_complainants[] = [
                'name' => $complainant_name,
                'address' => $_POST['complainant_address'][$index] ?? '' // Default to empty if not provided
            ];
        }
    }

    if (isset($_POST['respondent_name']) && is_array($_POST['respondent_name'])) {
        foreach ($_POST['respondent_name'] as $index => $respondent_name) {
            $case_respondents[] = [
                'name' => $respondent_name,
                'address' => $_POST['respondent_address'][$index] ?? ''
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


    // Prepare the data to be sent in the POST request
    $postData = [
        'case_complainants' => $case_complainants,
        'case_respondents' => $case_respondents,
        'case_type' => $_POST['case_type'] ?? '',
        'case_number' => time(), // auto-generated case number based on current time
        'place_of_incident' => $_POST['place_of_incident'] ?? '',
        'incident_case_issued' => $_POST['incident_date'] ?? '',
        'incident_case_time' => $incidentCaseTime,
        'case_description' => $_POST['case_description'] ?? '',
        'affiliated_dept_case' => $_POST['special_case'] ?? 'None', // Special case involved from the dropdown
        'case_status' => 'Ongoing', // Default case status
    ];

    // Process based on the selected special case
    // if (!empty($postData['affiliated_dept_case'])) {
    //     switch ($postData['affiliated_dept_case']) {
    //         case 'BCPC':
    //             // Add logic for BCPC-specific handling if needed
    //             break;
    //         case 'BADAC':
    //             // Add logic for BADAC-specific handling if needed
    //             break;
    //         case 'BADAC / BCPC':
    //             // Add logic for combined cases if needed
    //             break;
    //         case 'None':
    //             // Handle case where None is selected
    //             break;
    //         default:
    //             echo "Invalid or unrecognized affiliated department case.";
    //             exit;
    //     }
    // } else {
    //     echo "No affiliated department case selected. Please choose a valid option.";
    //     exit;
    // }

    // Special case logic (if 'None' is selected)
    if ($postData['affiliated_dept_case'] === 'None') {
        $apiUrl = $_ENV['AWS_BPSO_COMPLAINT_URL']; // Load the API URL from the .env file

        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); // Send data as JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json', // Set the content type to JSON
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Handle the API response
        $responseData = json_decode($response, true);

        if ($responseData) {
            // Assuming $responseData indicates a successful API response
            header('Location: http://localhost:3000/views/dashboard/departments/BPSO/Complaint%20main/complaints.php');
            exit;
        } else {
            echo "Failed to submit complaint. Please try again later.";
        }
    } else {
        echo "Special case is not 'None'. No action taken.";
    }
}
