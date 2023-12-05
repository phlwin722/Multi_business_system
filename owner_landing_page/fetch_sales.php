<?php
// Include your database connection file here

if (isset($_POST['branch'])) {
    $host = "localhost";
    $dbname = "multi_bussines_system";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $selectedBranch = $_POST['branch'];

        // SQL query with WHERE clause to filter by selected branch
        $query = ($selectedBranch === 'All')
            ? "SELECT branch, SUM(sales) AS total_sales, sale_date FROM sales GROUP BY branch, sale_date ORDER BY sale_date DESC"
            : "SELECT branch, SUM(sales) AS total_sales, sale_date FROM sales WHERE branch = :branch GROUP BY branch, sale_date ORDER BY sale_date DESC";

        $statement = $pdo->prepare($query);
        if ($selectedBranch !== 'All') {
            $statement->bindParam(':branch', $selectedBranch, PDO::PARAM_STR);
        }
        $statement->execute();

        // Fetch all rows
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                ?>
                <tr>
                    <td><?= $row['branch']; ?></td>
                    <td><?= $row['total_sales'] ?></td>
                    <td><?= $row['sale_date'] ?></td>
                </tr>
                <?php
            }
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $pdo = null;
}
?>
