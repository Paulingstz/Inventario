<?php
$host = "localhost";
$usuario = "root";  // Usuário padrão do XAMPP
$senha = "";        // Senha vazia no XAMPP
$banco = "musica";  // Nome do banco de dados

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha);

// Verificar conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Criar o banco de dados se não existir
$conexao->query("CREATE DATABASE IF NOT EXISTS $banco");
$conexao->select_db($banco);

// Criar a tabela de usuários
$conexao->query("CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
)");

// Criar a tabela de músicas
$conexao->query("CREATE TABLE IF NOT EXISTS playlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    musica VARCHAR(255) NOT NULL,
    artista VARCHAR(255) NOT NULL,
    imagem VARCHAR(255) NULL
)");
?>
