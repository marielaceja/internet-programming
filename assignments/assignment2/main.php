<?php
$numbers=array();
function createValues(){
    global $numbers;
    for($i = 1; $i < 51; $i++){
        array_push($numbers,$i);
    }
    //Testing: print_r($numbers);
}
function createTable()
{
    global $numbers;
    
    // Random background color for table
    $randomColor=array("red","yellow","pink","blue", "limegreen");
    $rand=array_rand($randomColor);
    $color=$randomColor[$rand];
    
    // Random pictures to display
    $randPictures= array("img/bingo1.jpg","img/bingo2.jpg","img/bingo3.jpg","img/bingo4.jpg");
    $i=array_rand($randPictures);
    $pic=$randPictures[$i];
    
    // Display image
    echo "<center><img src='$pic'></center>";
    if(is_array($numbers)){
        echo "<table border=1>";
        for($i = 0; $i < 3; $i++){
            echo "<tr>";
            for($j = 0; $j < 3; $j++){
                echo "<td style='background-color:$color'>";
                $randIndex = array_rand($numbers);
                echo "<center><strong>".($numbers[$randIndex])."</center></strong>";
                unset($numbers[$randIndex]);
                echo "</td>";
            } //end inner for loop
            echo "</tr>";
        }//end outer for loop
        echo "</table><br />";
    }
    else{
        echo "Is not array! <br />";
    }
}
function displayNumber(){
    global $numbers;
    $index=array();
    
    for($i=1; $i < 51; $i++){
        array_push($index,$i);
    }
    
    echo "<table>";
    for($i = 0; $i < 50; $i++){
        echo "<tr><td>";
        $indx = array_rand($numbers);
        if($index[$indx] != 0){
            echo $index[$indx];
            $index[$indx]=0;
            
        }
        echo "</td></tr>";
    }
    echo "</table>";
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <a href="main.html>" id="currentPage">Home</a>
            
        </nav>
        <hr />
        <main>
            <?=createValues()?>
            <?=createTable()?>
            <center><img src="img/bingo.png" alt="bingo" width="650px" length="300px"/></center>
            <hr />
            <footer>
                &copy; Ceja, 2016 <br />
                Disclaimer: The content of this web page might not be accurate.
               <br />
                <img src="../../img/peace.png" height="80px" width="70px" alt="CSUMB logo" />
            </footer>
        </main>
    </body>
</html>