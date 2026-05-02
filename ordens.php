<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Ordens</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("menu.php"); ?>

<main>

<h2>Nova Ordem</h2>

<form action="salvar_ordem.php" method="POST">

<div class="form-grid">

<!-- CLIENTE -->
<select name="cliente_id" id="cliente" required>
<option value="">Cliente</option>
<?php
$res = $conn->query("SELECT * FROM clientes");
while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>
</select>

<!-- VEÍCULO -->
<select name="veiculo_id" id="veiculo" required>
<option value="">Veículo</option>
<?php
$res = $conn->query("SELECT * FROM veiculos");
while($v = $res->fetch_assoc()){
    echo "<option value='{$v['id']}'>{$v['modelo']} - {$v['placa']}</option>";
}
?>
</select>

<!-- DATA -->
<input type="date" name="data_entrada">

<!-- STATUS -->
<select name="status">
    <option>Em andamento</option>
    <option>Finalizado</option>
    <option>Entregue</option>
</select>

</div>

<hr>

<h3>Serviços</h3>

<div id="servicos"></div>

<button type="button" class="btn" onclick="adicionarServico()">+ Adicionar Serviço</button>

<br><br>

<input type="text" id="total" name="valor_total" placeholder="Total" readonly>

<br><br>

<button type="submit" class="btn">Salvar Ordem</button>

</form>

</main>

<!-- SCRIPT -->
<script>

function adicionarServico(){
    let container = document.getElementById("servicos");

    let html = `
        <div class="servico">
            <input type="text" name="descricao[]" placeholder="Serviço">
            <input type="number" step="0.01" name="valor[]" placeholder="Valor" oninput="somarTotal()">
            <button type="button" onclick="removerServico(this)">❌</button>
        </div>
    `;

    container.innerHTML += html;
}

function removerServico(btn){
    btn.parentElement.remove();
    somarTotal();
}

function somarTotal(){
    let valores = document.getElementsByName("valor[]");
    let total = 0;

    valores.forEach(v => {
        total += parseFloat(v.value) || 0;
    });

    document.getElementById("total").value = total.toFixed(2);
}

// já inicia com 1 serviço
window.onload = function(){
    adicionarServico();
}

</script>

</body>
</html>