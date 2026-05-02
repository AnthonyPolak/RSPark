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

<button type="button" class="btn" onclick="adicionarServico()">+ Adicionar Serviço</button>

<br><br>

<input type="text" id="total" name="valor_total" placeholder="Total" readonly>

<br><br>

<button type="submit" class="btn">Salvar Ordem</button>

</form>

</main>

<script>

function adicionarServico(){
    const container = document.getElementById("servicos");

    const div = document.createElement("div");
    div.classList.add("servico");

    div.innerHTML = `
        <input type="text" name="descricao[]" placeholder="Serviço">
        <input type="number" step="0.01" name="valor[]" placeholder="Valor" oninput="somarTotal()">
        <button type="button" onclick="removerServico(this)">X</button>
    `;

    container.appendChild(div);
}

function removerServico(btn){
    btn.parentElement.remove();
    somarTotal();
}

function somarTotal(){
    let total = 0;
    document.querySelectorAll("input[name='valor[]']").forEach(input => {
        total += parseFloat(input.value) || 0;
    });

    document.getElementById("total").value = total.toFixed(2);
}

window.onload = () => adicionarServico();

</script>

</body>
</html>