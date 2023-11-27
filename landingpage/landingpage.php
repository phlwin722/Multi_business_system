<?php 
    session_start();
?>
                <?php
            
            if (isset($_POST["submit"])){
                $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");

              $username = mysqli_real_escape_string($con, $_POST["username"]);
              $password = mysqli_real_escape_string($con, $_POST["password"]);
                  // SQL injection prevention
              $sql = "SELECT * FROM employee WHERE Username='".$username."' AND Password='".$password."' ";
              $result = mysqli_query($con, $sql) or die(mysqli_error($con));
              $row = mysqli_fetch_array($result);

             if ($row){ 
                // this code is display the information of user manager in another page
                if ($row["Position"] == "Manager"){
                    $_SESSION ['id'] = $row['ID'];
                    $_SESSION ['fname'] = $row['First_name'];
                    $_SESSION ['middlename'] = $row['Middle_name'];
                    $_SESSION ['lastname'] = $row ['Last_name'];
                    $_SESSION ['branch'] = $row ['Branch'];
                    $_SESSION ['position'] = $row ['Position'];

                    header ("Location: /Multi_business_system/Manager_landing_page/DashboardManager.php");
                  }
                    // this code is display the information of user staff in another page
             
                  else if ($row["Position"] == "Staff"){
                    $_SESSION ['$branch'] = $row['Branch'];
                    $_SESSION ["id"] = $row["ID"];
                    header ("Location: /Multi_business_system/Staff%20interface/Staff.php");
            }
    }
    else {
        $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");

        $username = mysqli_real_escape_string($con, $_POST["username"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);

        $query = "SELECT * FROM owener_acct WHERE Username='$username' AND Password='$password'";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
        $total  = $result-> num_rows;

        if ($total > 0) {
            // User found, redirect to a success page
            $_SESSION ["fname"] = $row ['Fisrst_name'];
            $_SESSION ['lname'] = $row ['Last_name'];
            $_SESSION ['lname'] = $row ['Secret_Question'];
            $_SESSION ['lname'] = $row ['Ans_Sec_Quertion'];
            $_SESSION ['lname'] = $row ['Image'];
            header("Location: /Multi_business_system/owner_landing_page/Dashboardowner.php");
        }
        else {
            echo'<!-- Trigger/Open The Modal -->
               <div style="
               background: #f9eded;
               border-radius:5px;
               color: red;
                width:320px;
                 height:50px;
                 text-align:center;
                 position:absolute;
                  top:135px;
                  right:130px">
                <script></script>
               <h5>Please Check Username or Password </h5>

            </div>'; 
        }    
    }
}
    
            
            ?>
<!DOCTYPE html>
    <html>
        <head>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="landingpage.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <script src="landigpage.js" defer></script>
            <title>Business Monitoring</title>
            <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
        </head>
        <body>
            <div class="container1 ">
                <div class="welcome">Business Monitoring</div>
                        
        <h1 class="hh">
        <a href="" class="typewrite" data-period="2000" data-type='[ "Your Business is my priority", "Your Business is my priority", "Your Business is my priority", "Your Business is my priority" ]'>
            <span class="wrap"></span>
        </a>
        </h1>
                   </div>

                <div class="l-form">

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







