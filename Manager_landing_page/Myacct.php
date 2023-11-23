<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Myacct.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Home</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Myacct.js" defer></script>
        
    </head>
    <body>
        <div class="left">
        <img src="/Sad-Activity/picture/logo.png" class="move" style="width: 30px;margin-top: 10px;margin-left: 20px;" alt="">
            <div class="Company">BUIMO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacct.css" target="iframe">My account</a>
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
                    <div class="product-top">My account</div>
                    </div>
                 
                    <div class="busin-right">
                            <div class="myprofile">
                                <img class="picture" src="/picture/no-image-icon-md.png" alt="">
                                <h1>name</h1>
                                <h4>Owner</h4>
                            </div>
                            <div class="container-accountsetting">
                                <div class="w3-black">
                                    <button class="tabpane-button" onclick="myaccount('User-account')">User Account Info</button>
                                    <button class="tabpane-button avatar" onclick="myaccount('Change-Avatar')">Change Avatar</button>
                                    <button class="tabpane-button password" onclick="myaccount('Change-Password')">Change Password</button>
                                </div>
                                  
                                  <div id="User-account" class="acctinfo">
                                     <form action="">
                                        <div class="user-acct">
                                           <label for="">Username</label>
                                           <input type="text" class="user">
                                       </div>
                                        <div class="user-acct comname" >
                                           <label for="">Complete name</label>
                                           <input type="text" class="complete-name">
                                        </div>
                                            <input class="submit-useracct" type="submit" value="Save Changes">
                                     </form>
                                  </div>
                                  
                                  <div id="Change-Avatar" class="acctinfo" style="display:none" >
                                   <img class="addpicture" id="imagePreview" src="/Sad-Activity/picture/dropimage.png" alt=""  >
                                          <form action="">
                                            <label for="fileInput" class="labelchoosefile">Choose File</label>
                                            <input  class="file" type="file" id="fileInput">
                                             <br>
                                             <input class="submit-useracct" type="submit" value="Save Changes">
                                          </form>
                                          <div>NOTE! Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only</div>
                                  </div>
                                  
                                  <div id="Change-Password" class="acctinfo" style="display:none">
                                    <form action="">
                                        <div class="container-password">
                                            <label for="">Current Password</label>
                                            <input type="password" class="password-change">
                                        </div>
                                        <div class="container-password">
                                            <label for="">New Password</label>
                                            <input type="password" class="password-change">
                                        </div>
                                        <div class="container-password">
                                            <label for="">Re-tpye Password</label>
                                            <input type="password" class="password-change">
                                            <input class="submit-useracct" type="submit" value="Save Changes">
                                        </div>
                                    </form>
                                  </div>
                            </div>
                    </div>

            </div>
          </div>
    </body>
</html>