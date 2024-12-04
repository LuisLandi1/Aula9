<?php
session_start();
include('bd.php'); // Inclua a conexão com o banco de dados

// Recebe o ID do livro que será atualizado
$idLivro = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Consulta SQL para buscar os dados do livro com o ID fornecido
    $sql = "SELECT * FROM livros WHERE id = :id";
    $comando = $conn->prepare($sql);
    $comando->bindParam(':id', $idLivro, PDO::PARAM_INT);
    $comando->execute();

    $livro = $comando->fetch(PDO::FETCH_ASSOC);
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
</head>
<body>
    <h2>Atualizar Livro</h2>

    <?php if ($livro): ?>
        <form method="POST" action="atualiza.php">
            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">

            <label for="titulo">Título do Livro:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>" required><br><br>

            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>" required><br><br>

            <label for="ano_publicacao">Ano de Publicação:</label><br>
            <input type="number" id="ano_publicacao" name="ano_publicacao" value="<?php echo htmlspecialchars($livro['ano_publicacao']); ?>" required><br><br>

            <input type="submit" value="Atualizar Livro">
        </form>
    <?php else: ?>
        <p>Livro não encontrado.</p>
    <?php endif; ?>
</body>
</html>