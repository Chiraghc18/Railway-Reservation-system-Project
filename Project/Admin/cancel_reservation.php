<?php
require '../DB_Connector/database_connector.php';

if(isset($_GET['id'])) 
{
    // Access the ID value and sanitize it
    $id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM dashboard WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    // Execute the DELETE query and check for success
    if ($stmt->execute()) {
        // Deletion successful
        header("Location: dashboard.php?success=true"); // Redirect with success parameter
        exit();
    } else {
        // Deletion failed
        header("Location: dashboard.php?success=false"); // Redirect with failure parameter
        exit();
    }
}
?>
