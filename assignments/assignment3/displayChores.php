<?php
session_start(); // Starts or resumes an existing session

    $_SESSION['errors']  = array();
    function getNumberOfPeople(){
        return $_GET['numberOfPeople'];
        
    }
    
    function isDataValid(){
        $dataValid = true;
        if(getNumberOfPeople() < 1 || getNumberOfPeople() >5){
            array_push($_SESSION['errors'], "Number of people must be 1-5");
            $dataValid =  false;
        }
        return $dataValid;
    }
     if (!isDataValid()){
        header('Location: index.php');
    }
    function enterName(){
        
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chores</title>
        <link href="../styles.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav>
            <a href="index.php" id="currentPage">Home</a>
        </nav>
        <hr />
        <main>
            
            
        </main>
    </body>
</html>