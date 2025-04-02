<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>

<h2>Cadastro - Playlist de Músicas</h2>
<form action="process_cadastro.php" method="POST">
    <label>Usuário:</label>
    <input type="text" name="username" required>
    <br><br>

    <label>Senha:</label>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Cadastrar</button>
</form>

<br>
<a href="login.php">Voltar para Login</a>

</body>
</html>
