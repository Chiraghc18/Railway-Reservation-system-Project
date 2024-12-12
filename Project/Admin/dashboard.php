<?php 
include "header.php";
require '../DB_Connector/database_connector.php';
$query="SELECT * from dashboard";

$stmt = $pdo->prepare($query);

$stmt->execute();
        
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE/dashboard.css">
</head>
<body>
    <?php
     echo "<table class='train_content'>";
     echo"<tr class='content_row'>";
     echo "<th class='content_items'>NAME<th>";
     echo "<th class='content_items'>Train_Name<th>";
     echo "<th class='content_items'>Starting Point<th>";
     echo "<th class='content_items'>Destination Point<th>";
     echo "<th class='content_items'>Starting Time<th>";
     echo "<th class='content_items'>Reach Time<th>";
     echo "<th class='content_items'>Selected Seat Type<th>";
     echo "<th class='content_items'>Cost of Seat<th>";
     echo "<th class='content_items'>Route<th>";
     echo "<th class='content_items'>Reservation Status<th>";
     echo "<th class='content_items'>Payment<th>";
     echo "<th class='content_items'>Cancel Reservation<th>";
     echo"<tr>";  
      
        foreach ($result as $row)
        {
             
                echo"<tr class='content_row'>";
                    echo "<th class='content_items'>".$row["name"]."<th>";
                    echo  "<th class='content_items'>".$row["train_name"]."<th>";
                    
                    echo  "<th class='content_items'>".$row["source"]."<th>";
                    
                    echo "<th class='content_items'>".$row["destination"]."<th>";
                    echo "<th class='content_items'>".$row["departure_time"]."<th>";
                    
                    echo "<th class='content_items'>".$row["arrival_time"]."<th>";
                    echo "<th class='content_items'>".$row["seat"]."<th>";
                    echo "<th class='content_items'>".$row["cost"]."<th>";
                    echo "<th class='content_items'>".$row["route"]."<th>";
                    echo "<th class='content_items'> Reserved<th>";
                    echo "<th class='content_items'> Not done<th>";
                    echo '<th class="content_items"><a href="cancel_reservation.php?id=' . $row["id"] . ' & "><button class="delete_btn">Cancel</button></a></th>';
   
                echo"<tr>";  
               
        }
        echo "<table>"; 
    ?>    

</body>
</html>