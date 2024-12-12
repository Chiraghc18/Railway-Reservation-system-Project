<?php
if($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $tname = $_POST["tname"];
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $acSeats = $_POST["Ac_no"];
    $normalSeats = $_POST["Normal_no"];
    $departureTime = $_POST["D_time"];
    $arrivalTime = $_POST["A_time"];
    $acCost = $_POST["Ac_cost"];
    $normalCost = $_POST["Normal_cost"];
    $route = $_POST["route"];

    try {
        require '../../DB_Connector/database_connector.php';

        $query = "INSERT INTO trains (t_name, source, destination, no_of_ac_seats,no_of_normal_seats,start_time, reach_time,AC_seat_cost,normal_seat_cost, route) VALUES (:tname, :source, :destination, :acSeats, :normalSeats, :departureTime, :arrivalTime, :acCost, :normalCost, :route)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':tname', $tname);
        $stmt->bindParam(':source', $source);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':acSeats', $acSeats);
        $stmt->bindParam(':normalSeats', $normalSeats);
        $stmt->bindParam(':departureTime', $departureTime);
        $stmt->bindParam(':arrivalTime', $arrivalTime);
        $stmt->bindParam(':acCost', $acCost);
        $stmt->bindParam(':normalCost', $normalCost);
        $stmt->bindParam(':route', $route);

        $stmt->execute();
        
        // Optionally, you can add a success message here.
        header("Location: ../train_list.php");

    } catch (PDOException $e) {
        // Handle errors gracefully
        echo "Error: " . $e->getMessage();
    }
}
?>
