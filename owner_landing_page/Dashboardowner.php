<?php
 session_start();
 ?>

<?php 
  $fname = $_SESSION ["ffname"];
  $lname = $_SESSION ["lname"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="ProductCssowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Dashboard - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script src="Dashboardowner.js" defer></script>
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
            <div class="companyname"><?php echo $fname ." ". $lname?> </div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Multi_business_system/landingpage/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Dashboard</div>
                    </div>
                 
                    <div class="busin-right">
                       <!--Calendar-->
     <div class="wrapper">
      <header>
        <p class="current-date">November 2023</p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days">
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>31</li>
          <li>1</li>
          <li>2</li>
          <li>3</li>
          <li>4</li>
          <li>5</li>
          <li>6</li>
          <li>7</li>
          <li>8</li>
          <li>9</li>
          <li>10</li>
          <li>11</li>
          <li>12</li>
          <li>13</li>
          <li>14</li>
          <li>15</li>
          <li>16</li>
          <li>17</li>
          <li>18</li>
          <li>19</li>
          <li>20</li>
          <li>21</li>
          <li>22</li>
          <li>23</li>
          <li>24</li>
          <li>25</li>
          <li>26</li>
          <li>27</li>
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>1</li>
        </ul>
      </div>
    </div>
    <!--Calendar-->
    <?php include('header.php'); ?> 
       <!---------------------------top sale product------------------------------------------------->
     <div class="Topsale" id="scrollableDiv">
    <caption>Top Product</caption>
    <table class="table table-bordered table-hover">          
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
      <caption class="topsale">Sales</caption>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th scope="col">Branch</th>
              <th scope="col">Sale</th>
              <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
              <?php 
               $host = "localhost";
               $dbname = "multi_bussines_system";
               $username = "root";
               $password = "";
            

              try{
                  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  // prepare and execute a query
                  $query = "SELECT branch, SUM(sales) AS total_sales, sale_date FROM sales GROUP BY branch, sale_date ORDER BY sale_date DESC";
                  $statement = $pdo->prepare($query);
                  $statement->execute();

                 // to desplay fetch all of data
                 $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                 if( $result){
                  foreach ($result as $row){
                      ?>
                      <tr>
                               <td><?= $row['branch']; ?></td>
                                <td><?= $row['total_sales'] ?></td>
                                <td><?= $row['sale_date'] ?></td>
                      </tr>
                      <?php
                  }
                 }

              }catch(PDOException $e){
                  echo $e->getMessage();
              }
              $pdo=null;
              ?>
            
          </tbody>
          
        </table>
       </div>
      <!--------------------------------sales--=====0--------------------------------------->
   <!--list business=========================================================-->

   <div class="list_business">
    <caption>List Branch</caption>
   <table class="table table-bordered table-hover">          
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Branch name</th>
                            <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             $host = "localhost";
                             $dbname = "multi_bussines_system";
                             $username = "root";
                             $password = "";
                          

                            try{
                                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                // prepare and execute a query
                               $query = " SELECT * FROM business";
                               $statement = $pdo->prepare($query);
                               $statement->execute();

                               // to desplay fetch all of data
                               $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                               if( $result){
                                foreach ($result as $row){
                                    ?>
                                    <tr>
                                        <td class="user_id"><?= $row['Business_ID'];?></td>

                                        <td><?= $row['Business_name']?></td>
                                        <td><?= $row['location']?></td>
                                    </tr>
                                    <?php
                                }
                               }

                            }catch(PDOException $e){
                                echo $e->getMessage();
                            }
                            $pdo=null;
                            ?>
                          
                        </tbody>
            
                      </div>
                    </table>
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



      <!--bootstarp js-->
      <?php include('footer.php');?>

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
                        </div>
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>