<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="Forget.css">
        <title>Forget - B-MO</title>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
     
       
    </head>
    <body>
        <div class="l-form">
        <?php 
            session_start();
            if (isset($_POST["submit"])) {
                $con = mysqli_connect("localhost","root", "", "multi_bussines_system");

                $user = mysqli_real_escape_string($con,$_POST['username']);
                $choose = mysqli_real_escape_string($con,$_POST['choose']);
                $type = mysqli_real_escape_string($con,$_POST['type']);

                $sql = "SELECT * FROM owener_acct WHERE Username = '$user'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);

                if($row){
                    $sql = "SELECT * FROM owener_acct WHERE Secret_Question='$choose' AND Ans_Sec_Question='$type'";
                    $res = mysqli_query($con,$sql);
                    $roww = mysqli_fetch_array($res);

                    if($roww){
                        $_SESSION ["username"] = $roww["Username"];
                        header ("Location: forgetnewpassword.php");
                    }else {
                        echo '<script>alert("Please Insert Correct Answer")</script>';
                    
                    }
                }else{
                    echo '<script>alert("Please Insert Correct Username")</script>';
                    
                }

            }
       ?>
          
          <form action="" method="post" class="form">
            <h1>Forget Password</h1>
            <div class="form_div">
                <input required type="text" name="username" class="form_input" placeholder=" ">
                <label for="" class="form_label">Username</label>
            </div>
            <div class="select" >
                    <label class="choose" for="cars">Choose Secret Question:</label>
                    <select class="chose" name="choose" name="cars" id="cars">
                    <option value="First pet name">First pet name</option>
                     <option value="First love">First love</option>
                  <option value="Mothers Maiden Name">Mothers Maiden Name</option>
                    </select>
                    <input type="text" required name="type" class="aa" placeholder="Type here">
              
                </div>
                    <input type="submit" name="submit" class="form_continue" value="Continue">
            </form>
            
        </div>
    </body>
</html>