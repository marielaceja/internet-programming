<?php

    // 3 Methods to connect to the database:
        // Use mysql_connect (rarely used because or reliability)
        // mysql_i (mysql improved -- if using sql, use this)
        // PHP Data Objects (PDO -- if intending to migrate, use this! Very flexible)
        
    $host = "localhost";
    $dbname = "otter_express";
    $username = "webuser";
    $password = "guest";

    // Creates new connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Setting ErrorHandling to exception (repait execute,fetch)
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM product WHERE poductName like '%salad%'";
    
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$products = $statement->fetch(PDO::FETCH_NUM); // Returns only indexed array
    $products = $statement->fetch(PDO::FETCH_ASSOC); // Returns only associative array
    //Expecting more than one record, use fetchAlL()
    $products = $statement->fetchAll();
    
    
    // Printing products
    foreach($products as $product){
        echo $product['productName'] . "$" . $product['price'] . " " . $product['productDescription']
        . "<br />";
    }

    $averagePrice = "SELECT avg(price) FROM product";
    $averageCalories = "SELECT avg(calories) FROM product";
    
    echo "Average Price: $" . $averagePrice . "<br / >Average Calories: " . $averageCalories . "<br />";
?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <nav>
            Database - Introduction
        </nav>
        <hr />
        <main>
            <h1> Otter Express </h1>
        </main>
    </body>
</html>