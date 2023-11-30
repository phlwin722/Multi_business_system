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

$productId = $_POST['productId'];
$sql = "SELECT * FROM products WHERE product_id = :productId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<tr>
        <td class="product-id">' . $product['product_id'] . '</td>
        <td class="product-name">' . $product['product_name'] . '</td>
        <td class="price">' . $product['price'] . '</td>
        <td class="quantity"><input type="number" value="1" min="1"></td>
        <td class="branch">' . $product['branch'] . '</td>
        <td class="total-price">' . $product['price'] . '</td>
        <td><button class="remove-product">Remove</button></td>
    </tr>';
?>
