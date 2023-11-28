<?php
// Include database connection
// Database connection details
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'multi_bussines_system';

// Create a database connection
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalSales = $_POST["totalSales"]; // Correct the key here

    $date = date("Y-m-d");

    // Insert into "salee" table
    $insertQuery = "INSERT INTO sales (Branch, Sales, Date) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("sss", $branch, $totalSales, $date);

    // Replace 'your_branch' with the actual branch value
    $branch = 'your_branch';

    if ($stmt->execute()) {
        echo "Sales saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
