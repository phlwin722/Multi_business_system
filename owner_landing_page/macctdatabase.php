<?php
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
                                             echo "Data updated successfully";
                                             header ("Location: /Multi_business_system/landingpage/logout.php");
                                      
                                        }catch (Exception $e) {
                                            echo 'Not connected'.$e->getMessage();
                                        }
                                    }                        

                              ?>