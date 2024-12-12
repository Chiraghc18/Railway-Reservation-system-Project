<?php  include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE/add_railway.css">
</head>
<body>

     <form action="handler/add_train_handler.php" method="post">
    <div class="login_container">  
        <center><h1 style="margin-top: 30px;">New Train</h1></center>
        <div class="content">
        <label for="1"> Train Name</label>
        <input type="text"  id="1" name="tname" placeholder="Enter Train Name" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
        </div> 

       <div class="content">
       <label for="2">Start Station </label>
       <input type="text" id="2" name="source" placeholder="Enter Source" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="3">Destination Station </label>
       <input type="text" id="3" name="destination" placeholder="Enter Destination" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

        <div class="content">
        <label for="4"> Number of seats in AC Coach</label>
        <input type="number" id="4" name="Ac_no" placeholder="Enter number of seats" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
        </div> 

        <div class="content">
       <label for="5">Number of seats in Normal Coach</label> 
       <input type="number" id="5" name="Normal_no" placeholder="Enter number of seats" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="6">Departure Time</label>
       <input type="time" id="6" name="D_time" placeholder="Enter Start Time" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="7"> Arrival Time</label>
       <input type="time" id="7" name="A_time" placeholder="Enter End Time" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div> 

       <div class="content">
      <label for="8"> Cost of 1 AC Seat</label>
      <input type="number" id="8" name="Ac_cost" placeholder="Enter Cost" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
      </div> 

      <div class="content">
      <label for="9"> Cost of 1 Normal Seat</label>
      <input type="number" id="9" name="Normal_cost" placeholder="Enter Cost" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
      </div> 

      <div class="content">
       <label for="10">Journey Stops </label>
       <input type="text" id="10" name="route" placeholder="Enter stops" class="in_content" style="margin-top:3px;" required autocomplete="off"><br><br>
       </div>
    <center><button type="submit" class="btn content">Add</button></center>
     </form>
    </div>  
</body>
</html>