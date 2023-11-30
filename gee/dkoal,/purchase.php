<?php
// Establish a database connection using PDO
$dsn = 'mysql:host=localhost;dbname=multi_bussines_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
// Assume you have a connection to the database established

// Get the selected products from the POST request
$selectedProducts = $_POST['selectedProducts'];

// Start a transaction
$pdo->beginTransaction();

try {
    // Insert sale into the 'sales' table
    $sqlSale = "INSERT INTO sales (branch, sales, sale_date) VALUES (:branch, :sales, NOW())";
    $stmtSale = $pdo->prepare($sqlSale);

    // Loop through selected products and update 'products' and 'top_product' tables
    foreach ($selectedProducts as $product) {
        // Update 'products' table - decrease quantity
        $sqlUpdateQuantity = "UPDATE products SET quantity = quantity - :quantity WHERE product_id = :productId";
        $stmtUpdateQuantity = $pdo->prepare($sqlUpdateQuantity);
        $stmtUpdateQuantity->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtUpdateQuantity->bindValue(':productId', $product['productId'], PDO::PARAM_INT);
        $stmtUpdateQuantity->execute();

        // Insert into 'top_product' table
        $sqlTopProduct = "INSERT INTO top_product (branch, product_name, quantity_sold) VALUES (:branch, :productName, :quantity)";
        $stmtTopProduct = $pdo->prepare($sqlTopProduct);
        $stmtTopProduct->bindValue(':branch', $product['branch'], PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':productName', $product['productName'], PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtTopProduct->execute();
    }

    // Calculate total sales
    $totalSales = array_sum(array_column($selectedProducts, 'quantity'));

    // Insert into 'sales' table
    $stmtSale->bindValue(':branch', $selectedProducts[0]['branch'], PDO::PARAM_STR);
    $stmtSale->bindValue(':sales', $totalSales, PDO::PARAM_INT);
    $stmtSale->execute();

    // Commit the transaction
    $pdo->commit();

    // Send a success response
    echo "Success";
} catch (Exception $e) {
    // Rollback the transaction in case of an error
    $pdo->rollBack();
    // Handle the exception or log it
    echo "Error: " . $e->getMessage();
}
?>
