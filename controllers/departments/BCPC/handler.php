<?php
session_start();
require_once '../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Aws\Exception\AwsException;
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

$awsAccessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$awsSecretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$awsRegion = $_ENV['AWS_REGION'];

// Initialize DynamoDB client
$dynamoDb = new DynamoDbClient([
    'region' => $awsRegion,
    'version' => 'latest',
    'credentials' => [
        'key' => $awsAccessKeyId,
        'secret' => $awsSecretAccessKey,
    ],
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caseNumber = $_POST['caseNumber'] ?? null;
    $initialCase = $_POST['initialCase'] ?? null;
    $caseType = $_POST['caseType'] ?? null;
    $caseStatus = $_POST['caseStatus'] ?? null;

    // Validate input
    // Ensure caseType is not empty
    if (!$caseNumber || !$caseType || !$caseStatus) {
        echo "Error: Missing required fields.";
        exit;
    }


    // Assign a default value for `initialCase` if it may not be provided
    if (!$initialCase) {
        $initialCase = "Unknown"; // Replace with a meaningful default value
    }

    // Create the case_type structure as an array of objects
    $caseTypeArray = [
        [
            'initial_case' => $initialCase,
            'case_type' => $caseType,
        ],
    ];

    try {
        $caseTypeDynamo = array_map(function($type) {
            if (empty($type['initial_case']) || empty($type['case_type'])) {
                throw new Exception('Invalid caseType array structure.');
            }
            return [
                'M' => [
                    'initial_case' => ['S' => $type['initial_case']],
                    'case_type' => ['S' => $type['case_type']],
                ],
            ];
        }, $caseTypeArray);
    
        $result = $dynamoDb->updateItem([
            'TableName' => 'bms_bcpc_portal_complaint_records',
            'Key' => [
                'case_number' => ['N' => (string)$caseNumber],
            ],
            'UpdateExpression' => 'SET case_type = :caseType, case_status = :caseStatus',
            'ExpressionAttributeValues' => [
                ':caseType' => ['L' => $caseTypeDynamo],
                ':caseStatus' => ['S' => $caseStatus],
            ],
            'ReturnValues' => 'UPDATED_NEW',
        ]);
    
        header('Location: http://localhost:3000/views/dashboard/departments/BCPC/dashboard.php');
        exit;
    } catch (AwsException $e) {
        echo "Error: " . $e->getAwsErrorMessage();
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }    
}
