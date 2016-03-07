<?php
session_start(); // Starts or resumes an existing session

    $_SESSION['errors']  = array();
    //$_COOKIES

    include('includes/data.php');
    //print_r($_GET); //FOR TESTING
    function getClientName(){
        return ucwords($_GET[fullName]); //capitalizes first letter of every word
    }
    function getCandidateName(){
        return $_GET['candidate'];
    }
    function getProducts(){
        $productsToBuy= $_GET['productsToBuy'];
        $productList = getProductList();
        $total =0;
        
        echo "<br />";
        foreach($productsToBuy as $product){
            echo $product . " " ."$".$productList[$product];
            $total += $productList[$product];
            echo $product . "<br /><br />";
        }
        
        $magazine = $_GET['magazine'];
        echo $magazine. "-month Magazine Subscription ($" .($magazine*10).")<br />";
        $total += $magazine*10;
        echo "<br /><br />Total: $" .$total;
        
    }

    function isDataValid(){
        $dataValid = true;
        if(empty(getClientName())){
            array_push($_SESSION['errors'], "ERROR: Enter your name.");
        }
        if(empty(getCandidateName())){
            // echo "ERROR: Select a candidate.";
            array_push($_SESSION['errors'],"ERROR: Select a candidate.");
            $dataValid = false;
            // header('Location: index.php'?error=YOU MUST SELECT A CANDIDATE); // Sends user back to index.php
        }
        // Validate age is not empty
        if(empty($_GET['age'])){
            array_push($_SESSION['errors'], "ERROR: You must entere your age.");
            $dataValid =  false;
        }
        
        // Validate age is 18 or older
        else if($_GET['age'] < 18){
            array_push($_SESSION['errors'],"ERROR: Must be 18 or older.");
            $dataValid = false;
        }
        
        if(!isset($_GET['productsToBuy']) && !isset($_GET['magazine'])){
            array_push($_SESSION['errors'], "ERROR: Select a magazine plan.");
            $dataValid = false;
        }
        
        return $dataValid;
    }
    if (!isDataValid()){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Form Received</title>
        <link href="../../assignments/styles.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <a href="index.php"> Home</a>
        </nav>
        <hr />
        <main>
            Dear <strong><?=getClientName()?>,</strong>
            <br />
            <p>
                <br />Thank you for supporting candidate <strong><?=getCandidateName()?></strong>
                <br />
                <br />You ordered these products:
                <br /><tab><?=getProducts()?></tab>
            </p>
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