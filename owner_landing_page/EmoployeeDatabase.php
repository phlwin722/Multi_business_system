<?php
   
      ///////////// delete employee /////////////////////
      if (isset($_POST["delete_employee"])){
        $local ="localhost";
        $username = "root";
        $pass ="";
          $dbnamee = "multi_bussines_system";
        $ID = htmlspecialchars($_POST["ID"]);

        try{
            $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM employee WHERE ID = :ID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
                header ('Location: employee.php');
        }catch (PDOException $e) {
            echo " ". $e->getMessage();
        }
        $pdo = null;
    }
 /////////////////////delete data /////////////////
      //delete employee
?>