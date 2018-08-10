<?php

require_once __DIR__ . '/dbConnector.php';

$conn = new dbConnector("localhost", "root", "root", "pickpocket");

try {
    $conn->connect();
} catch (Exception $e) {
    die('Could not connect to database: ' . $e->getMessage());
}
