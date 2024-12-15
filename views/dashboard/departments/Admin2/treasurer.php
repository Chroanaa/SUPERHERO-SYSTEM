<?php
session_start();
require_once '../../../../vendor/autoload.php'; // Include Composer autoloader

use Aws\DynamoDb\DynamoDbClient;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../');
$dotenv->load();

// Get the AWS credentials from the environment
$awsAccessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$awsSecretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$awsRegion = $_ENV['AWS_REGION'];
$dynamoDbClient = new DynamoDbClient([
    'region' => $awsRegion,
    'version' => 'latest',
    'credentials' => [
        'key' => $awsAccessKeyId,
        'secret' => $awsSecretAccessKey,
    ]
]);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $department = $_POST['department'];
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $response = $dynamoDbClient->putItem([
        'TableName' => 'bms_treasurers_portal_records',
        'Item' => [
            'department' => ['S' => $department],
             'time_created' => ['S' => date('Y-m-d H:i:s')],
            'treasurer_id' => ['N' => $id],
            'amount' => ['N' => $amount],
            'date_created' => ['S' => date('Y-m-d')],
            'description' => ['S' => $description]
        ]
    ]);
    header('Location:./Expense.php ');
}


?>