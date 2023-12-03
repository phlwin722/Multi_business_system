<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="forgetnewpassword.css">
    </head>
    <body>
        <div class="l-form">
          <form action="" method="post" class="form">
            <h1>New Password</h1>
            <div class="form_div">
                <input type="password" name="new" class="form_input" placeholder=" ">
                <label for=""  class="form_label">New Password</label>
            </div>
            <div class="form_div">
                <input type="password" name="retype" class="form_input" placeholder=" ">
                <label for=""  class="form_label">Re-type Password</label>
            </div>
                    <input type="submit" name="submit" class="form_continue" value="Submit">
            </form>
            <?php 
                session_start();
                $user = $_SESSION['username'];
           
                if (isset($_POST['submit'])){
                    $new = htmlspecialchars($_POST['new']);
                    $retype = htmlspecialchars ($_POST['retype']);

                    if ($new == $retype){

                        $host = "localhost";
                        $dbname = "multi_bussines_system";
                        $username = "root";
                        $password = "";

                       try {
                                                // Create a PDO instance
                           $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $pdo->prepare ("UPDATE owener_acct SET Password =? WHERE Username=?");
                            $stmt->execute ([$new,$user]);
                            header ("Location: logout.php");
                         } catch (PDOException $e){
                            echo 'eeror'. $e->getMessage ();
                         }
                    }else{
                        echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                    Please correct username or password
                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                    }
                }
            ?>
        </div>
    </body>
</html>