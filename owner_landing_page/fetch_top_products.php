<?php
$host = "localhost";
$dbname = "multi_bussines_system";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the selected business from AJAX POST data
    $selectedBusiness = $_POST['business'];

    // SQL query with WHERE clause to filter by selected business
    $query = "SELECT branch, product_name, SUM(quantity_sold) AS total_quantity_sold FROM top_product WHERE branch = :business GROUP BY branch, product_name";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':business', $selectedBusiness, PDO::PARAM_STR);
    $statement->execute();

    // Fetch all rows
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $row) {
            ?>
            <tr>
                <td class="user_id"><?= $row['branch']; ?></td>
                <td><?= $row['product_name']; ?></td>
                <td><?= $row['total_quantity_sold']; ?></td>
            </tr>
            <?php
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$pdo = null;
?>
