<?php 
$servername = "localhost";
$username = "root";
$password = "";
$myDB = 'fusionfit360';
$port_no = 3307;
try{ 
$conn = new PDO("mysql:host = $servername; port=$port_no, dbname= $myDB", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connection successfull";
} catch(PDOException $e){
 echo "Connection failed : ". $e->getMessage();
} ?>

       