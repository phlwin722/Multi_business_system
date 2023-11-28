<?php
// Include database connection
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalSales = $_POST["totalSales"];
    $date = date("Y-m-d");

    // Insert into "salee" table
    $insertQuery = "INSERT INTO salee (Branch, Sales, Date) VALUES (?, ?, ?)";
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
