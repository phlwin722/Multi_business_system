<!DOCTYPE html>
<html>
    <head>
        <style>
            div{
                border: 1px solid black;
                padding: 30px 30px 0px 30px;
                text-align: center;
                width: 250px; 
                border-radius: 10px;
                height: 150px;
            }
            input{
                margin-top: 10px;
            }
            .submit{
                background-color: rgb(77, 255, 0);
                border: none;
                padding: 10px;
                border-radius: 10px;
            }

            </style>
    </head>
    <body>
       <div>
       <form action="#" method="post">
            <label for="">Counting vowels</label>
            <br>
            <input type="text" name="counting">
             <br>
            <input class="submit" name="submit" type="submit">
            <br>
        </form>
        <?php
       
       if (isset($_POST['submit'])){
        function countVowels ($inputString){
           $vowels = ['a','e','i','o','u','A','E','I','O','U'];

           $count = 0;

           for ($i = 0; $i < strlen($inputString); $i++) {
               if (in_array($inputString[$i], $vowels)) {
                   $count++;
               }
           }
           return $count;
        }
       $string = ($_POST["counting"]);
       $result = countVowels ($string);
       echo '<br>Number vowels in <b>'.$string ."</b> is: <b>".$result."</b>"; 
   }
   ?>
       </div>
    </body>
</html>