<?php

$deck = array();

function displayCards(){
    for($i = 1; $i < 52; $i++){
        $deck[] = $i;
    }
    print_r($deck);
    
    shuffle($deck);
    echo "<hr />";
    print_r($deck);
    echo "<hr />";
    $card = array_pop($deck);
    echo $card;
    echo "<hr />";
    
    $suit = array("clubs","diamons","hearts","spades");
    $cardSuit = $suit[floor($card/13)];
    $cardValue = $card % 13;
    if($cardValue == 0){
        $cardValue = 13;
    }
    //Display Card
    echo "<img src=cards/$cardSuit/$cardValue.png>";
   
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Silver Jack Game</title>
        <style>
            h1{
                text-align:center;
                color:red;
            }
        </style>
    </head>
    <body>
        <h1>Silver Jack Game</h1>
        
        <hr />
        <?=displayCards()?>
    </body>
</html>