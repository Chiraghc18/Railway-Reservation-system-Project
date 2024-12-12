<?php
require '../DB_Connector/database_connector.php';

if(isset($_GET['id'])) 
{
    // Access the username value and sanitize it
    $id = $_GET['id'];
    if(isset($_GET['username'])) {
        // Retrieve the username from the URL
        $username = $_GET['username'];
    

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE/book_train1.css">
</head>
<body>

     <form action='book_train_handler.php?id=<?php echo $id; ?> &user_name=<?php echo "$username"; ?> ' method="post">

    <div class="login_container">  
        <center><h1>Booking Train Details</h1></center>
        <div class="content">
        <label for="1"> Train Name</label>
        <input type="text"  id="1" value="<?php echo htmlspecialchars($tname); ?>" name="tname" placeholder="Enter Train Name" class="in_content" style="margin-top:3px;" readonly required ><br><br>
        </div> 

       <div class="content">
       <label for="2">Start Station </label>
       <input type="text" id="2" name="source" value="<?php echo htmlspecialchars($source); ?>" placeholder="Enter Source" class="in_content" style="margin-top:3px;" required autocomplete="off" readonly><br><br>
       </div> 

       <div class="content">
       <label for="3">Destination Station </label>
       <input readonly type="text" id="3" name="destination"value="<?php echo htmlspecialchars($destination); ?>" placeholder="Enter Destination" class="in_content" style="margin-top:3px;" required readonly><br><br>
       </div> 
       <div class="content">
       <label for="6">Departure Time</label>
       <input readonly type="time" id="6" name="D_time" value="<?php echo htmlspecialchars($D_time); ?>" placeholder="Enter Start Time" class="in_content" style="margin-top:3px;" required readonly><br><br>
       </div> 

       <div class="content">
       <label for="7"> Arrival Time</label>
       <input readonly type="time" id="7" name="A_time" value="<?php echo htmlspecialchars($A_time); ?>" placeholder="Enter End Time" class="in_content" style="margin-top:3px;" required readonly><br><br>
       </div> 

       <div class="content" style="margin-bottom:30px;">
            <label for="8"> Select type of Seat</label>
            <select name="Seat" id="seatType" class="sel" onchange="updateCost()" style="background-color: rgba(255, 165, 0, 0.8) ;">
                <option value="AC" class="opt" data-cost="<?php echo $Ac_cost; ?>" selected>AC Seat</option>
                <option value="Normal" class="opt" data-cost="<?php echo $Normal_cost; ?>">Normal Seat</option>
            </select>
        </div> 

        <div class="content">
            <label for="9"> Cost Of Seat</label>
            <input readonly type="number" id="seatCost" name="Normal_cost" value="<?php echo htmlspecialchars($Ac_cost); ?>" placeholder="Enter Cost" class="in_content" style="margin-top:3px;" required readonly><br><br>
        </div> 

      <div class="content">
       <label for="10">Journey Stops </label>
       <input readonly type="text" id="10" name="route" value="<?php echo htmlspecialchars($route); ?>" placeholder="Enter stops" class="in_content" style="margin-top:3px;" required readonly><br><br>
       </div>
    <center><button type="submit" class="btn content">Book</button></center>
     </form>
    </div>  
 <script>
    // JavaScript function to update cost of seat based on selection
    function updateCost() {
        var selectedOption = document.getElementById('seatType').value;
        var cost = (selectedOption === 'AC') ? <?php echo $Ac_cost; ?> : <?php echo $Normal_cost; ?>;
        document.getElementById('seatCost').value = cost;
    }
</script>

</body>
</html>
