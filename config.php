<?php
$conn = new mysqli("localhost", "root", "", "rspark_bd");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>