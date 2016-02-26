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
        <form action="response.php">
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
                    echo "<input type='checkbox' name='product[]' id='$product'><label for=$product'>$product($$price)</label><br />";
                }
            
            ?>
            <br />
        </form>
        
    </body>
</html>