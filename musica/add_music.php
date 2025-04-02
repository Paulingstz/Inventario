<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_SESSION['username'];
    $musica = $_POST['musica'];
    $artista = $_POST['artista'];
    $imagem = $_POST['imagem'];

    $query = $conexao->prepare("INSERT INTO playlist (usuario, musica, artista, imagem) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $usuario, $musica, $artista, $imagem);
    $query->execute();

    echo "<script>alert('Música adicionada!'); window.location='playlist.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Música</title>
</head>
<body>

<h2>Adicionar Música à Playlist</h2>
<form action="add_music.php" method="POST">
    <label>Nome da Música:</label>
    <input type="text" name="musica" required>
    <br><br>

    <label>Artista/Banda:</label>
    <input type="text" name="artista" required>
    <br><br>

    <label>URL da Capa:</label>
    <input type="text" name="imagem" placeholder="Cole a URL da capa da música">
    <br><br>
    
    <button type="submit">Adicionar</button>
</form>

<br>
<a href="playlist.php">Ver Playlist</a>

</body>
</html>
