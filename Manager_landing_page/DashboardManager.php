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
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
                                         <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" style="width: 30px;position:absolute; top:10px; left:20px;" alt="">
                <div class="Company">B-MO</div>
              
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Shirly Bansil</div>
                <div class="owner">Manager</div >
                <a href="DashboardManager.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SalesManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="ProductManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="StaffAcctManager.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Staff</a>
                  <a href="/Multi_business_system/landingpage/landingpage.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
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
       <!--top sale-->
      <div class="Topsale">
        <label class="topproduct">Top Product</label>
      <table class="table table-bordered table-hover">          
          <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Product name</th>
              <th scope="col">Sold</th>
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
                 $query = " SELECT * FROM product";
                 $statement = $pdo->prepare($query);
                 $statement->execute();

                 // to desplay fetch all of data
                 $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                 if( $result){
                  foreach ($result as $row){
                      ?>
                      <tr>
                          <td class="user_id"><?= $row['Product_code'];?></td>
                          <td><?= $row['Product_name']?></td>
                          <td><?= $row['Price']?></td>
                          
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

      </div>

      <!--sales-->
      <div class="sales">
          <label class="topsale">Sale</label>
          <Select class="filter_sale">
            <option value="">Daily</option>
            <option value="">Month</option>
            <option value="">Year</option>
        </Select>
     
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