<?php
$player1 = $_POST["username1"];
$player2 = $_POST["username2"];

function welcome(){
    echo "Welcome. Please enter your information below";
    
}
function confirm(){
    echo "Player 1: ".$player1;
    echo "Player 2: ".$player2;
}
function user1(){
    "<form>";
        "<br />";
        "User name:<br>";
        "<input type='text' name='username1'><br>";
        echo "<br />";
        "<input type='submit'>";
    "</form>";
    
}


?>
