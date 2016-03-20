<?php
session_start(); // Starts or resumes an existing session
    $_SESSION['errors'] = array();
    $_SESSION['numberOfPeople'] = $_GET['numberOfPeople'];
    
    include('data.php');
    
    // Boolean function to return if data entered is between 1-5
    function isNumberOfPeople(){
        $dataValid = true;
        if(($_SESSION['numberOfPeople'] < 1) ||( $_SESSION['numberOfPeople'] > 5) || empty($_GET['numberOfPeople'])){
            array_push($_SESSION['errors'], "Number of people must be 1-5");
            $dataValid = false;
        }
        
        return $dataValid;
    }
    if(!isNumberOfPeople()){
        header('Location: index.php');
    }
  
    function getRange($name){
        if($name == "Ages 2-3"){
            return getRange2_3();
        }
        else if($name == "Ages 4-5"){
            return getRange4_5();
        }
        else if($name =="Ages 6-8"){
            return getRange6_8();
        }
        else if($name == "Ages 9-11"){
            return getRange9_11();
        }
    }
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
            <a href="index.php">Home</a>
        </nav>
        <hr />
        <main>
            <h1></h1>
            <form action="result.php">
            <?php
                for($i = 0; $i < $_SESSION['numberOfPeople']; $i++){
                    echo "Enter name: <input type='text' name='fullName[]' placeholder='Enter full name' size='40'><br />";
                    echo "Select age range:";
                    echo "<select name='ageRange[]'>";
                        echo "<option value=''>Select One</option>";
                        $rangeList= getRangeList();
                        foreach($rangeList as $range){
                            echo "<option value='$range'>$range</option>";
                        }
                    //array_push($_SESSION['fullName'], $_GET['fullName']);
                echo "</select>";
                echo " <br /><br />";
            }
           ?>
            <br /><br /><input type="submit" value="Submit"/>
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