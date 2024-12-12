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

    $id=$_GET['id'];

    try {
        require '../../DB_Connector/database_connector.php';

        $query = "UPDATE trains 
        SET t_name=:tname, source=:source, destination=:destination, no_of_ac_seats=:acSeats,
        no_of_normal_seats=:normalSeats,start_time=:departureTime, reach_time=:arrivalTime,
        AC_seat_cost=:acCost,normal_seat_cost=:normalCost, route=:route
        WHERE id=$id";

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
