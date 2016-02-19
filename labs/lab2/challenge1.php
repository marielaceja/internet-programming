<?php
function generatePassword(){
    $finalPassword="";
    $length= rand(5,10);
    $chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charsLength=strlen($chars);
    
    echo "<table border=1>";
    for($h=0;$h<25;$h++){
        $finalPassword= "";
        $counter=0;
        echo "<tr>";
        for($i=0;$i <1;$i++){
            echo "<td>";
            for($j=0;$j<$length;$j++){
                $password=rand(1,2);
                if($password==1){
                    $finalPassword .= chr(rand(65,90));
                }
                else{
                    ++$counter;
                    if($counter>3){
                        $finalPassword .= $chars[rand(0,$charsLength)];
                    }
                    else{
                        $num = rand(1,9);
                        $finalPassword .= $num;
                    }
                }
            }
            echo "<td style='background-color:$color'>";
            echo $finalPassword. "<br />";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>

<!DOCTYPE hmtl>
<html>
    <head>
        <title>Random Passwords</title>
    </head>
    <body>
        <h1>Random Passwords</h1>
        <?=generatePassword()?>
        
    </body>
</html>