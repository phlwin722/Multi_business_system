<?php 
    session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="landingpage.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <script src="landigpage.js" defer></script>
        </head>
        <body>
            <div class="container1 ">
                <div class="welcome">Welcome</div>
                        
        <h1 class="hh">
        <a href="" class="typewrite" data-period="2000" data-type='[ "Your Business is my priority", "Your Business is my priority", "Your Business is my priority", "Your Business is my priority" ]'>
            <span class="wrap"></span>

        </a>
        </h1>
                   </div>

                <div class="l-form">

                <?php
            
            if (isset($_POST["submit"])){
                $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");

              $username = mysqli_real_escape_string($con, $_POST["username"]);
              $password = mysqli_real_escape_string($con, $_POST["password"]);
                // SQL injection prevention
              $sql = "SELECT * FROM employee WHERE Username='".$username."' AND Password='".$password."' ";
              $result = mysqli_query($con, $sql) or die(mysqli_error($con));
              $row = mysqli_fetch_array($result);
              if ($row["Position"] == "Manager"){
                header ("Location: /Sad-Activity/Manager_landing_page/ManagerDashboard.php");
              }
              else if ($row["Position"] == "Staff"){
                header ("Location: /Sad-Activity/Staff%20interface/Staff.php");
        }
        else{
            $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");

            $username = mysqli_real_escape_string($con, $_POST["username"]);
            $password = mysqli_real_escape_string($con, $_POST["password"]);
            $query = "SELECT * FROM owener_acct WHERE Username='$username' AND Password='$password'";
            $result = $con->query($query);
            
            if ($result->num_rows == 0) {
                // User found, redirect to a success page
                header("Location: /Sad-Activity/owner_landing_page/ownerlandingpage.php");
            }else{
              echo'<!-- Trigger/Open The Modal -->
<!-- The Modal -->
<div id="myModal" class="modal">
<!-- Modal content -->
<div class="modal-content" >
   <div style="border: 1px solid red; width:360px; height:50px;padding-left:60px ">
               <div class="container1-1">
   <h5>Please Check Username or Password </h5>
</div>
</div>';
          }    
        }
    }
            
            ?>
                    <form action=""
                     method="post" class="form">

                        <h1 class="form_tile">Log in</h1>
                        <div class="form_div">
                            <input type="text" name="username" class="form_input" placeholder=" ">
                            <label for="" class="form_label">Username</label>
                        </div>
    
                        <div class="form_div">
                            <input type="password" name="password" class="form_input" placeholder=" ">
                            <label for="" class="form_label">Password</label>
                        </div>
                        <a href="forget.php">Forget password?</a>
                        <input type="submit" name="submit" class="form_button" value="Login" >
                    </form>
                </div>
        </body>
    </html>







