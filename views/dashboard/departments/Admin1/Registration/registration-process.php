<?php
session_start();
require_once '../../../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\DynamoDbException;
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

// Initialize DynamoDB client
$dynamoDb = new DynamoDbClient([
    'region'  => $awsRegion,
    'version' => 'latest',
    'credentials' => [
        'key'    => $awsAccessKeyId,
        'secret' => $awsSecretAccessKey,
    ],
]);

// Function to generate a unique numeric resident ID
function generateResidentId()
{
    return time() . rand(1000, 9999); // Combines current timestamp with a random 4-digit number
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $lastName = $_POST['last_name'] ?? '';
    $firstName = $_POST['given_name'] ?? '';
    $middleName = $_POST['middle_name'] ?? '';
    $homeAddress = $_POST['address'] ?? '';
    $email = $_POST['Email'] ?? '';
    $contactNum = $_POST['Contact_number'] ?? '';
    $birthDate = $_POST['birth_date'] ?? '';

    // Validate required fields
    if (!$lastName || !$firstName || !$homeAddress || !$email || !$contactNum || !$birthDate) {
        die('All fields are required!');
    }

    // Generate a numeric resident ID
    $residentId = generateResidentId();

    // Auto-generate registration and account creation dates in ISO-8601 format with Asia/Taipei timezone
    $timezone = new DateTimeZone('Asia/Taipei'); // Specify the timezone
    $residentRegisteredDate = (new DateTime('now', $timezone))->format('Y-m-d\TH:i:sP');
    $residentAccountCreated = (new DateTime('now', $timezone))->format('Y-m-d\TH:i:sP');

    // Prepare data for DynamoDB
    $item = [
        'TableName' => 'bms_residents_portal_resident_records',
        'Item' => [
            'resident_id' => ['N' => (string)$residentId], // Numeric resident_id
            'resident_first_name' => ['S' => $firstName],
            'resident_middle_name' => ['S' => $middleName],
            'resident_last_name' => ['S' => $lastName],
            'resident_home_address' => ['S' => $homeAddress],
            'resident_email' => ['S' => $email],
            'resident_contact_number' => ['S' => $contactNum],
            'resident_birthdate' => ['S' => $birthDate], // Assumes input is valid (format validation optional)
            'resident_registered_date' => ['S' => $residentRegisteredDate], // Auto-generated
            'resident_account_created' => ['S' => $residentAccountCreated], // Auto-generated
        ],
    ];

    try {
        // Insert item into DynamoDB
        $result = $dynamoDb->putItem($item);
        header('Location: validate-register.php'); // Redirect to success page after successful registration
        exit();
    } catch (DynamoDbException $e) {
        echo "Unable to register. Error: " . $e->getMessage();
    }
}
