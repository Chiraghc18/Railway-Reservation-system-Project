<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    session_start();

// Set the username in a session variable
$_SESSION['username'] = $username;
    try {
        require '../../DB_Connector/database_connector.php';

        $query = "SELECT * FROM USERS WHERE USER_NAME = :username";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['PASSWORD']==$password) {
            header('Location: ../../user/train_list.php?username=' . urlencode($username));
            exit(); // Ensure script stops execution after redirection
        } else {
            // Incorrect username or password
            echo '<script>';
            echo 'alert("Wrong username or Password");';
            echo 'window.location.href="../login_page.php";';
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
