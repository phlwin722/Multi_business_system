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
$pdo->beginTransaction();

try {
    $sqlSale = "INSERT INTO salee (branch, sales, sale_date) VALUES (:branch, :sales, NOW())";
    $stmtSale = $pdo->prepare($sqlSale);

    foreach ($selectedProducts as $product) {
        $sqlUpdateQuantity = "UPDATE products SET quantity = quantity - :quantity WHERE product_id = :productId";
        $stmtUpdateQuantity = $pdo->prepare($sqlUpdateQuantity);
        $stmtUpdateQuantity->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtUpdateQuantity->bindValue(':productId', $product['productId'], PDO::PARAM_INT);
        $stmtUpdateQuantity->execute();

        $sqlTopProduct = "INSERT INTO top_product (branch, product_name, quantity_sold) VALUES (:branch, :productName, :quantity)";
        $stmtTopProduct = $pdo->prepare($sqlTopProduct);
        $stmtTopProduct->bindValue(':branch', $product['branch'], PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':productName', $product['productName'], PDO::PARAM_STR);
        $stmtTopProduct->bindValue(':quantity', $product['quantity'], PDO::PARAM_INT);
        $stmtTopProduct->execute();
    }

    $totalSales = array_sum(array_column($selectedProducts, 'quantity'));
    $stmtSale->bindValue(':branch', $selectedProducts[0]['branch'], PDO::PARAM_STR);
    $stmtSale->bindValue(':sales', $totalSales, PDO::PARAM_INT);
    $stmtSale->execute();

    $pdo->commit();

    echo "Success";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
