<!--

Lab 4: HTML Forms & PHP Assignment
"Support your Presidential Candidate" Form

Rubric:

1) The main page includes all Form elements (20pts)
2) The "confirmation" page displays all data from the Form (20pts)
3) The total cost is calculated properly (20pts)
4) There is validation for age (18 or older), candidate (not empty), and products (not empty) (15pts)
5) Errors are properly displayed on the main page, upon submission of the form (15pts)
6) There is an external CSS file (10pts)

-->



<?php
    session_start();
    include('includes/data.php');
    
    //print_r($errorList); // FOR TESTING
    
    function displayErrors(){
       $errorList = $_SESSION['errors'];
        foreach($errorList as $error){
            echo $error . "<br />";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="../../assignments/styles.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <a href="index.php" id="currentPage"> Home</a>
        </nav>
        <main>
            <h1>Support Your Presidential Candidate</h1>
            <center><img src="img/candidates.jpg" alt="candidates" width="400px" height="250px" /></center>
            <br />
            <form action="confirmation.php">
                Enter your name: <input type="text" name="fullName" placeholder="Enter your full name" size="50"><br />
                
                Enter your age: <input type="number" name="age"><strong> (Must be 18 or older)</strong> <br />
                
                Select your candidate: 
                <select name="candidate">
                    <option value="">Select One</option>
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
            <?=displayErrors()?>
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