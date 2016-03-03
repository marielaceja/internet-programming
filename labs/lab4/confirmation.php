<?php
    include('includes/data.php');
    print_r($_GET);
    function getClientName(){
        return ucwords($_GET[fullName]); //capitalizes first letter of every word
    }
    function getCandidateName(){
        return $_GET['candidate'];
    }
    function getProducts(){
        $product_list= $_GET['poductToBuy'];
        $productList = getProductList();
        $total =0;
        
        foreach($productList as $product){
            echo $product . " " ."$".$productList[$product];
            $total += $productList[$product];
            echo $product . "<br />";
        }
        $magazine = $_GET['magazine'];
        
        echo $magazine. "-month Magazine Subscription ($" .($$magazine*10).")<br />";
        $total+=$magazine*10;
        echo "Total: $" .$total;
        
    }

    function isDataValid(){
        $dataValid = true;
        if(empty(getCandidateName())){
            echo "ERROR: Select a candidate.";
            $dataValid = false;
            header('Location: index.php'); // Sends user back to index.php
        }
        if()
    }
    isDataValid();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
    </head>
    <body>
        <br /><br />
        Dear <strong><?=getClientName()?>,</strong>
        <br />
        <p>
            <br />Thank you for supporting candidate <strong><?=getCandidateName()?></strong>
            <br />
            <br />You ordered these products:
            <br /><tab><?=getProducts()?></tab>
            
        </p>
    </body>
</html>