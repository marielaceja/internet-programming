<?php
    ini_set("display_errors", "On");

    $deck = array();

    for ($i = 1; $i <= 52; $i++ ) {
      
      $deck[] = $i;
      
    }
    
    shuffle($deck);

    // We pass in the $cardSuit and the $cardValue by reference to get both values
    // in the getPlayerHand function
    function getCard(&$cardSuit, &$cardValue) {
        global $deck;
        $card = array_pop($deck);
        $suit = array("clubs", "diamonds", "hearts", "spades");
        $cardSuit = $suit[floor($card / 13)];
        //$randomCard = rand(1, 13);
        $cardValue = $card % 13;
        if($cardValue == 0) {
            $cardValue = 13;
            $cardSuit = $suit[0];
        }
      
    }
    
    // This function accepts an array by reference as a parameter ($cardSuitArray).
    // $cardSuitArray will be populated with the card suits for each card in the player's hand.
    // This function will populate the $hand array with card values and return the array.
    // This makes the $cardSuitArray and the $hand array parallel arrays where each index
    // corresponds to a card suit and card value pair.
    function getPlayerHand(&$cardSuitArray) {
        $hand = array();
        
        $totalValue = 0;
        
        $cardSuit = "";
        $cardValue = 0;
        
        while(true) {
            
            if($totalValue < 35) {                             // if the total card value is below 35, we will add a card to the hand
                getCard($cardSuit, $cardValue);
                array_push($hand, $cardValue);
                array_push($cardSuitArray, $cardSuit);
                $totalValue = $totalValue + $cardValue;
            } else if($totalValue >= 35 && $totalValue < 38) { // If the total card value is between 35 and 38, a random number
                $willGetAnotherCard = rand(0,1);               // that determines whether the player gets another card is generated.
                if($willGetAnotherCard == 0) {                 // If the number is 0, the player gets another card. If it is 1,
                    getCard($cardSuit, $cardValue);            // the player doesn't get another card.
                    array_push($hand, $cardValue);
                    array_push($cardSuitArray, $cardSuit);
                    $totalValue = $totalValue + $cardValue;
                }
            } else {
                return $hand;                                  // We return the hand once the total hand value is >= 38
            }

        }
    }
    
   
   


    function displayHand()
    {
        
         $p1sum = 0;
         $p2sum = 0;
         $p3sum = 0;
         $p4sum = 0;
         
        // Parallel card suit and card value arrays.
        $playerOneHandSuits = array();
        $playerTwoHandSuits = array();
        $playerThreeHandSuits = array();
        $playerFourHandSuits = array();
        $playersScores = array();
        $playerOneHandValues = getPlayerHand($playerOneHandSuits);
        $playerTwoHandValues = getPlayerHand($playerTwoHandSuits);
        $playerThreeHandValues = getPlayerHand($playerThreeHandSuits);
        $playerFourHandValues = getPlayerHand($playerFourHandSuits);
    
       //Displays the array of cards per player along with the sum of points
        $players = array("blossom", "bubbles", "buttercup", "mojojo");
        shuffle($players); 
        
        
      
        //OUTPUT FOR PLAYER 1
        
        $randomPlayer = array_pop($players);//PLAYER AT INDEX VALUE IS SELECTED
        echo "Player 1: ";
        echo '&nbsp&nbsp&nbsp';
        echo "<img src = 'players/".$randomPlayer.".png' width = 100>";//OUTPUT IMAGE OF SELECTED PLAYER
        echo '&nbsp&nbsp&nbsp';
        $p1sum = displayCards($playerOneHandSuits,$playerOneHandValues);
        echo('&nbsp&nbsp&nbsp'.$p1sum);//OUTPUT THEIR SUM
        echo"</br>";
        $playersScores['player1'] = $p1sum;
        
        //OUTPUT FOR PLAYER 2
         
        $randomPlayer = array_pop($players);//PLAYER AT INDEX VALUE IS SELECTED
        echo "Player 2: ";
        echo '&nbsp&nbsp&nbsp';
        echo "<img src = 'players/".$randomPlayer.".png' width = 100>";//OUTPUT IMAGE OF SELECTED PLAYER
        echo '&nbsp&nbsp&nbsp';
        $p2sum = displayCards($playerTwoHandSuits,$playerTwoHandValues);
        echo('&nbsp&nbsp&nbsp'.$p2sum); //OUTPUT THEIR SUM
        echo "<br/>";
        $playersScores['player2'] = $p2sum;
       
        //OUTPUT FOR PLAYER 3
        
        $randomPlayer = array_pop($players);//PLAYER AT INDEX VALUE IS SELECTED
        echo "Player 3: ";
        echo '&nbsp&nbsp&nbsp';
        echo "<img src = 'players/".$randomPlayer.".png' width = 100>";//OUTPUT IMAGE OF SELECTED PLAYER
        echo '&nbsp&nbsp&nbsp';
        $p3sum = displayCards($playerThreeHandSuits,$playerThreeHandValues); //OUTPUT PLAYER 1'S DECK
        echo('&nbsp&nbsp&nbsp'.$p3sum); //OUTPUT THEIR SUM
        echo "<br/>";
        $playersScores['player3'] = $p3sum;
        

        
        //OUTPUT FOR PLAYER 4
       
        $randomPlayer = array_pop($players);//PLAYER AT INDEX VALUE IS SELECTED
        echo "Player 4: ";
        echo '&nbsp&nbsp&nbsp';
        echo "<img src = 'players/".$randomPlayer.".png' width = 100>";//OUTPUT IMAGE OF SELECTED PLAYER
        echo '&nbsp&nbsp&nbsp';
        $p4sum = displayCards($playerFourHandSuits,$playerFourHandValues); //OUTPUT PLAYER 1'S DECK
        echo "      ";
        echo('&nbsp&nbsp&nbsp'.$p4sum); //OUTPUT THEIR SUM
        echo "<br/>";
        $playersScores['player4'] = $p4sum;
        
        //calls the display winner methods
        displayWinner($playersScores);
        
    }
    
    function displayCards($suits,$values)
    {   
        $counter = count($suits);
        //calculates the sum of the cards as it displays them. 
        for($i = 0; $i < $counter; $i++)
        {
            echo "<img src = 'cards/$suits[$i]/$values[$i].png'>";
            $sum+= $values[$i];
        }
        return $sum; 
    }
    
