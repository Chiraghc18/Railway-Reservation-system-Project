<?php 
include "header.php";
require '../DB_Connector/database_connector.php';
$query="SELECT * from users";

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
    <link rel="stylesheet" href="STYLE/user_list.css">
</head>
<body>
    <?php
     echo "<table class='train_content'>";
     echo"<tr class='content_row'>";
     echo "<th class='content_items'>NAME<th>";
     echo "<th class='content_items'>GENDER<th>";
     echo "<th class='content_items'>AGE<th>";
     echo "<th class='content_items'>MOBILE NUMBER<th>";
     echo "<th class='content_items'>CITY<th>";
     echo "<th class='content_items'>DELETE<th>";
     echo"<tr>";  
      
        foreach ($result as $row)
        {
             
                echo"<tr class='content_row'>";
                    echo "<th class='content_items'>".$row["FULL_NAME"]."<th>";
                    if($row["GENDER"]=="M")
                    {
                        echo  "<th class='content_items'>".$row["GENDER"]."ALE"."<th>";
                    }
                    else
                    {
                        echo  "<th class='content_items'>".$row["GENDER"]."EMALE"."<th>";
                    }
                    echo "<th class='content_items'>".$row["AGE"]."<th>";
                    echo "<th class='content_items'>".$row["MOBILE_NO"]."<th>";
                    
                    echo "<th class='content_items'>".strtoupper($row["CITY"])."<th>";
                    echo '<th class="content_items"><a href="handler/delete_user.php?username=' . $row["USER_NAME"] . '"><button class="delete_btn">delete</button></a></th>';
   
                echo"<tr>";  
               
        }
        echo "<table>"; 
    ?>    

</body>
</html>