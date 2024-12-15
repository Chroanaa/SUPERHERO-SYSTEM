<?php
session_start();
require_once '../../vendor/autoload.php'; // Include Composer's autoloader
require_once '../../controllers/db_connection.php'; // Ensure this points to your DB connection

// Initialize the Google Client
$client = new Google\Client();
$client->setAuthConfig('google-gmail-api.json'); // Path to your credentials file
$client->setRedirectUri('http://localhost:3000/callback.php'); // Set your redirect URI
$client->addScope(Google\Service\Gmail::GMAIL_SEND);

// Handle OAuth callback
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        // Access token is received, save it to the database
        $accessToken = $token['access_token'];
        $refreshToken = $token['refresh_token'];
        $expiresAt = date('Y-m-d H:i:s', time() + $token['expires_in']);

        // Assuming you have the user ID in session or passed via query
        $userId = $_SESSION['user_id']; // or however you manage user sessions

        // Store the token in the database
        $db = getDatabaseConnection('bms_account_portal'); // Use your actual DB name
        $stmt = $db->prepare("INSERT INTO google_access_tokens (user_id, access_token, refresh_token, expires_at) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $accessToken, $refreshToken, $expiresAt]);

        // Redirect to success or another page
        header('Location: success_page.php');
        exit();
    } else {
        // Handle error
        echo 'Error fetching access token: ' . $token['error'];
    }
} else {
    // No code parameter, handle the error
    echo 'No code provided in the callback.';
}
?>
