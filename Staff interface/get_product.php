<?php
session_start();

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
$branch = $_SESSION["branche"];

// Modify the SQL query to include the branch condition
$sql = "SELECT * FROM product WHERE Product_code = :productId AND Branch = :branch";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
$stmt->bindValue(':branch', $branch, PDO::PARAM_STR);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($product !== false) {
    echo '<tr>
       <td class="quantity"><input type="number" style="width:70px" value="1" min="1"></td>
        <td class="product-id">' . $product['Product_code'] . '</td>
        <td class="product-name">' . $product['Product_name'] . '</td>
        <td class="price">' . $product['Price'] . '</td>
        <td class="total-price">' . $product['Price'] . '</td>
        <td><button class="remove-product" style="border:none;background-color:transparent; color:red"><i class="fas fa-trash-alt"></i></button></td>
    </tr>';
} else {
    echo '<tr><td colspan="6">Product not found for the given ID and branch</td></tr>';
}
?>



<!DOCTYPE html>
<html>
    <head>
      <!-- Include Font Awesome for icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-dzp5FifRMTsI9NNyeGsqzVq36JF0axDOxI4JYv2ba/boM+dfV/Sj9kv7EktQOp6G" crossorigin="anonymous">

</head>
</html>