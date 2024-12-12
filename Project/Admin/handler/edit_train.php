<?php
require '../../DB_Connector/database_connector.php';

if(isset($_GET['id'])) 
{
    // Access the username value and sanitize it
    $id = $_GET['id'];

    // Prepare and execute the DELETE query using a prepared statement
  

    // Check if the user was successfully deleted
    $query = "SELECT * FROM trains WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) 
    {
        $tname=$row["t_name"];
        $source=$row["source"];
        $destination=$row["destination"];
        $Ac_no=$row["no_of_ac_seats"];
        $Normal_no=$row["no_of_normal_seats"];
        $D_time=$row["start_time"];
        $A_time=$row["reach_time"];
        $Ac_cost=$row["AC_seat_cost"];
        $Normal_cost=$row["normal_seat_cost"];
        $route=$row["route"];


    }
    

    // If user doesn't exist after deletion, redirect to user list page
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../STYLE/edit_train.css">
</head>
<body>

     <form action='edit_train_handler.php?id=<?php echo $row["id"]; ?>' method="post">

    <div class="login_container">  
        <center><h1>Change Train Details</h1></center>
        <div class="content">
        <label for="1"> Train Name</label>
        <input type="text"  id="1" value="<?php echo htmlspecialchars($tname); ?>" name="tname" placeholder="Enter Train Name" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
        </div> 

       <div class="content">
       <label for="2">Start Station </label>
       <input type="text" id="2" name="source" value="<?php echo htmlspecialchars($source); ?>" placeholder="Enter Source" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="3">Destination Station </label>
       <input type="text" id="3" name="destination"value="<?php echo htmlspecialchars($destination); ?>" placeholder="Enter Destination" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

        <div class="content">
        <label for="4"> Number of seats in AC Coach</label>
        <input type="number" id="4" name="Ac_no" value="<?php echo htmlspecialchars($Ac_no); ?>" placeholder="Enter number of seats" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
        </div> 

        <div class="content">
       <label for="5">Number of seats in Normal Coach</label> 
       <input type="number" id="5" name="Normal_no"  value="<?php echo htmlspecialchars($Normal_no); ?>" placeholder="Enter number of seats" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="6">Departure Time</label>
       <input type="time" id="6" name="D_time" value="<?php echo htmlspecialchars($D_time); ?>" placeholder="Enter Start Time" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="7"> Arrival Time</label>
       <input type="time" id="7" name="A_time" value="<?php echo htmlspecialchars($A_time); ?>" placeholder="Enter End Time" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
      <label for="8"> Cost of 1 AC Seat</label>
      <input type="number" id="8" name="Ac_cost"  value="<?php echo htmlspecialchars($Ac_cost); ?>" placeholder="Enter Cost" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
      </div> 

      <div class="content">
      <label for="9"> Cost of 1 Normal Seat</label>
      <input type="number" id="9" name="Normal_cost" value="<?php echo htmlspecialchars($Normal_cost); ?>"  placeholder="Enter Cost" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
      </div> 

      <div class="content">
       <label for="10">Journey Stops </label>
       <input type="text" id="10" name="route" value="<?php echo htmlspecialchars($route); ?>" placeholder="Enter stops" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div>
    <center><button type="submit" class="btn content">change</button></center>
     </form>
    </div>  
</body>
</html>
