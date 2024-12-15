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

// Configure DynamoDB client
$dynamoDb = new DynamoDbClient([
    'region' => $_ENV['AWS_REGION'],
    'version' => 'latest',
    'credentials' => [
        'key' => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
    ],
]);

// Define table name
$tableName = 'bms_bpso_portal_complaint_notification_logs';

// Handle "Clear All" request
if (isset($_POST['clear_all'])) {
    try {
        // Scan the table to get all keys
        $items = [];
        $response = $dynamoDb->scan([
            'TableName' => $tableName,
            'AttributesToGet' => ['notify_message', 'notify_bpso_case_number'],
        ]);
        if (isset($response['Items'])) {
            foreach ($response['Items'] as $item) {
                $items[] = [
                    'DeleteRequest' => [
                        'Key' => [
                            'notify_message' => $item['notify_message'],
                            'notify_bpso_case_number' => $item['notify_bpso_case_number'],
                        ],
                    ],
                ];
            }
        }

        // Batch delete items in chunks (25 at a time)
        $chunks = array_chunk($items, 25);
        foreach ($chunks as $chunk) {
            $dynamoDb->batchWriteItem([
                'RequestItems' => [
                    $tableName => $chunk,
                ],
            ]);
        }

        $_SESSION['success'] = 'All notifications cleared successfully!';
    } catch (Aws\Exception\AwsException $e) {
        $_SESSION['error'] = 'Error clearing notifications: ' . $e->getMessage();
    }

    header("Location: notification.php");
    exit();
}

// Fetch notifications
$response = $dynamoDb->scan(['TableName' => $tableName]);
$notifications = $response['Items'] ?? [];
$notificationCount = count($notifications);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user! - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Complaint main/bpso.css">
    <meta property="og:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <header class="header"></header>

        <!-- notifications for bpso -->

        <div class="main-content">
            <div class="welcome-message">
                <div class="d-flex align-items-center justify-content-between">
                    <div id="welcome-header">
                        <h2>NOTIFICATIONS (<?php echo $notificationCount; ?> unread)</h2>
                    </div>
                    <div id="notify-btns">
                        <form method="POST" style="display: inline;">
                            <button type="submit" name="clear_all" class="btn btn-secondary me-2">
                                Clear All
                            </button>
                        </form>
                        <button type="button" class="btn btn-danger me-2" onclick="location.reload();">
                            <i class="fa-solid fa-rotate-right"></i> Reload
                        </button>
                    </div>
                </div>
            </div>

            <div class="auth-tab-container">
                <div class="auth-divide">
                    <aside class="notifications-container" style="height: 400px; overflow-y: auto;">
                        <?php
                        if ($notificationCount > 0):
                            // Sort notifications by timestamp (assuming `complaint_case_added` is a valid timestamp)
                            usort($notifications, function ($a, $b) {
                                $timeA = strtotime($a['complaint_case_added']['S'] ?? ''); // Assuming the timestamp is in `complaint_case_added`
                                $timeB = strtotime($b['complaint_case_added']['S'] ?? '');
                                return $timeB - $timeA; // Sort in descending order (newest first)
                            });

                            foreach ($notifications as $notification):
                        ?>
                                <div class="alert alert-primary" role="alert">
                                    <i class="fa-solid fa-circle-info me-2"></i>
                                    <?php echo htmlspecialchars($notification['notify_message']['S'] ?? ''); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-secondary" role="alert">
                                <i class="fa-solid fa-circle-info me-2"></i>
                                No new notifications.
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>

        </div>

        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Added modal-dialog-centered here -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signOutModalLabel">Confirm Sign Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to sign out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmSignOutBtn" data-bs-dismiss="modal">Sign
                            Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../sidebar.js" type="module"></script>
</body>

</html>