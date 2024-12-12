<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require '../../DB_Connector/database_connector.php';

        $query = "SELECT * FROM Admin WHERE username = :username";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin['PASSWORD']==$password ) {
            header("Location: ../train_list.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            // Incorrect username or password
            echo '<script>';
            echo 'alert("Wrong username or Password");';
            echo 'window.location.href="../index.php";';
            echo '</script>';
            exit(); // Ensure script stops execution after redirection
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect if not a POST request
    header("Location: ../index.php");
    exit(); // Ensure script stops execution after redirection
}
?>
