<?php

// Start a session
session_start();

// Unset session variables and destroy the session
session_unset();
session_destroy();

// Define a base URL dynamically
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") 
            . "://{$_SERVER['HTTP_HOST']}" 
            . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

// Redirect to the sign-in page using the base URL
header("Location: " . $base_url . "index.php");
exit();
