<?php
require '../../DB_Connector/database_connector.php';

if(isset($_GET['id'])) 
{
    // Access the username value and sanitize it
    $id = $_GET['id'];

    // Prepare and execute the DELETE query using a prepared statement
    $query = "DELETE FROM trains WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 

    // Check if the user was successfully deleted
    $query = "SELECT * FROM trains WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // If user doesn't exist after deletion, redirect to user list page
    if($result == null)
    {
        header("Location: ../train_list.php");
        exit(); // Add exit to stop further execution
    }
    else
    {
        // Handle error if user still exists after deletion
        // You can display an error message or take appropriate action
    }
}
?>
