<?php
include("config.php");

$stmt = $conn->prepare("
INSERT INTO veiculos (cliente_id, placa, marca, modelo, ano, cor)
VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
"isssis",
$_POST['cliente_id'],
$_POST['placa'],
$_POST['marca'],
$_POST['modelo'],
$_POST['ano'],
$_POST['cor']
);

$stmt->execute();

header("Location: veiculos.php");
?>