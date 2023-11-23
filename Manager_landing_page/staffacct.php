<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="staffacct.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Home</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="staffacct.js" defer></script>
        
    </head>
    <body>
        <div class="left">
        <img src="/Sad-Activity/picture/logo.png" class="move" style="width: 30px;margin-top: 10px;margin-left: 20px;" alt="">
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
                <div class="owner">Manager</div >
                   <a href="ManagerDashboard.php" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SaleManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="ProductManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="staffacct.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Staff</a>
                  <a href="/Sad-Activity/landingpage/landingpage.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Staff</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                            
                            <div class="business-selection">Business name </div>

                            <div class="search-container">
                                <input type="search" class="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                            </div>

                         </div>
                         
                          <!-- Trigger/Open The Modal -->
                               <button class="new"  id="myBtn"><i class="fa-solid fa-plus"></i> New</button>
            
                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h3>New Staff</h3>
                                    <div class="container1">
                                            <form action="">
                                                <Label for="id">ID</Label>
                                                <input type="text" class="cc" id="id">
                                    
                                                <Label for="lastname">Last Name</Label>
                                                <input type="text" class="cc" id="lastname">
                                               
                                                <Label for="firstname">First Name</Label>
                                                <input type="text" class="cc" id="firstname">

                                                <Label for="middlename">Middle Name</Label>
                                                <input type="text" class="cc" id="middlename">

                                                <Label for="username">Username</Label>
                                                <input type="text" class="cc" id="username">
                                           
                                                <Label for="">Password</Label>
                                                <input type="text" class="cc">
                                        
                                                <label for="">Branch Name</label>
                                                <input type="text" class="cc" readonly >
                                                <label for=""> Position</label>
                                                <input type="text" class="cc" readonly placeholder="Staff">
                                                  <input class="sub" type="submit" value="Save ">
                                            
                                            </form>
                                   </div>
                                </div>
                    </div>
                    <div class="List_of_product">
                        <p>List of Product</p>
                        <div class="product">
                            hi   
                        </div>
            </div>
          </div>
    </body>
</html>