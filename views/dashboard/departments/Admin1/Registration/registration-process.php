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
    $civilStatus = $_POST['civil_status'] ?? ''; // Civil status field
    $residentType = $_POST['resident_type'] ?? ''; // Resident type (Resident / Non-Resident)
    $sitio = $_POST['sitio'] ?? null; // Optional Sitio
    $street = $_POST['street'] ?? null; // Optional Street address for Resident
    $birthPlace = $_POST['birth_place'] ?? ''; // Optional Birthplace
    $sex = $_POST['sex'] ?? ''; // Optional Sex
    $bloodType = $_POST['blood_type'] ?? ''; // Optional Blood Type
    $yearOfStay = $_POST['year_of_stay'] ?? null; // Optional Year of Stay

    // Ensure year_of_stay is a valid numeric value if provided
    if ($yearOfStay !== null && $yearOfStay !== '' && !is_numeric($yearOfStay)) {
        die("Year of Stay must be a numeric value.");
    }
    
    // $yearOfStay = $yearOfStay !== null ? (int)$yearOfStay : null; // Convert to integer if valid
    $yearOfStay = $yearOfStay !== null && $yearOfStay !== '' ? (int)$yearOfStay : null; // Convert to integer if valid

    // Validate required fields (but leave Sitio and Street as optional)
    if (!$lastName || !$firstName || !$email || !$contactNum || !$birthDate || !$residentType) {
        die('All required fields must be filled!');
    }

    // Convert the birthDate to ISO-8601 format (if it's not already in that format)
    $birthDate = (new DateTime($birthDate))->format(DateTime::ATOM); // ISO 8601 format (e.g., 2024-12-01T15:30:00+00:00)

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
            'resident_id' => ['N' => (string)$residentId],
            'first_name' => ['S' => $firstName],
            'middle_name' => ['S' => $middleName],
            'last_name' => ['S' => $lastName],
            'address' => ['S' => $homeAddress],
            'email' => ['S' => $email],
            'contact_number' => ['S' => $contactNum],
            'birthdate' => ['S' => $birthDate], // Now in ISO-8601 format
            'resident_registered_date' => ['S' => $residentRegisteredDate],
            'resident_account_created' => ['S' => $residentAccountCreated],
            'resident_type' => ['S' => $residentType],
            'civil_status' => ['S' => $civilStatus],
            'birth_place' => $birthPlace ? ['S' => $birthPlace] : ['NULL' => true],
            'sex' => $sex ? ['S' => $sex] : ['NULL' => true],
            'blood_type' => $bloodType ? ['S' => $bloodType] : ['NULL' => true],
        ],
    ];

    // Add Year of Stay only if provided (optional)
    if ($yearOfStay !== null) {
        $item['Item']['year_of_stay'] = ['N' => (string)$yearOfStay];
    }

    // Add Sitio and Street if available
    if ($sitio) {
        $item['Item']['sitio'] = ['S' => $sitio];
    }

    if ($street) {
        $item['Item']['street'] = ['S' => $street];
    }

    try {
        // Insert item into DynamoDB
        $result = $dynamoDb->putItem($item);
        header('Location: validate-register.php'); // Redirect to success page after successful registration
        exit();
    } catch (DynamoDbException $e) {
        echo "Unable to register. Error: " . $e->getMessage();
    }
}
?>