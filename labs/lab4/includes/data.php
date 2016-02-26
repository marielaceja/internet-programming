<?php
    function getCandidateList(){
        $candidateList = array("H. Clinton", "T. Cruz", "M. Rubio", "B. Sanders", "D. Trump", "B. Carson");
        sort($candidateList);
        return $candidateList;
    }
    function getProductList(){
        $productList = array();
        // Associative array
        $productList["Mug"] = 15;
        $productList["Cap"] = 20;
        $productList["Tote Bag"] = 10;
        $productList["Pin"] = 5;
        return $productList;
    }



?>