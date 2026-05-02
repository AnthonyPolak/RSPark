<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "rspark_bd";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("Erro conexão: " . $conn->connect_error);
}
?>