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

// Get table names
$complaintTableName = 'bms_bpso_portal_complaint_records';
$notificationTableName = 'bms_bpso_portal_complaint_notification_logs';
$complaintCopyForBADAC = 'bms_badac_portal_complaint_records';
$complaintCopyForBCPC = 'bms_bcpc_portal_complaint_records';

?>
