<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card p-4 shadow" style="width:350px;">
    <h3 class="text-center mb-3">RS Park</h3>

    <form action="login.php" method="POST">
        <input class="form-control mb-2" type="text" name="login" placeholder="Usuário" required>
        <input class="form-control mb-3" type="password" name="senha" placeholder="Senha" required>
        <button class="btn btn-danger w-100">Entrar</button>
    </form>

    <?php if(isset($_GET['erro'])): ?>
        <div class="alert alert-danger mt-2">Login inválido</div>
    <?php endif; ?>
</div>

</body>
</html>