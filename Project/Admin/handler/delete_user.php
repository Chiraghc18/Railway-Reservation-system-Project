<?php
require '../../DB_Connector/database_connector.php';

if(isset($_GET['username'])) 
{
    // Access the username value and sanitize it
    $username = $_GET['username'];

    // Prepare and execute the DELETE query using a prepared statement
    $query = "DELETE FROM users WHERE USER_NAME = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute(); 

    // Check if the user was successfully deleted
    $query = "SELECT * FROM users WHERE USER_NAME = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // If user doesn't exist after deletion, redirect to user list page
    if($result == null)
    {
        header("Location: ../user_list.php");
        exit(); // Add exit to stop further execution
    }
    header("Location: ../user_list.php");
   
}
?>
