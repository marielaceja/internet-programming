<?php
//$prices = array(); //Initialize an empty array
$prices = array(550,750,600);

$prices[]=100; // add and element to the end of the array
array_push($prices,200); //also adds element
$prices[0]=500; // modifies first element

print_r($prices);

echo "<hr>";

for($i=0;$i<count($prices);$i++){
    //count returns the size of the array
    echo "$$prices[$i]" . "<br />";
}

echo array_sum($prices);

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