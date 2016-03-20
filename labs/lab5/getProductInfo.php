<?php

include('../../includes/database.php');

    function getProductInfo() {
       $dbConnection = getDatabaseConnection('otter_express');
       $sql = "SELECT productDescription 
               FROM product
               WHERE productId = :productId";
       $namedParameters = array(":productId"=>$_GET['productId']);
       $statement =  $dbConnection->prepare($sql);
       $statement->execute($namedParameters);
      
       return $statement->fetch(PDO::FETCH_ASSOC);
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <br />
        <main>
            <?php
            
            $productInfo = getProductInfo();
            echo "Details: <br />" .$productInfo['productDescription'];
            
            
            ?>
        </main>
    </body>
</html>