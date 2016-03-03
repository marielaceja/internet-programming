<?php

    include('includes/data.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Support Your Presidential Candidate</h1>
        <center><img src="img/candidates.jpg" alt="candidates" width="400px" height="250px" /></center>
        <form action="confirmation.php">
            Enter your name: <input type="text" name="fullName" placeholder="Enter your full name" size="50"><br />
            
            Enter your age: <input type="number" name="age"><strong> (Must be 18 or older)</strong> <br />
            
            Select your candidate: 
            <select name="candidate">
                <?php 
                    $candidateList= getCandidateList();
                    foreach($candidateList as $candidate){
                        echo "<option value='$candidate'>$candidate</option>";
                    }
                ?>
            </select>
            <br />
            <strong>Merchandise</strong>
            <br />
            <?php
                $productList=getProductList();
                foreach($productList as $product=>$price){
                    echo "<input type='checkbox' name='productsToBuy[]' id='$product' value='$product'><label for=$product'>$product($$price)</label><br />";
                }
            
            ?>
            
            <strong>Campaign Magazine ($10 per month)</strong>
            <br />
            <input type="radio" name="magazine" value="1" id="one_month"><label for="oneMonth"> 1 month</label>
            <input type="radio" name="magazine" value="3" id="three_months"><label for="threeMonths"> 3 months</label>
            <input type="radio" name="magazine" value="6" id="six_months"><label for="sixMonths"> 6 months</label>
            <input type="radio" name="magazine" value="12" id="twelve_months"><label for="twelveMonths"> 12 months</label>
            <br />
            
            <input type="image" src="img/buy-now.gif" width="150px" value="submit form"/>
        </form>
        
    </body>
</html>