<?php
$player1 = $_POST["username1"];
$player2 = $_POST["username2"];

function welcome(){
    echo "Welcome. Please enter your information below";
    
}
function confirm(){
    echo "Player 1: ".$player1;
    echo "Player 2: ".$player2;
}
function user(){
    "<form>";
        "<br />";
        "User name:<br>";
        "<input type='text' name='username1'><br>";
        echo "<br />";
        "<input type='submit'>";
    "</form>";
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../styles.css" rel="stylesheet" />
        <!--<link href="tictactoe.php"/>-->
    </head>
    <body>
        <nav>
            <a href="index.html>" id="currentPage">Home</a>
            <a href="share.html">Share</a>
        </nav>
        <hr />
        <main>
            <table>
                <tr>
                    <td>Here is the game
                    <table border="1" id="game">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    </td>
                    <td>
                        <?=welcome()?>
                        <br />
                        <button onclick="<?=user()?>">Next</button>
                        
                       
                        
                    </td>
                    <!--
                    <td colspan="2"><h3>Instructions:</h3>
                        <form action="tictactoe.php" method="post">
                            <id="boldText">Player 1</id>
                            <br />
                            User name:<br>
                            <input type="text" name="username1"><br>
                            
                            <id="boldText">Player 2</id>
                            <br />
                            User name:<br>
                            <input type="text" name="username2"><br>
                            <input type="submit">
                            
                        </form>
                    </td>-->
                </tr>
               
            </table>
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