<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conexao->prepare("SELECT senha FROM usuarios WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $query->store_result();
    $query->bind_result($senha_hash);
    $query->fetch();

    if ($query->num_rows > 0 && password_verify($password, $senha_hash)) {
        $_SESSION['username'] = $username;
        header("Location: playlist.php");
        exit();
    } else {
        echo "<script>alert('Usuário ou senha incorretos!'); window.location='login.php';</script>";
    }
}
?>
