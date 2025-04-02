<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$query = $conexao->prepare("SELECT musica, artista, imagem FROM playlist WHERE usuario = ?");
$query->bind_param("s", $_SESSION['username']);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Playlist</title>
</head>
<body>

<h2>🎵 Minha Playlist 🎶</h2>
<a href="add_music.php">➕ Adicionar Nova Música</a>

<div>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div>
            <img src="<?= $row['imagem'] ?: 'https://via.placeholder.com/200' ?>" alt="Capa da música">
            <h3><?= htmlspecialchars($row['musica']) ?></h3>
            <p><?= htmlspecialchars($row['artista']) ?></p>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
