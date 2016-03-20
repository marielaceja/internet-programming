<?php
include('../../includes/database.php');

    $dbConnection = getDatabaseConnection('otter_express');
    
    function getProductTypes(){
        global $dbConnection;
        $sql = "SELECT * FROM productType";
        $statement = $dbConnection->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
       // print_r($records);
        return $records;
    }
    
    function getProductList(){
        global $dbConnection;
        $sql = "SELECT productId, productName,price,calories FROM product WHERE 1"; // 1 returns all records
        
        if(isset($_GET['searchForm'])){
            //Check whether the search form was submitted
            
            $namedParameters = array();
            if(!empty($_GET['productType'])){
                //Following line DOESN'T prevent SQL INJECTION
                //$sql .=" AND productTypeId = " . $_GET['productType'];
                
                // THIS does. Uses named parameters to prevent SQL injection
                $sql .=" AND productTypeId = :productTypeId";
                $namedParameters[":productTypeId"]= $_GET['productType'];
            }
            if(!empty($_GET['maxPrice'])){
                // $sql .=" AND price <= ". $_GET['maxPrice'];
                $sql .=" AND price <= :maxPrice";
                $namedParameters[":maxPrice"] = $_GET['maxPrice'];
            }
            if(isset($_GET['healthyChoice'])){
                $sql .= "AND healthyChoice = 1";
            }
            // else if(!isset($_GET['healthyChoice'])){
            //     $sql .= "AND healthyChoice = 0 OR healthyChoice = 1";
            // }
            if (!isset($_GET['orderBy'])) {
                $sql .= " ORDER BY " . $_GET['orderBy'];
            }
        }

        $statement = $dbConnection->prepare($sql);
        $statement->execute($namedParameters);
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
       // print_r($records);
        return $records;
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
        <hr /><br />
        <main>
            <h1 style="color:#00cc66;">Otter Express</h1>
            <h3 style="color:#00cc66;">Delivery System</h3>
            
            <form>
                Product Type:
                
                <select name="productType">
                    <option value="">All</option>
                    <?php
                        $productTypes = getProductTypes();
                        foreach($productTypes as $productType){
                            echo "<option value='".$productType['productTypeId']."'>" . $productType['productType'] . "</option>";
                        }
                    ?>
                </select>
                Max. Price:
                <input type="text" name="maxPrice" size=5>
                
                <input type="checkbox" name="healthyChoice" > Healthy Choice
                <br />
                Order results by
                <input type="radio" name="orderBy" value="productName">Product Name
                <input type="radio" name="orderBy" value="price" checked>Price
                <br />
                <input id="search" type ="submit" value="Search Products" name="searchForm">
                
            </form>
            <div style="float:left">
               <table border=1>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Calories</th>
                </tr>
                <?php
                    $productList = getProductList();
                    foreach($productList as $productItem){
                        echo "<tr>";
                            echo "<td><a target='productInfoiFrame' href='getProductInfo.php?productId=" . $productItem['productId'] ."'>" . $productItem['productName'] . "</a></td>";
                            echo "<td>" . $productItem['price'] . "</td>";
                            echo "<td>" . $productItem['calories'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            </div>
            
            <div style="float:left">
            <iframe name="productInfoiFrame" width="250" height="315" src="getProductInfo.php" frameborder="0">
            </iframe></div>
            
        </main>
        
    </body>
</html>