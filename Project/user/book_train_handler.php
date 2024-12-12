<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tname = $_POST["tname"];
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $departureTime = $_POST["D_time"];
    $arrivalTime = $_POST["A_time"];
    $seat = $_POST["Seat"];
    $cost = $_POST["Normal_cost"];
    $route = $_POST["route"];
    
    $id = $_GET['id'];
    $username = $_GET['user_name'];

    try {
        require '../DB_Connector/database_connector.php';

        // Retrieve user's full name
        $query1 = "SELECT full_name as name FROM users WHERE user_name = :username;";
        $stmt = $pdo->prepare($query1);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result1) {
            $name = $result1['name']; // Access the 'name' field
            
        }

        // Retrieve train name
        $query2 = "SELECT t_name FROM trains WHERE id = :id;";
        $stmt = $pdo->prepare($query2);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result2) {
            if ($tname == $result2['t_name']) {
                $t_name = $result2['t_name'];
                
            } else {
                
                $t_name = "Error";
            }
        }

       

        // Insert into dashboard table
        $query = "INSERT INTO dashboard(user_name,name,train_id,train_name,source,destination,departure_time,arrival_time,seat,cost,route)
                  VALUES (:username, :full_name, :id, :t_name, :source, :destination, :departure_time,:arrival_time, :seat, :cost, :route);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':full_name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':t_name', $t_name);
        $stmt->bindParam(':source', $source);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':departure_time', $departureTime);
        $stmt->bindParam(':arrival_time', $arrivalTime);
        $stmt->bindParam(':seat', $seat);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':route', $route);

        $stmt->execute();
       

        // Redirect after successful submission
       

        // exit();
         
        if ($seat == "AC") {
            $query3 = "UPDATE trains SET no_of_ac_seats = no_of_ac_seats - 1 WHERE id = :id";
            $stmt = $pdo->prepare($query3);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            $query4 = "UPDATE trains SET no_of_normal_seats = no_of_normal_seats - 1 WHERE id = :id";
            $stmt = $pdo->prepare($query4);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        header("Location: dashboard.php?username=" . urlencode($username));
        
    } catch (PDOException $e) {
        // Handle errors gracefully
        echo "Error: " . $e->getMessage();
    }
}

?>
