<?php
// Database configurations
$databases = [
    'bms_account_portal' => [
        'host' => '127.0.0.1',
        'dbname' => 'bms_account_portal', // Specify the database name here
        'username' => 'root',
        'password' => '',
    ],
    'bms_main_portal' => [
        'host' => '127.0.0.1',
        'dbname' => 'bms_main_portal',
        'username' => 'root',
        'password' => '',
    ],
   'bms_bpso_portal' => [
        'host' => '127.0.0.1',
        'dbname' => 'bms_bpso_portal',
        'username' => 'root',
        'password' => ''
    ]
    // Add more databases as needed
];

/**
 * Get connections to all specified databases.
 *
 * @return array Associative array of PDO instances, keyed by database name.
 */
function getDatabaseConnections() {
    global $databases;
    $connections = [];

    foreach ($databases as $dbName => $config) {
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            $connections[$dbName] = $pdo; // Store the PDO instance with the key as database name
           
        } catch (PDOException $e) {
            echo("Database connection to {$dbName} failed: " . $e->getMessage());
        }
    }

    return $connections;
}

// Initialize connections to all databases
$databaseConnections = getDatabaseConnections();
$pdo = $databaseConnections['bms_bpso_portal']??null;
?>
