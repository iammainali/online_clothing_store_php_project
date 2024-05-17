<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project_aakriti";

$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE DATABASE IF NOT EXISTS project_aakriti";
mysqli_query($connection, $sql);

$connection = mysqli_connect($servername, $username, $password, $database);

$user_table = "CREATE TABLE IF NOT EXISTS users(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    psw VARCHAR(255)
)";

$product_table = "CREATE TABLE IF NOT EXISTS products(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    image VARCHAR(255),
    price FLOAT(10)
);";

mysqli_query($connection, $user_table);
mysqli_query($connection, $product_table);

?>
