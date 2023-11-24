<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Dashboardowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Product</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="product.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
       
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" class="move" style="width: 30px;margin-top: 0px;margin-left: 20px;" alt="">
            <div class="Company">BUIMO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacct.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Dexter Jamero</div>
                <div class="owner">Owner</div >
                   <a href="ownerlandingpage.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Saleowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Sad-Activity/landingpage/landingpage.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Dashboard</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                         
                         </div>

                        <?php include('header.php'); ?> 


      <!--bootstarp js-->
      <?php include('footer.php');?>

   
                        </div>
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>