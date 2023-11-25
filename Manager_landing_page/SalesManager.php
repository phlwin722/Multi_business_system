<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="SalesManager.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Sales - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="SalesManager.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
                                         <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" style="width: 30px;position:absolute; top:10px; left:20px;" alt="">
             <div class="Company">B-MO </div>
              </div>
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
                    <div class="product-top">Sales</div>
                    </div>
                 
                    <?php include('header.php'); ?> 

                    <div class="busin-right">
       
       <!--top sale-->
      <div class="Topsale">
        <label class="topsaleproduct">Top Sales Product</label>

        <table class="topproduct">
           <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Branch</th>
            <th>Sold</th>
          </tr>
          <tr>
            <td></td>
          </tr>
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