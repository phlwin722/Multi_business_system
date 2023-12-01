<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'multi_bussines_system';
$con = mysqli_connect($server, $user, $pass, $dbname);

if (isset($_POST['selectedBranch'])) {
    $selectedBranch = $_POST['selectedBranch'];
    if ($selectedBranch === 'allproducts') {
        $query = "SELECT * FROM product";
    } else {
        $query = "SELECT * FROM product WHERE Branch = ?";
    }

    $statement = $con->prepare($query);
    
    if ($selectedBranch !== 'allproducts') {
        $statement->bind_param('s', $selectedBranch);
    }

    $statement->execute();

    $result = $statement->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            // Output product data
            echo "<tr>
                     <td class='user_id'>$row[Product_code]</td>
                     <td>$row[Product_name]</td>
                     <td>$row[Price]</td>
                     <td>$row[Quantity]</td>
                     <td>$row[Branch]</td>
                     <td>
                         <a href='#' class='btn btn-success btn-sm edit-data'><i class='fa-solid fa-pen-to-square' style='color: #ffffff;'></i></a>
                         <a href='#' class='btn btn-danger btn-sm delete-data'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a>
                     </td>
                 </tr>";
        }
    }
}

$con->close();
?>
