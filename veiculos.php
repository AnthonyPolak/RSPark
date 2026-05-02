<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Veículos</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("menu.php"); ?>

<main>

<h2>Cadastro de Veículos</h2>

<form action="salvar_veiculo.php" method="POST">

<div class="form-grid">

<select name="cliente_id" required>
<option value="">Cliente</option>
<?php
$res = $conn->query("SELECT * FROM clientes");
while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>
</select>

<input type="text" name="placa" placeholder="Placa" required>
<input type="text" name="marca" placeholder="Marca" required>
<input type="text" name="modelo" placeholder="Modelo" required>
<input type="number" name="ano" placeholder="Ano">
<input type="text" name="cor" placeholder="Cor">

<button class="btn">Salvar</button>

</div>

</form>

<h2>Veículos cadastrados</h2>

<table>
<tr>
<th>ID</th>
<th>Cliente</th>
<th>Placa</th>
<th>Modelo</th>
<th>Ano</th>
</tr>

<?php
$sql = "SELECT v.*, c.nome cliente 
        FROM veiculos v
        JOIN clientes c ON c.id=v.cliente_id";

$res = $conn->query($sql);

while($row = $res->fetch_assoc()){
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

</main>

</body>
</html>