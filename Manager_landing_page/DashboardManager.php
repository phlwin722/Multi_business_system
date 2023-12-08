<?php
session_start();
 $branch = $_SESSION["branch"];
?>
<?php 
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="DashboardManager.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Dashboard - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="DashboardManager.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
                                         <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
              
        </div>

        <div class="sidenav" id="a">
          <?php 
           $middlename = $_SESSION['middlename'];
            $lastname = $_SESSION['lastname'];
            $branch = $_SESSION ['branch'];
            $fname = $_SESSION ["fname"];
             $position = $_SESSION['position'];
          ?>
            <div class="companyname"> <?php echo $branch?> </div>
            <div class="owner">
              <h6>  <?php echo $fname ." ". $middlename ." ". $lastname ?> </h6>
              <h6><?php echo $position;?></h6>
            </div >
                <a href="DashboardManager.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SalesManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="ProductManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="StaffAcctManager.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Staff</a>
                  <a href="/Multi_business_system/landingpage/logout.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
      </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Dashboard</div>
                    </div>
                 
                    <div class="busin-right">
      <!------------------------>
      <?php
                            
                            $host = "localhost";
                            $dbname = "multi_bussines_system";
                            $username = "root";
                            $password = "";

                            try {
                                // Create a PDO instance
                                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                
                                // Set the PDO error mode to exception
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // Count the number of records where Position is "Staff"
                                $stmt = $pdo->prepare("SELECT COUNT(*) FROM employee WHERE Branch = '$branch' AND Position = 'Staff'");
                                $stmt->execute();
                                $staffCount = $stmt->fetchColumn();
                              
                                   // Count the number of records where pro dcuct  is detected
                                   $stmt = $pdo->prepare("SELECT COUNT(*) FROM product WHERE Branch = '$branch'");
                                   $stmt->execute();
                                   $productCount = $stmt->fetchColumn();
  
                                // Close the database connection
                                $pdo = null;
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                                // Handle the error as needed
                            }
                            ?>
                    <!------------------------->
          <div class="postttt">
          <div class="Stafff postt">
          <div class="a"><i class="fa-solid s fa-user"></i></div>
          <div class="b">
          <label for=""><?php echo $staffCount; ?></label>
              <br>
              <label for="">Staff</label>
          </div>
        </div>
        <div class="Productt postt">
          <div class="a"><i class="fa-solid s fa-cart-shopping"></i></div>
            <div class="b">
              <label for=""><?php echo $productCount; ?></label>
              <br>
              <label for="">Product</label>
            </div>
        </div>
        
        </div>
    <?php include('header.php'); ?> 
                        <!------------------------------top sale product---------------------------->
                        <div class="Topsale" id="scrollableDiv">
                        <label class="topprod">Top Product</label>
                    
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
                                    $query = "SELECT branch, product_name, SUM(quantity_sold) AS total_quantity_sold FROM top_product WHERE branch = '$branch' GROUP BY branch, product_name ORDER BY total_quantity_sold DESC";
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
 <!--------------------------------------sales----------------------------------------------------------->
      <!--sales-->
      <div class="sales" id="scrollableDiv">
    <label class="topprod">Sales</label>
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
                    $query = "SELECT branch, SUM(sales) AS total_sales, sale_date FROM sales WHERE branch = '$branch' GROUP BY branch, sale_date ORDER BY sale_date DESC";
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

      <!--sales-->

 </div>



      <!--bootstarp js-->
      <?php include('footer.php');?>

   
                        </div>
                    </div>
                    </div>
            </div>
          </div>
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
</script>
            
    </body>
</html>