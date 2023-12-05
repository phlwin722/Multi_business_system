<?php
 session_start();
 ?>

<?php 
  $fname = $_SESSION ["ffname"];
  $lname = $_SESSION ["lname"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Ownersale.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Sales - B-MO</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="Ownersale.js" defer></script>
    <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>

<body>
    <div class="left">
    <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
            <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="Myacctowner.php" target="_top">My account</a>
            </div>
        </div>
    </div>

    <div class="sidenav" id="a">
        <div class="companyname"><?php echo $fname ." ". $lname?></div>
        <div class="owner">Owner</div>
        <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
        <a href="Ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
        <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
        <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
        <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
        <a href="Settings.php" target="_top" class="nav"><i class="fa-solid fa-gear" style="color: #fcfcfc;"></i> Settings</a>
        <a href="/Multi_business_system/landingpage/logout.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
    </div>

    <div class="main" id="a">
        <div class="frame" src="" name="iframe">
            <div class="addbusines">
                <div class="product-top">Sales</div>
            </div>
            <div class="busin-right">
                <?php include('header.php'); ?>
                <!---------------------------top sale------------------------------------------------->
                <div class="Topsale" id="scrollableDiv">
                    <label class="topprod">Top Product</label>
                    <select class="filter_product">
                        <option value="">All </option>
                        <!--to get data connect of business branch-->
                        <?php
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $dbname = 'multi_bussines_system';

                        $con = mysqli_connect($server, $user, $pass, $dbname);
                        $category = mysqli_query($con, 'SELECT * FROM business');
                        while ($c = mysqli_fetch_array($category)) {
                        ?>
                            <option value="<?php echo $c['Business_name'] ?>"><?php echo $c['Business_name'] ?></option>
                        <?php }
                        $con->close(); ?>
                    </select>

                    <table class="table table-bordered table-hover" id="topProductTable">
                        <thead>
                            <tr>
                                <th scope="col">Branch</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $host = "localhost";
                            $dbname = "multi_bussines_system";
                            $username = "root";
                            $password = "";

                            try {
                                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // SQL query with GROUP BY and SUM
                                $query = "SELECT branch, product_name, SUM(quantity_sold) AS total_quantity_sold FROM top_product GROUP BY branch, product_name ORDER BY total_quantity_sold DESC";
                                $statement = $pdo->prepare($query);
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
                        </tbody>
                    </table>
                </div>
                <!---------------------------top sale product------------------------------------------------->

                <!--------------------------------------------------------sales------------------------------------->
                <div class="sales" id="scrollableDiv">
    <label class="topprod">Sales</label>
    <select class="filter_product">
                        <option value="">All </option>
                        <!--to get data connect of business branch-->
                        <?php
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $dbname = 'multi_bussines_system';

                        $con = mysqli_connect($server, $user, $pass, $dbname);
                        $category = mysqli_query($con, 'SELECT * FROM business');
                        while ($c = mysqli_fetch_array($category)) {
                        ?>
                            <option value="<?php echo $c['Business_name'] ?>"><?php echo $c['Business_name'] ?></option>
                        <?php }
                        $con->close(); ?>
                    </select>
    <table class="customers">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Branch</th>
                    <th scope="col">Sales</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $dbname = "multi_bussines_system";
                $username = "root";
                $password = "";

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Fetch total sales for each branch on a particular date
                    $query = "SELECT branch, SUM(sales) AS total_sales, sale_date FROM sales GROUP BY branch, sale_date ORDER BY sale_date DESC";
                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    // Display the results
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
                ?>
            </tbody>
        </table>
    </table>
</div>
                    <!--------------------------------sales--=====0--------------------------------------->

                    <!-- <table class="customers">
                  <caption class="topsale">List Branch</caption>
                  <tr>
                    <th>Branch name</th>
                    <th>Location</th>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                </table>
               </div>-->
                    <!--topsale-->
                </div>

                <!--bootstrap js-->
                <?php include('footer.php'); ?>

                <script>
                    $(document).ready(function () {
                        // Get references to your scrollable div and the div to be synchronized
                        var scrollableDiv = $("#scrollableDiv");
                        var topSaleDiv = $("#topSale");

                        // Bind the scroll event on the scrollable div
                        scrollableDiv.on("scroll", function () {
                            // Set the scrollTop of the topSale div to match the scroll position of the scrollable div
                            topSaleDiv.scrollTop(scrollableDiv.scrollTop());
                        });
                    });

                    /////////////////////////select option on top product/////////////////////////////////////////////

                    $(document).ready(function () {
                        // Function to fetch top products based on selected business
                        function fetchTopProducts(selectedBusiness) {
                            $.ajax({
                                url: 'fetch_top_products.php',
                                method: 'POST',
                                data: {
                                    business: selectedBusiness
                                },
                                success: function (response) {
                                    $('#topProductTable tbody').html(response);
                                }
                            });
                        }
                        // Event listener for the filter_product select dropdown
                        $('.filter_product').change(function () {
                            var selectedBusiness = $(this).val();

                            // If the selected value is not empty, fetch and update top products
                            if (selectedBusiness !== "") {
                                fetchTopProducts(selectedBusiness);
                            } else {
                                // If the selected value is empty, show all top products
                                fetchTopProducts('All');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>
