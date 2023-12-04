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
       <link rel="stylesheet" href="myacctowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>My Account - B-Mo</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Myacctowner.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
     
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
            <div class="companyname"><?php echo $fname ." ". $lname?></div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                   <a href="Settings.php" target="_top" class="nav"><i class="fa-solid fa-gear" style="color: #fcfcfc;"></i> Setting</a>
                   <a href="/Multi_business_system/landingpage/logout.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
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
                            <?php 
                                $server = "localhost";
                                $user = "root";
                                $pass = "";
                                $dname ="multi_bussines_system";
 
                                $con = mysqli_connect($server, $user, $pass, $dname);
                                $category = mysqli_query($con,"SELECT * FROM owener_acct ORDER BY Username DESC" );
                                while ( $c = mysqli_fetch_array($category)){
                                    echo ' <img class="picture" src="data:image/jpeg;base64,'.base64_encode($c['Image']).'"/>';
                             ?>
                             <?php } $con->close()?>
                            <h1><?php echo $fname ." ". $lname?></h1>
                            <h4>Owner</h4>
                        </div>
                        <div class="container-accountsetting">
           
                            <div class="w3-black">
                                <button class="tabpane-button" onclick="myaccount('User-account')">User Account Info</button>
                                <button class="tabpane-button avatar" onclick="myaccount('Change-Avatar')">Change Avatar</button>
                                <button class="tabpane-button password" onclick="myaccount('Change-Password')">Change Password</button>
                            </div>

                              <div id="User-account" class="acctinfo">
                                 <form action="#" method="post">
                                    <div class="user-acct">
                                       <label for="lastname">Last name</label>

                                       <?php
                                                    $server = 'localhost';
                                                    $usner = 'root';
                                                    $pass= '';
                                                    $dbname = 'multi_bussines_system';
    
                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,"SELECT * FROM owener_acct ");
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                       <input type="text" name="lname" class="user" id="lastname" value="<?php  echo $c ['Last_name']?>">
                                       
                                   </div>
                                    <div class="user-acct comname" >
                                       <label for="firstname">First name</label>
                                       <input type="text" name="fname" class="user" value="<?php  echo $c ['First_name']?>" id="firstname">
                                    </div>
                                    <div class="user-acct middle" >
                                        <label for="mi">Middle Initial</label>
                                        <input type="text" name="mi"  class="middlee" value="<?php  echo $c ['Mi']?>" id="mi">
                                     </div>
                                     
                                     <div class="secret_quest">
                                        <label for="">Secret Question</label>
                                        <Select class="secret_questt" name="sec">
                                        <option hidden value="<?php  echo $c ['Secret_Question']?>"> <?php  echo $c ['Secret_Question']?></option>
                                            <option value="First pet name">First pet name</option>
                                            <option value="First pet name">First love</option>
                                            <option value="First pet name">Mothers Maiden Name</option>
                                        </Select>
                                        <input type="text" class="userr" name ="ans" placeholder=""  value="<?php  echo $c ['Ans_Sec_Question']?> ">
                                      
                                       
                                     </div>
                                     <div class="user-acct middle" >
                                      
                                        <input type="text" hidden name="usernameee"  class="middlee" value="<?php  echo $c ['Username']?>" id="mi">
                                     </div>
                                    
                                        <input class="submit-useracct" name="savechanges" type="submit" value="Save Changes">
                                 </form>
                              </div>
    
                              <div id="Change-Avatar" class="acctinfo" style="display:none" >
                            
                               <img class="addpicture" id="imagePreview" src="/Multi_business_system/picture/dropimage.png" alt=""  >
                                      <form action="#" method="post"enctype="multipart/form-data">
                                      <input type="text" name="we" hidden class="middlee" value="<?php  echo $c ['Username']?>" id="mi">
                           
                                        <label for="fileInput" class="labelchoosefile">Choose File</label>
                                        <input  class="file" name="image" type="file" id="fileInput">
                                         <br>
                                         <input class="submit-useracct" id="insert" name="insert"type="submit" value="Save Changes">
                                      </form>
                                      <div>NOTE! Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only</div>
                              </div>
                              
                              <div id="Change-Password" class="acctinfo" style="display:none">
                            <?php
                            ob_start();

                            //////////////////////////update info//////////////////////////////////////////
                            if (isset($_POST['savechanges'])) {
                                $fnamee = htmlspecialchars($_POST['fname']);
                                $lnamee = htmlspecialchars($_POST['lname']);
                                $mii = htmlspecialchars($_POST['mi']);
                                $sec = htmlspecialchars($_POST['sec']);
                                $ans = htmlspecialchars($_POST['ans']);
                                $userr = htmlspecialchars($_POST['usernameee']);
                            
                             
                                    // Database connection settings
                                    $host = "localhost";
                                    $dbname = "multi_bussines_system";
                                    $username = "root";
                                    $password = "";

                                    try {
                                        // Create a PDO instance
                                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                         $stmt = $pdo->prepare("UPDATE owener_acct SET Last_name=?, First_name=?, Mi=?, Secret_Question=?, Ans_Sec_Question=? WHERE Username=?");
                                         $stmt->execute([$lnamee, $fnamee, $mii, $sec, $ans, $userr]);
                                         echo'<script>alert("Successfull Edit")</script>';
                                         echo '<script>window.location.href = "/Multi_business_system/landingpage/logout.php";</script>';
                                            
                                         exit();
                                    }catch (Exception $e) {
                                        echo 'Not connected'.$e->getMessage();
                                    }
                                }                        

                            /////////////////////////////////////////////////////////////////////
                            /////////////// insert image //////////////////
                                        if (isset($_POST['insert'])){

                                            // Database connection settings
                                            $localhost = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbbname = "multi_bussines_system";

                                            $file = addslashes (file_get_contents($_FILES["image"]["tmp_name"]));
                                            $userrr = htmlspecialchars($_POST['we']);

                                            try {
                                                $pdo = new PDO("mysql:host=$localhost;dbname=$dbbname", $username, $password);
                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                // Prepare and execute the SQL query to insert image data
                                                $stmt = $pdo->prepare("UPDATE owener_acct SET Image=? WHERE Username=?");
                                                $stmt->execute([$file, $userrr]);
                                                echo'<script>alert("Successfull Uploaded")</script>';
                                                echo '<script>window.location.href = "/Multi_business_system/landingpage/logout.php";</script>';
                                             
                                            } catch (Exception $e) {
                                                echo $e->getMessage();
                                            }
                                    

                                        }

                                    ////////////////////////////////////////// change pass
                            if (isset($_POST['changepass'])){
                            $old = htmlspecialchars($_POST['old']);
                            $new = htmlspecialchars($_POST['new']);
                            $retype  = htmlspecialchars($_POST['re_type']);
                            $userr = htmlspecialchars($_POST['w']);
                            

                            $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");
                                $verify_username = mysqli_query($con,"SELECT * FROM owener_acct WHERE Password ='$old'");
                                if(mysqli_num_rows( $verify_username ) == 0) {
                                echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-danger" role="alert">
                                The please check the old password
                                <button style="margin-left:770px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                            </div>';
                                        $con -> close();
                                }else{
                                    /* this code not detect the existing id and username will be insert in database*/
                                    if ($new != $retype) {
                                        echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-danger" role="alert">
                                The new and re-type password are not same
                                <button style="margin-left:770px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                                    } else{
                                        $localhost = "localhost";
                                        $username = "root";
                                        $pass = "";
                                        $dbname = "multi_bussines_system";
                                    
                                            //connection database
                            try {
                                $pdo = new PDO ("mysql:host=$localhost;dbname=$dbname", $username, $pass);
                                // Set the PDO error mode to exception
                                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        
                                        // // Prepare and execute the SQL query to insert data
                                        $stmt = $pdo->prepare("UPDATE owener_acct SET Password= ? WHERE Username=?");
                                        $stmt->execute ([$new, $userr]);
                                        echo'<script>alert("Successfull Change")</script>';
                                        echo '<script>window.location.href = "/Multi_business_system/landingpage/logout.php";</script>';
                                       }
                            catch (PDOException $e){
                                echo "Not inserted". $e->getMessage();
                            }
                                    }  
                                }
                                
                            }
      // change pass
      ob_end_flush();
                            ?>
                                <form action="#" method="post">
                                <input type="text" name="w"  hidden class="middlee" value="<?php  echo $c ['Username']?>" id="mi">
                              
                                <div class="container-password">
                                    <label for="password_change">Current Password</label>
                                    <input type="password" name="old" class="password-change" id="password_change">
                                </div>
                                <div class="container-password">
                                    <label for="new_passwordchange">New Password</label>
                                    <input type="password" name="new" class="password-change" id="new_passwordchange">
                                </div>
                                <div class="container-password">
                                    <label for="re_typepassword">Re-type Password</label>
                                    <input type="password" name="re_type" class="password-change" id="re_typepassword">
                                    <input class="submit-useracct" name="changepass" type="submit" value="Save Changes">
                                </div>
                                    <?php }?>
                                </form>
                              </div>
                        </div>
                </div>
      <!--bootstarp js-->
      <?php include('footer.php');?>
            <script>
                   const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

                                        const appendAlert = (message, type) => {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = [
                                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                                `   <div>${message}</div>`,
                                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                '</div>'
                            ].join('');

                            alertPlaceholder.append(wrapper);
                        };

                    ///// image 
                    $(document).ready(function(){
                        $('#insert').click(function(){
                            var image_name =$ ('#fileInput').val();
                            var extension =$('#fileInput').val ().split('.').pop().toLowerCase();
                            if (jQuery.inArray(extension ,['gif','png','jpg','jpeg']) == -1){
                                alert('Invalid Image');
                                $('#fileInput').val ('');
                                return false;
                            }
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