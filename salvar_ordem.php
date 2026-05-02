<?php
include("config.php");

$cliente = $_POST['cliente_id'];
$veiculo = $_POST['veiculo_id'];
$data = $_POST['data_entrada'];
$status = $_POST['status'];
$total = $_POST['valor_total'];

$conn->begin_transaction();

try{

// salva ordem
$stmt = $conn->prepare("
INSERT INTO ordens_servico
(cliente_id, veiculo_id, data_entrada, status, valor_total)
VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param("iissd", $cliente, $veiculo, $data, $status, $total);
$stmt->execute();

$ordem_id = $conn->insert_id;

// salva itens
$descricoes = $_POST['descricao'];
$valores = $_POST['valor'];

for($i=0; $i < count($descricoes); $i++){

    if(!empty($descricoes[$i])){

        $stmt = $conn->prepare("
        INSERT INTO ordem_itens
        (ordem_id, descricao, valor)
        VALUES (?, ?, ?)
        ");

        $stmt->bind_param("isd", $ordem_id, $descricoes[$i], $valores[$i]);
        $stmt->execute();
    }
}

$conn->commit();

header("Location: ordens.php");

}catch(Exception $e){

    $conn->rollback();
    echo "Erro: " . $e->getMessage();
}
?>