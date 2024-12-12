<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE//login_page.css">
</head>
<body>

<div>

    <form action="include/login_handler.php" method="post">
     
    <div class="login_container">
    <center><h1 class="header">Login</h1></center>
    
        <div class="content">
            <label for="1">Name</label>
             <input type="text" name="username"id="1" placeholder="Enter Your Name" class="in_content"  autocomplete="off">
        </div> 
        <div class="content">
            <label for="2">Password</label>
              <input type="password" name="password" id="2" placeholder="Enter Your Password" class="in_content" autocomplete="off">
        </div>
        <center><button type="submit" class="btn content">Login</button>
    </div>
     </form>
</div>     
</body>
</html>
