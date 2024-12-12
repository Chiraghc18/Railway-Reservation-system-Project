<?php 
include "header.php";
require '../DB_Connector/database_connector.php';
$query="SELECT * from trains";

$stmt = $pdo->prepare($query);

$stmt->execute();
        
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train List</title>
    <link rel="stylesheet" href="STYLE/train_list.css">
</head>
<body>
    <?php
     echo "<table class='train_content'>";
     echo"<tr class='content_row'>";
     echo "<th class='content_items'>Train Name<th>";
     echo "<th class='content_items'>Starts At<th>";
     echo "<th class='content_items'>Stops At<th>";
     echo "<th class='content_items'>AC Cost<th>";
     echo "<th class='content_items'>Normal  Cost<th>";
    //  echo "<th class='content_items'>Number of seats in AC<th>";
    //  echo "<th class='content_items'>Number of seats in Normal <th>";
     echo "<th class='content_items'>Departure Time<th>";
     echo "<th class='content_items'>Reach Time<th>";
    //  echo "<th class='content_items'>Route<th>";
     
     echo "<th class='content_items'>Action<th>";
     echo"<tr>";  
      
        foreach ($result as $row)
        {
             
                echo"<tr class='content_row'>";
                   
                echo "<th class='content_items'>".$row["t_name"]."<th>";
                echo  "<th class='content_items'>".$row["source"]."<th>";
              
                echo  "<th class='content_items'>".$row["destination"]."<th>";

                echo  "<th class='content_items'>".$row["AC_seat_cost"]."<th>";
                echo  "<th class='content_items'>".$row["normal_seat_cost"]."<th>";
                // echo  "<th class='content_items'>".$row["no_of_ac_seats"]."<th>";
                // echo  "<th class='content_items'>".$row["no_of_normal_seats"]."<th>";
                
                echo "<th class='content_items'>".$row["start_time"]."<th>";
                echo "<th class='content_items'>".$row["reach_time"]."<th>";
                
                // echo "<th class='content_items'>".$row["route"]."<th>";
                    
                    echo '<th class="content_items">
                    <a href="handler/edit_train.php?id=' . $row["id"] . '"><button class="delete_btn">Edit</button></a> 
                    <a href="handler/train_delete.php?id=' . $row["id"] . '"><button class="delete_btn">delete</button></a></th>';
                  
   
                echo"<tr>";  
               
        }
        echo "<table>"; 
    ?>    

</body>
</html>