<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Clientes</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("menu.php"); ?>

<main>

<h2>Cadastro de Clientes</h2>

<form action="salvar_cliente.php" method="POST">

<div class="form-grid">

<input type="text" name="nome" placeholder="Nome" required>
<input type="text" name="telefone" placeholder="Telefone">
<input type="email" name="email" placeholder="Email">

<button type="submit" class="btn">Salvar</button>

</div>

</form>

<hr>

<h2>Clientes cadastrados</h2>

<table>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Telefone</th>
<th>Email</th>
<th>Ações</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM clientes ORDER BY id DESC");

while($row = $res->fetch_assoc()){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>{$row['telefone']}</td>
        <td>{$row['email']}</td>
        <td>
            <a href='excluir_cliente.php?id={$row['id']}' class='btn-delete'>Excluir</a>
        </td>
    </tr>";
}
?>

</table>

</main>

</body>
</html>