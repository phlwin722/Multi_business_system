<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="ProductManager.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Home</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="ProductManager.js" defer></script>
        
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
                   <a href="ManagerDashboard.php" class="nav" target="_top" ><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SaleManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="ProductManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="staffacct.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Staff</a>
                  <a href="/Sad-Activity/landingpage/landingpage.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Products</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                            <div class="business-selection">Business name </div>

                            <div class="search-container">
                                <input type="text" class="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                            </div>

                         </div>
                         
                          <!-- Trigger/Open The Modal -->
                               <button class="new"  id="myBtn"><i class="fa-solid fa-plus"></i> New</button>
            
                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="container1">
                                        <div class="add-product">Add Product</div>
                                   <!--     <img class="addpicture" id="imagePreview" src="/picture/dropimage.png" alt=""  > -->
                                      <div class="container1-1">
                                            <form action="">
                                                <label for="" class="small">Product of Code </label>
                                                <input type="text" name="" class="nameofproduct" placeholder="Product Code">
                                                <br>
                                                <label for="" class="small">Name of Product </label>
                                                <input type="text" name="" class="nameofproduct" placeholder="Name Product">
                                                <br>
                                                <label for="" class="small">Price of product: </label>
                                                <input type="text" name="" class="nameofproduct" placeholder="Price product">
                                             <!--    <label for="fileInput" class="labelchoosefile">Choose File</label>
                                                <input  class="file" type="file" id="fileInput">  -->
                                                <label for="">Quantity: </label>
                                                <input class="quantity" type="number">
                                               <br>
                                              <button class="upload">Upload</button>
                                            </form>
                                      </div>
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