<?php

    function getDatabaseConnection($dbname) {
        
        $host = "localhost";
       //$dbname = "otter_express";
        $username = "web_user";
        $password = "s3cr3t";
    
        //creates new connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $dbConn;
        
    }
?>