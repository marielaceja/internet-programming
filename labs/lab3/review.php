<?php

function learningArrays(){
    //$prices = array(); //Initialize an empty array
    $prices = array(550,750,600);
    
    $prices[]=100; // add and element to the end of the array
    array_push($prices,200); //also adds element
    $prices[0]=500; // modifies first element
    
    print_r($prices);
    
    echo "<hr>";
    
    for($i=0;$i<count($prices);$i++){
        //count returns the size of the array
        //echo "$$prices[$i]" . "<br />";
    }
    
    echo array_sum($prices);
    
    //removing elements from an array
    unset($prices[2]);
    print_r($prices);
    echo "<hr />";
    
    sort($prices);
    print_r($prices);
    echo "<hr />";
    
    $prices = arra_values($prices);
    echo "<hr />";
    print_r($prices);
    echo "<hr />";
}




?>
<!DOCTYPE html>
<html>
    <head>
        <title>Review</title>
    </head>
    <body>
        <h1> Arrays </h1>
        
        
        
    </body>
</html>