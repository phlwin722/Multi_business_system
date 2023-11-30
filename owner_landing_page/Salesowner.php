<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Salesowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Sales - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Dashboardowner.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
                                         <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" style="width: 30px;position:absolute; top:10px; left:20px;" alt="">
             <div class="Company">B-MO </div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacct.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Shirly Bansil</div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SalesManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Multi_business_system/landingpage/landingpage.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Sales</div>
                    </div>
                 
                    <?php include('header.php'); ?> 

                    <div class="busin-right">
                
       <!--top sale-->
      <div class="Topsale">
        <label class="topsaleproduct">Top Sales Product</label>

        <Select class="filter_product">
          <option value="">All </option>
          <!--to get data conect of business branch-->
          <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'multi_bussines_system';

            $con = mysqli_connect($server, $user, $pass,$dbname);
            $category = mysqli_query($con,'SELECT * FROM business');
            while ($c = mysqli_fetch_array($category)) {
          ?>
          <option value="<?php echo $c['Business_name']?>"><?php echo $c ['Business_name']?></option>  
          <?php }  $con->close();?>
      </Select> 

        <table class="topproduct">
           <tr>
            <th>Branch</th>
            <th>Product name</th>
            <th>Quantity</th>
          </tr>
          <?php 
                $host = "localhost";
                $dbname = "multi_bussines_system";
                $username = "root";
                $password = "";

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // SQL query with GROUP BY and SUM
                    $query = "SELECT branch, product_name, SUM(quantity_sold) AS total_quantity_sold FROM top_product GROUP BY branch, product_name";
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
        </table>
      </div>
      <!--top sale-->
        
      <!--sales-->
      <div class="sales">
      <label class="topsale">Sales</label>
        <table class="customers">
          <Select class="filter_sale">
            <option value="">Daily</option>
            <option value="">Month</option>
            <option value="">Year</option>
        </Select>
          <tr>
            <th>Branch</th>
            <th>Total Sale</th>
          </tr>
          <tr>
            <td></td>
          </tr>
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
    </body>
</html>