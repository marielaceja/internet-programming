<?php
include('ledboard/ledLetters.php');
function led($word,$color){
    for($i=0;$i < strlen($word);$i++){
        drawLetter($word[$i],$color);
    }
}
$color1="yellow";
$color2="blue";
$color3="pink";
$color4="red";
$color5="green";
$color="";
$randNum=null;
function randomColor($word){
    
    for($i=0;$i < strlen($word);$i++){
        $randNum=rand(1,4);
        if($randNum==1){
           $color="yellow"; 
        }
        else if($randNum==2){
            $color="blue"; 
        }
        else if($randNum==3){
            $color="red"; 
        }
        else if($randNum==4){
            $color="green"; 
        }
        drawLetter($word[$i],$color);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: LED Board </title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <h1> LED Board </h1>
        <h3>Instructions:</h3>
    
        1) There must be at least three words, each on a different line (30 pts)
        <br />2) All words must be centered  (20 pts)
        <br />3) One of the words must have random colors on each letter (10 pts)
        <br />4) One of the words must have random colors on each "led" (cell)
        <blockquote>Tip: Use "rainbow" as color.  (10 pts)</blockquote>
        <br />5) You updated your assigned letter properly in GitHub (20 pts)
        <br />6) There is an external CSS file with at least 10 rules (10 pts)
        <hr />
        <main>
            <br />
            <?=led("HELLO","orange")?>
            <br />
            <?=randomColor("PRETTY")?>
            <br />
            <?=led("THING!",rainbow)?>
            <br />
        </main> 
    </body>
</html>