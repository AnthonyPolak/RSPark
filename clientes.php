<?php
session_start();
require "config.php";

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}

// SALVAR
if(isset($_POST['nome'])){
    $sql = "INSERT INTO clientes (nome, telefone, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_POST['nome'], $_POST['telefone'], $_POST['email']);
    $stmt->execute();
}

// EXCLUIR
if(isset($_GET['excluir'])){
    $stmt = $conn->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

// LISTAR
$result = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Clientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>Clientes</h3>

<form method="POST" class="row g-2">
    <div class="col-md-4">
        <input name="nome" class="form-control" placeholder="Nome" required>
    </div>
    <div class="col-md-3">
        <input name="telefone" class="form-control" placeholder="Telefone">
    </div>
    <div class="col-md-3">
        <input name="email" class="form-control" placeholder="Email">
    </div>
    <div class="col-md-2">
        <button class="btn btn-success w-100">Salvar</button>
    </div>
</form>

<hr>

<table class="table table-striped">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Ações</th>
</tr>

<?php while($c = $result->fetch_assoc()): ?>
<tr>
    <td><?= $c['id'] ?></td>
    <td><?= $c['nome'] ?></td>
    <td><?= $c['telefone'] ?></td>
    <td><?= $c['email'] ?></td>
    <td>
        <a href="?excluir=<?= $c['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<a href="dashboard.php" class="btn btn-secondary">Voltar</a>

</div>

</body>
</html>