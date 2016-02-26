<?php

    function getFirstName(){
        $firstName = $_GET['firstName'];
        return strtoupper($firstName);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        Hello <?=getFirstName()?>!
    </body>
</html>