<?php
// Include database connection
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $quantitySold = $_POST["quantitySold"];

    // Update quantity in "products" table
    $updateQuery = "UPDATE products SET Quantity = Quantity - ? WHERE ProductID = ?";
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("ss", $quantitySold, $productId);

    if ($stmt->execute()) {
        echo "Quantity updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
