<!--
    Create a web page with at least seven HTML Form elements.
    Upon submission of the form, the data must be "processed" and displayed.

    Rubric:

    1) The form includes at least seven HTML Form Elements (20pts)
    2) There are least three different types of Form Elements.
        (text, checkbox, radio, select, number, etc.) (15pts)
    3) Upon submission of the form, the data is "processed" and displayed (20pts)
    4) The form processing has "some meaning" (15 pts)
    5) There is data validation with corresponding error messages (20pts)
    6) There is an external CSS file (10pts)
-->

<?php
session_start(); // Starts or resumes an existing session

    //include('displayChores.php');
    
    function displayErrors(){
       $errorList = $_SESSION['errors'];
        foreach($errorList as $error){
            echo $error . "<br />";
        }
    }
 
   print_r($_SESSION['errors']);

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
            <h1>Chores For Kids</h1>
            <center><img src="img/clean-up.jpg" /></center>
            <br />
            <form action="displayChores.php">
                Enter the number of people: <input type="number" name="numberOfPeople"><strong> (No more than 5)</strong> <br />
                <input type="submit" value="Submit"/>
                
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