function displayWinner($scores)
{
        $playerTemp;
        $totalSum = 0; 
        $minDifference = 5; 
        $tempScore = 0; 
        $difference =0;
        //arrays track the winning player and its score 
        $tiePlayers = array(); 
        $winningPlayer = array(); 

        foreach( $scores as $player =>  $score)
        {
            $totalSum += $score; 
           
            if($score ==  42)
            {
               
               array_push($winningPlayer,$player);
               $playerTemp = " ";
               $minDifference = 0;
               $tempScore = 42;
            }
            else if($score < 42 && $minDifference > abs(42-$score) )
            {
                     $playerTemp = $player;
                     $tempScore = $score; 
                     $minDifference = abs(42- $score);

            }
            else if($score < 42 && $minDifference == abs(42 -$score))
            {
              
                array_push($winningPlayer,$player);
            }
            
        }
        if($playerTemp != " ")
        {
            array_push($winningPlayer,$playerTemp);
        }
        
        if(count($winningPlayer) == 0)
            echo '<enter>'."No Winners !!".'</center>';
        else
        {
            $totalSum = (($totalSum-$tempScore)/count($winningPlayer));
            for($i = 0; $i < count($winningPlayer); $i++)
            {
                    
                //echo $winningPlayer[$i]." wins ".$totalSum." points !!!"."</br>";
                echo '<center>'.$winningPlayer[$i]." wins ".$totalSum." points !!!".'</center>';
                //echo '<center>'.$tiePlayers[$i]." wins ".$totalSum." points !!!".'</center>';
                echo'</br>';
            }
        
        }
        
}
    
    
    // Tests for each array. Uncomment and run to see paralle values
    // Each player's hand values will be printed first, and then
    // each player's hand card suits will be printed.
    
    /*
    print_r($playerOneHandValues);
    echo " " . count($playerOneHandValues);
    echo "<hr>";
    
    print_r($playerTwoHandValues);
    echo " " . count($playerTwoHandValues);
    echo "<hr>";

    print_r($playerThreeHandValues);
    echo " " . count($playerThreeHandValues);
    echo "<hr>";
    
    print_r($playerFourHandValues);
    echo " " . count($playerFourHandValues);
    echo "<hr>";
    
    print_r($playerOneHandSuits);
    echo " " . count($playerOneHandSuits);
    echo "<hr>";

    print_r($playerTwoHandSuits);
    echo " " . count($playerTwoHandSuits);
    echo "<hr>";
    
    print_r($playerThreeHandSuits);
    echo " " . count($playerThreeHandSuits);
    echo "<hr>";
    
    print_r($playerFourHandSuits);
    echo " " . count($playerFourHandSuits);
    echo "<hr>"; 
    */

?>


<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <h1>SilverJack</h1>
        <hr />
         <main>
             <?=displayHand()?>
        </main>
        <footer>
            <img src="cards/cards.png" alt="cards" width="200px" />
        </footer>
        
    </body>
</html>
