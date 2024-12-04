<?php
session_start();
include('bd.php');

// Consulta SQL para obter todos os livros
$sql = "SELECT id, titulo FROM livros";
$comando = $conn->prepare($sql);
$comando->execute();

$livros = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livros</title>
</head>
<body>
    <h2>Livros Cadastrados</h2>
    <ul>
        <?php foreach ($livros as $livro): ?>
            <li>
                <a href="atualiza_livro.php?id=<?php echo $livro['id']; ?>"><?php echo htmlspecialchars($livro['titulo']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
