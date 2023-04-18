<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "co";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8mb4'",
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
try{
    $dsn = "mysql:host=$servername;dbname=$database";
    $conn = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo "Connection Failed" .$e->getMessage();
}
?>