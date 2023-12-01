<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Myacctowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>My Account - B-Mo</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Myacctowner.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
       
    </head>
    <body>
        <div class="left">
        <img src="/Sad-Activity/picture/logo.png" class="move" style="width: 30px;margin-top: 10px;margin-left: 20px;" alt="">
            <div class="Company">B-MO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacctowner.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Shirly Bansil</div>
                <div class="owner">Manager</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Multi_business_system/landingpage/landingpage.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">My Account</div>
                    </div>
                 
                       <!--bootstarp js-->
                            <?php include('header.php');?>
                         
                    <div class="busin-right">
                        <div class="myprofile">
                            <img class="picture" src="/Multi_business_system/picture/no-image-icon-md.png" alt="">
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
                                       <label for="lastname">Lastname</label>
                                       <input type="text" class="user" id="lastname">
                                       
                                   </div>
                                    <div class="user-acct comname" >
                                       <label for="firstname">Firstname</label>
                                       <input type="text"  class="user" id="firstname">
                                    </div>
                                    <div class="user-acct middle" >
                                        <label for="mi">Middle Initial</label>
                                        <input type="text"  class="middlee" id="mi">
                                     </div>
                                     <div class="secret_quest">
                                        <label for="">Secret Question</label>
                                        <Select class="secret_questt">
                                            <option value="">What is your first pet name</option>
                                            <option value="">Who is your first love</option>
                                        </Select>
                                        <input type="text" class="userr" placeholder="">
                                     </div>
                                        <input class="submit-useracct" type="submit" value="Save Changes">
                                 </form>
                              </div>
                              
                              <div id="Change-Avatar" class="acctinfo" style="display:none" >
                               <img class="addpicture" id="imagePreview" src="/picture/dropimage.png" alt=""  >
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
                                        <label for="password_change">Current Password</label>
                                        <input type="password" class="password-change" id="password_change">
                                    </div>
                                    <div class="container-password">
                                        <label for="new_passwordchange">New Password</label>
                                        <input type="password" class="password-change" id="new_passwordchange">
                                    </div>
                                    <div class="container-password">
                                        <label for="re_typepassword">Re-tpye Password</label>
                                        <input type="password" class="password-change" id="re_typepassword">
                                        <input class="submit-useracct" type="submit" value="Save Changes">
                                    </div>
                                </form>
                              </div>
                        </div>
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