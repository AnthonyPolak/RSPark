<?php
include("config.php");

$cliente_id = $_POST['cliente_id'];
$placa = strtoupper($_POST['placa']);
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$cor = $_POST['cor'];

$sql = "INSERT INTO veiculos
(cliente_id, marca, modelo, placa, ano, cor)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssis",
    $cliente_id,
    $marca,
    $modelo,
    $placa,
    $ano,
    $cor
);

if($stmt->execute()){
    header("Location: veiculos.php");
}else{
    echo "Erro: " . $stmt->error;
}
?>