<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografa a senha

    $query = $conexao->prepare("INSERT INTO usuarios (username, senha) VALUES (?, ?)");
    $query->bind_param("ss", $username, $password);

    if ($query->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!'); window.location='cadastro.php';</script>";
    }
}
?>
