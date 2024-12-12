<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE//ss1.css">
</head>
<body>

     <form action="include/signup_handler.php" method="post">
    <div class="login_container">  
        <center><h1>SignUp</h1></center>
        <div class="content">
        <label for="1"> First Name 
        <input type="text"  id="1" name="fullname" placeholder="Enter Your FullName" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
        </div> 

       <div class="content">
       <label for="2">User Name</label>
       <input type="text" id="2" name="username" placeholder="Enter Your UserName" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="3"> Gender </label>
        <select name="gender" id="3" class="gender" style="margin-top:3px;">
                   <option value="M" class="op">Male</option>
                   <option value="F" class="op">Female</option>
        </select><br><br>
        </div> 

        <div class="content">
        <label for="4"> Age</label>
        <input type="number" id="4" name="age" placeholder="Enter Your age" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
        </div> 

        <div class="content">
       <label for="5">Phone Number</label> 
       <input type="number" id="5" name="phnumber" placeholder="Enter Your Phone Number" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="6">Email</label>
       <input type="text" id="6" name="email" placeholder="Enter Your Email" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
       </div> 

       <div class="content">
       <label for="7"> City</label>
       <input type="text" id="7" name="city" placeholder="Enter Your city" class="in_content" style="margin-top:3px;" autocomplete="off"><br><br>
       </div> 

       <div class="content">
      <label for="8">  Password </label>
      <input type="password" id="8" name="password" placeholder="Enter Your Password" class="in_content" style="margin-top:3px;" autocomplete="off">
      </div> 

    <center><button type="submit" class="btn content">SignUp</button></center>
     </form>
    </div>  
</body>
</html>