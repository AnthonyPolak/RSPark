<?php
session_start();
require "config.php";

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}

// CONTADORES
$clientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
$veiculos = $conn->query("SELECT COUNT(*) as total FROM veiculos")->fetch_assoc()['total'];
$ordens   = $conn->query("SELECT COUNT(*) as total FROM ordens_servico")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.sidebar{
    height:100vh;
    background:#111;
    color:#fff;
    padding:20px;
}
.sidebar a{
    display:block;
    color:#ccc;
    padding:10px;
    text-decoration:none;
}
.sidebar a:hover{
    background:#dc3545;
    color:#fff;
}
</style>

</head>

<body>

<div class="container-fluid">
<div class="row">

<div class="col-2 sidebar">
    <h4>RS Park</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="clientes.php">Clientes</a>
    <a href="logout.php">Sair</a>
</div>

<div class="col-10 p-4">

<h3>Bem-vindo, <?php echo $_SESSION['usuario']; ?></h3>

<div class="row mt-4">

<div class="col-md-4">
    <div class="card p-3 shadow">
        <h5>Clientes</h5>
        <p class="fs-3"><?php echo $clientes; ?></p>
    </div>
</div>

<div class="col-md-4">
    <div class="card p-3 shadow">
        <h5>Veículos</h5>
        <p class="fs-3"><?php echo $veiculos; ?></p>
    </div>
</div>

<div class="col-md-4">
    <div class="card p-3 shadow">
        <h5>Ordens</h5>
        <p class="fs-3"><?php echo $ordens; ?></p>
    </div>
</div>

</div>

</div>
</div>
</div>

</body>
</html>