<?php
// Include database connection
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalSales = $_POST["totalSales"];
    $salesData = json_decode($_POST["salesData"], true);
    $date = date("Y-m-d");

    // Insert into "salee" table
    $insertQuery = "INSERT INTO salee (Branch, ProductID, ProductName, QuantitySold, Sales, Date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssssss", $branch, $productId, $productName, $quantitySold, $totalSales, $date);

    foreach ($salesData as $data) {
        $branch = $data['branch'];
        $productId = $data['productId'];
        $productName = $data['productName'];
        $quantitySold = $data['quantitySold'];

        $stmt->execute();
    }

    if ($stmt->execute()) {
        echo "Sales saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
