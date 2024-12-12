<?php

$dsn="mysql:host=localhost;dbname=RAILWAYS";
$dbusername="root";
$dbpassword="";

try {
    $pdo=new PDO($dsn,$dbusername,$dbpassword);// it is enough 
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
   echo "Connection Failed: ".$e->getMessage();
}


