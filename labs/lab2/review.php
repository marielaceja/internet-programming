<?php
/*
echo "Hello Kitty Store";

$product1= "purse";
$price1= rand(10,100);
$tax= ($price1 > 50) ? .20: .10; //ternary operator: if price1 is greater than 50, tax = 20% else 10%


echo "<br /><br />";
echo "Product: $product1 <br />";
echo "Price: $$price1 <br />";
echo "Tax: $". ($price1 * $tax). "<br />";
echo "Total Cost: $".(1+$tax) * $price1. "<br />";
*/

$color="";

function randNums($rows, $columns, $color){
    echo "Random Number Generator <br />";
    echo "<table border=1>";
    for($i=0;$i<$rows;$i++){
        echo "<tr>";
        for($j=0; $j<$columns;$j++){
            if($i !=0){
                $color="white";
            }
            echo "<td style='background-color:$color'>";
            echo rand(1,50). "<br />";
            echo "</td>";
        }
        echo "</tr>";
    } // end for loop
    
    echo "</table> <br />";
}

function randLetters($rows, $columns, $color, $pattern){
    echo "Random Letter Generator <br />";
    
    echo "<table border=1>";
    for($i=0;$i<$rows;$i++){
        echo "<tr>";
        for($j=0; $j<$columns;$j++){
            
            switch($pattern){
                case "firstRow": {
                    if($i == 0){
                        echo "<td style='background-color:$color'>";
                    }
                    break;
                }
                case "secondRow": {
                    if($i ==1){
                        echo "<td style='background-color:$color'>";
                    }
                    break;
                }
                case "evenRows":{
                    if($i % 2 ==0){
                        echo "<td style='background-color:$color'>";
                    }
                    
                    break;
                }
            } //end switch statement
            $color="white";
            echo "<td style='background-color:$color'>";
            echo chr(rand(65,90)). "<br />"; //90 is 'Z'
            echo "</td>";
        }
        echo "</tr>";
    } // end for loop
    
    echo "</table>";
}

?>

<!DOCTYPE html>
    <head>
        <title></title>
        
    </head>
    <body>
        <h1>Random Letters!</h1>
        
        <?=randLetters(4,4, "cyan", "firstRow")?>
        <hr />
        <?=randNums(6,6, "red", "secondRow")?>
        <hr />
        <?=randNums(7,7,"green", "evenRows")?>
        <hr />
        
    </body>

</html>