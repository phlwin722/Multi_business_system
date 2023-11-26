<?php
     // editdata
     if (isset($_POST['savechnge'])){
        $id = htmlspecialchars($_POST['id']);
        $usern = htmlspecialchars    ($_POST['username']);
        $passw= htmlspecialchars ($_POST['password']);
        $branche = htmlspecialchars  ($_POST['branchp']);
        $employeecategory = htmlspecialchars($_POST['employee_category']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $middle_name = htmlspecialchars($_POST['middle_name']);
        
           // Database connection settings
           $host = "localhost";
           $dbname = "multi_bussines_system";
           $username = "root";
           $password = "";
   
           try {
               // Create a PDO instance
               $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
               
               // Set the PDO error mode to exception
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare("UPDATE employee SET Username= ?, Password= ? , Branch = ? ,Position = ? ,Last_name = ?,First_name= ? ,Middle_name = ?  WHERE ID=?");
                $stmt->execute ([$usern, $passw, $branche ,$employeecategory ,$lastname , $firstname , $middle_name, $id]);

               header ('Location: employee.php');
           } catch (PDOException $e) {
               echo "Error inserting data: " . $e->getMessage();
           }
   
           // Close the database connection
           $pdo = null;
    }
      // editdata

      // delete employee
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
 //delete data
      //delete employee
?>