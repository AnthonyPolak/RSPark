<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ordens</title>
<link rel="stylesheet" href="css/style.css">

<script>
function adicionarServico(){
    let container = document.getElementById("servicos");

    let html = `
        <div class="servico">
            <input type="text" name="descricao[]" placeholder="Serviço">
            <input type="number" step="0.01" name="valor[]" placeholder="Valor" oninput="somarTotal()">
        </div>
    `;

    container.innerHTML += html;
}

function somarTotal(){
    let valores = document.getElementsByName("valor[]");
    let total = 0;

    valores.forEach(v => {
        total += parseFloat(v.value) || 0;
    });

    document.getElementById("total").value = total.toFixed(2);
}
</script>

</head>
<body>

<h2>Nova Ordem</h2>

<form action="salvar_ordem.php" method="POST">

<div class="form-top">

<select name="cliente_id" required>
<option value="">Cliente</option>
<?php
$res = $conn->query("SELECT * FROM clientes");
while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>
</select>

<select name="veiculo_id" required>
<option value="">Veículo</option>
<?php
$res = $conn->query("SELECT * FROM veiculos");
while($v = $res->fetch_assoc()){
    echo "<option value='{$v['id']}'>{$v['modelo']} - {$v['placa']}</option>";
}
?>
</select>

<input type="date" name="data_entrada">

<select name="status">
    <option>Em andamento</option>
    <option>Finalizado</option>
    <option>Entregue</option>
</select>

</div>

<hr>

<h3>Serviços</h3>

<div id="servicos"></div>

<button type="button" onclick="adicionarServico()">+ Adicionar Serviço</button>

<br><br>

<input type="text" id="total" name="valor_total" placeholder="Total" readonly>

<br><br>

<button type="submit">Salvar Ordem</button>

</form>

</body>
</html>