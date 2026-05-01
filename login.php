<?php
session_start();
include("config.php");

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
$stmt->bind_param("ss", $login, $senha);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $login;
    header("Location: dashboard.php");
    exit;
} else {
    echo "Login inválido!";
}
?>