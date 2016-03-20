<?php
session_start();

    //print_array('$_GET...',$_GET);
    function getName(){
        $names = array();
        //htmlspecialchars( $_SESSION['fullName']= $_GET["name"]);
        //for($i = 1; $i < $_SESSION['numberOfPeople']; $i++){
            $_SESSION['fullName'] = $_GET['fullName[]'];
        //}
    }
    
    function isDataValid(){
        $dataValid=true;
         for($i =0 ; $i < $_SESSION['numberOfPeople']; $i++){
             if(!isset($_GET['fullName'])){
                 array_push($_SESSION['errors'],"Missing name");
                 $dataValid=false;
             }
             
         }
         return $dataValid;
    }
    if(!isDataValid()){
        //header('Location:displayChores.php?numberOfPeople='.getNumberOfPeople());
    }
    // else{
    //     for($i = 0; $i <$_SESSION['numberOfPeople']; $i++){
    //         array_push($_SESSION['fullName'], $_GET['fullName']);
    //     }
    // }
    function isSubmitted(){
        global $names;
        //if(isDataValid()){
        print_r($_SESSION['fullName']);
            for($i =0 ; $i < $_SESSION['numberOfPeople']; $i++){
                echo "hello" . $_SESSION['numberOfPeople'];
                $names[$i];
            
                
                // echo print_r($_SESSION['fullName']) . " will be in charge of " ;
                
                //     $list = $getRange($_GET['range']);
                //     $index = rand($list);
                //     echo $list[$index] . "<br >";
            }
        //}
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
            <a href="index.php">Home</a>
        </nav>
        <hr />
        <main>
            <h1>Chores For Kids</h1>
            <center><img src="img/clean-up.jpg" /></center>
            <br />
            <?=isSubmitted()?>
        </main>
    </body>
</html>