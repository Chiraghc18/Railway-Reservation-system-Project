<?php
if($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $fullname=$_POST["fullname"];
    $username=$_POST["username"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $phnumber=$_POST["phnumber"];
    $email=$_POST["email"];
    $city=$_POST["city"];
    $pwd=$_POST["password"];

    try {
        require '../../DB_Connector/database_connector.php';

        $query = "INSERT INTO USERS(FULL_NAME,USER_NAME,GENDER,AGE,MOBILE_NO,EMAIL,CITY,PASSWORD)
                   VALUES(:fullname,:username,:gender,:age,:mobileno,:email,:city,:pwd);";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':mobileno', $phnumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':city', $city);

        $stmt->bindParam(':pwd',$pwd);
        $stmt->execute();

        header("Location: ../index.php");

        
       

        // Close connections
       
    } catch (PDOException $e) {
        die("Query failed : " . $e->getMessage());
    }

}
else
 {
    header("Location: ../index.php");
    exit(); // Ensure script stops execution after redirection
}