<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="./css/style.css">
</head>

<body>

<?php include("menu.php"); ?>

<main>

<h1>Painel de Controle</h1>

<div class="cards">

    <a href="clientes.php" class="card-link">
        <div class="card">
            <h3>👤 Clientes</h3>
            <p>Gerenciar clientes</p>
        </div>
    </a>

    <a href="veiculos.php" class="card-link">
        <div class="card">
            <h3>🚗 Veículos</h3>
            <p>Gerenciar veículos</p>
        </div>
    </a>

    <a href="ordens.php" class="card-link">
        <div class="card">
            <h3>🧾 Ordens</h3>
            <p>Serviços e faturamento</p>
        </div>
    </a>

</div>

</main>

</body>
</html>