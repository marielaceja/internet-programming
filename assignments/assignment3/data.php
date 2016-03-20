<?php

    function getRangeList(){
        $range = array("Ages 2-3", "Ages 4-5", "Ages 6-8", "Ages 9-11");
        return $range;
    }
    function getRange2_3(){
        $chores2_3 = array("Pick up/put away toys", "Unload the dishwasher (silverware, plastic cups, tupperware)", 
        "Dust with feather duster/microfiber rag", "Swiffer the floor", "Put clothes in the dirty clothes hamper",
        "Collect dirty clothes", "Help move clothes from washer to dryer", "Put clothes away","Make bed", "Wipe cabinets", 
        "Wipe baseboards (soapy water)");
        return $chores2_3;
        // $shuffledChores = shuffle($chores2_3);
        // $shuffledChores = shuffle($shuffledChores);
        // $index= rand($shuffledChores);
        // return $shuffledChores[$index];
    }
    function getRange4_5(){
        $chores4_5 = array("Load the dishwasher", "Vacuum couch/chairs/cushions", "Take out recycling", "Set table", "Clear table",
        "Wash Dishes (with SUPERVISION)", "Clean windows", "Wipe out bathroom sinks", "Match socks", "Fold dish towels", "Water indoor plants");
        return $chores4_5;
    }
    function getRange6_8(){
        $chores6_8 = array("Meal prep (wash produce, find ingredients, simple cutting)", "Wipe bathroom sinks, counters, toilets", 
        "Hang out laundry", "Sweep", "Vacuum", "Collect garbage", "Get mail", "Fold/hang laundry", "Clean Microwave", "Rake leaves");
        return $chores6_8;
    }
    function getRange9_11(){
        $chores9_11 = array("Make simple meals", "Take garbage/recycling to the curb", "Wash/dry clothes", "Clean toilets", "Mop floors");
        return $chores9_11;
    }

?>
