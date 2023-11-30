<?php
// Database connection details
$db_host = 'your_host';
$db_user = 'your_user';
$db_password = 'your_password';
$db_name = 'product_database';

// Create a database connection
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
