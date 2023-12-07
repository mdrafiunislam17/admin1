<?php
// Define Base Url
define("BASE_URL", "http://localhost/project/admin/");

// Define Project Directory Path
define("PROJECT_DIR", dirname(__DIR__) . DIRECTORY_SEPARATOR);

// Database Config
define("DB_HOST", "localhost");
define("DB_NAME", "project1");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// Database Connection
try {
    $pdo = new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASSWORD);
} catch (Exception $error) {
    echo "Database connection failed: " . $error->getMessage();
    exit;
}

session_start();