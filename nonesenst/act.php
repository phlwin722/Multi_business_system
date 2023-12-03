<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="#" method="post">
            <label for="">Counting vowels</label>
            <br>
            <input type="text" name="counting">
             <br>
            <input name="submit" type="submit">
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
            echo 'Number vowels in '.$string ." is: ".$result; 
        }
        ?>

    </body>
</html>