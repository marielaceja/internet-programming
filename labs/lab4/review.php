<?php
include('../lab2/ledboard/ledLetters.php');

    //print_r($_POST);
    // Print array contents
    //print_r($_GET);
    // GET allows you to change values of url
    
    function displayMessage(){
        if(isset($_GET['message'])){
            $message= $_GET['message'];
            $color  = $_GET['color'];
            //echo "hello ". $message. "!";
            for($i = 0; $i < strlen($message); $i++){
                drawLetter($message[$i], $color);
            }
        }
        else{
            
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="../lab2/styles.css" rel="stylesheet" />
       
        
    </head>
    <body>
        <form method="post">
            Message: <input type="text" name="message" />
            <br /><br />
            Select Color: <br />
            <input type="radio" name="color" value="#F78196" id="redColor"><label for="redColor">Red</label><br />
            <input type="radio" name="color" value="#C6F7C8" id="greenColor" checked><label for="greenColor">Green</label><br />
            
            <!-- Select statement -->
            <select name="color">
                <option value="#FAF889">Yellow</option>
                <option value="#DEB1DB">Purple</option>
                <option value="rainbow">Rainbow</option>
            </select>
            <input type="submit" value="Send!" />
        </form>
        
        <br />
        <?=displayMessage()?>
        
    </body>
</html>