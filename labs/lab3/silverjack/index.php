<?php

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
        $randomCard = rand(1, 13);
        $cardValue = $card % 13;
        if($cardValue == 0) {
            $cardValue = 13;
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
       //Displays the array of cards per player along with the sum of points
    
    
    
        
        //OUTPUT FOR PLAYER 1
        $randomIndex = rand(1,$playersSize); //GET RANDOM INDEX VALUE TO SELECT PLAYER FROM ARRAY OF PLAYERS
        
        $randomPlayer = $players[$randomIndex]; //PLAYER AT INDEX VALUE IS SELECTED
        
        
        echo "<img src = players/$randomPlayer.png>"; //OUTPUT IMAGE OF SELECTED PLAYER
    
    
        array_pop($players($randomPlayer)); //POP USED PLAYER SO NOT TO BE CHOSEN AGAIN
        
        $playerSize--; //DECREMENT SIZE OF ARRAY SINCE AN ELEMENT HAS BEEN POPPED
    
    
        print_r($player1); //OUTPUT PLAYER 1'S DECK
        echo(" " + p1sum); //OUTPUT THEIR SUM
        
        echo "<br/>";
        
        
        //OUTPUT FOR PLAYER 2
        
        $randomIndex = rand(1,$playersSize);
        
        $randomPlayer = $players[$randomIndex];
        
        
        echo "<img src = players/$randomPlayer.png>";
        
        array_pop($players($randomPlayer));
        
        $playerSize--;
        
        
        print_r($player2);
        echo(" " + p2sum);
        
        echo "<br/>";
        
        
        //OUTPUT FOR PLAYER 3
        
        $randomIndex = rand(1,$playersSize);
        
        $randomPlayer = $players[$randomIndex];
        
        
        echo "<img src = players/$randomPlayer.png>";
        
        
         array_pop($players($randomPlayer));
        
        $playerSize--;
        
        print_r($player3);
        echo(" " + p3sum);
        
        echo "<br/>";
        
        
        
        //OUTPUT FOR PLAYER 4
        
        $randomIndex = rand(1,$playersSize);
        
        $randomPlayer = $players[$randomIndex];
        
        
        echo "<img src = players/$randomPlayer.png>";
        
        
        array_pop($players($randomPlayer));
        
        $playerSize--;
        
        
        print_r($player4);
        echo(" " + p4sum);
        
    }

    $player1 = array();
    $player2 = array();
    $player3 = array();
    $player4 = array();
    $players = array("blossom", "bubbles", "buttercup", "mojojojo");
    $playersSize = count($players);
    
    $p1sum = 0;
    $p2sum = 0;
    $p3sum = 0;
    $p4sum = 0;

    // Parallel card suit and card value arrays.
    $playerOneHandSuits = array();
    $playerTwoHandSuits = array();
    $playerThreeHandSuits = array();
    $playerFourHandSuits = array();
    
    $playerOneHandValues = getPlayerHand($playerOneHandSuits);
    $playerTwoHandValues = getPlayerHand($playerTwoHandSuits);
    $playerThreeHandValues = getPlayerHand($playerThreeHandSuits);
    $playerFourHandValues = getPlayerHand($playerFourHandSuits);
    
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
    echo "<hr>"; */


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
        <footer>
            <img src="cards/cards.png" alt="cards" width="200px" />
        </footer>
        <main>
            
            
            <button type="button">Play Again</button>
        </main>
        
    </body>
</html>