<?php 
session_start();

?>

<?php

$dsn = 'mysql:host=localhost;dbname=multi_bussines_system;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

$selectedProducts = $_POST['selectedProducts'];
$totalPrice = $_POST['totalPrice'];
$branch = $_SESSION["branche"];

$pdo->beginTransaction();

try {
    // Insert into sales table
    $sqlSale = "INSERT INTO sales (branch, sales, sale_date) VALUES (:branch, :sales, NOW())";
    $stmtSale = $pdo->prepare($sqlSale);
    $stmtSale->bindValue(':branch', $branch, PDO::PARAM_STR);
    $stmtSale->bindValue(':sales', $totalPrice, PDO::PARAM_INT);
    $stmtSale->execute();

    // Insert into top_product table
    foreach ($selectedProducts as $product) {
        $sqlTopProduct = "INSERT INTO top_product (branch, product_name, quantity_sold) VALUES (:branch, :productName, :quantity)";
        $stmtTopProduct = $pdo->prepare($sqlTopProduct);
        $stmtTopProduct->bindValue(':branch', $branch, PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':productName', $product['productName'], PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtTopProduct->execute();

        // Update product quantity
        $sqlUpdateQuantity = "UPDATE product SET Quantity = Quantity - :quantity WHERE Product_code = :productId";
        $stmtUpdateQuantity = $pdo->prepare($sqlUpdateQuantity);
        $stmtUpdateQuantity->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtUpdateQuantity->bindValue(':productId', $product['productId'], PDO::PARAM_INT);
        $stmtUpdateQuantity->execute();
    }

    $pdo->commit();

    echo "Success";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
