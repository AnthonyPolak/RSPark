<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Veículos</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Cadastro de Veículos</h2>

<form action="salvar_veiculo.php" method="POST">

<label>Cliente</label>
<select name="cliente_id" required>

<option value="">Selecione</option>

<?php
$sql = "SELECT id, nome FROM clientes";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<option value='".$row['id']."'>".$row['nome']."</option>";
}
?>

</select>

<div class="form-top">

<select name="cliente_id">
    <!-- clientes -->
</select>

<input type="text" name="placa" placeholder="Placa">
<input type="text" name="marca" placeholder="Marca">
<input type="text" name="modelo" placeholder="Modelo">
<input type="number" name="ano" placeholder="Ano">
<input type="text" name="cor" placeholder="Cor">

<button type="submit">Salvar</button>

</div>

</form>

<hr>

<h2>Veículos cadastrados</h2>

<table border="1">
<tr>
<th>ID</th>
<th>Cliente</th>
<th>Placa</th>
<th>Modelo</th>
<th>Ano</th>
</tr>

<?php
$sql = "SELECT v.*, c.nome AS cliente 
        FROM veiculos v
        JOIN clientes c ON c.id = v.cliente_id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['cliente']}</td>
        <td>{$row['placa']}</td>
        <td>{$row['modelo']}</td>
        <td>{$row['ano']}</td>
    </tr>";
}
?>

</table>

</body>
</html>