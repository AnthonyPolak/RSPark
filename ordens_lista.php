<?php
include("config.php");
?>

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

<h2>Ordens de Serviço</h2>

<table>
<tr>
<th>ID</th>
<th>Cliente</th>
<th>Veículo</th>
<th>Serviços</th>
<th>Total</th>
<th>Status</th>
<th>Data</th>
</tr>

<?php

$sql = "
SELECT 
o.id,
c.nome AS cliente,
v.modelo,
v.placa,
o.status,
o.valor_total,
o.data_entrada
FROM ordens_servico o
JOIN clientes c ON c.id = o.cliente_id
JOIN veiculos v ON v.id = o.veiculo_id
ORDER BY o.id DESC
";

$res = $conn->query($sql);

while($row = $res->fetch_assoc()){

    // BUSCAR SERVIÇOS DA ORDEM
    $servicos_sql = "
    SELECT descricao 
    FROM ordem_itens 
    WHERE ordem_id = ".$row['id'];

    $servicos_res = $conn->query($servicos_sql);

    $servicos = [];
    while($s = $servicos_res->fetch_assoc()){
        $servicos[] = $s['descricao'];
    }

    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['cliente']}</td>
        <td>{$row['modelo']} ({$row['placa']})</td>
        <td>".implode(', ', $servicos)."</td>
        <td>R$ {$row['valor_total']}</td>
        <td>{$row['status']}</td>
        <td>{$row['data_entrada']}</td>
    </tr>";
}
?>

</table>

</main>

</body>
</html>