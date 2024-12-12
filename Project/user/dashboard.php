<?php
session_start();
include "header.php";
require '../DB_Connector/database_connector.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Prepare the SQL query with a placeholder
    $query = "SELECT * FROM dashboard WHERE user_name = :username";

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Bind the parameter
    $stmt->bindParam(':username', $username);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Now you can work with the $result variable
    // ...
} else {
    echo "Username parameter is missing.";
}
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