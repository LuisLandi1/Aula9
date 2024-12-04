<?php
session_start();
include('bd.php');

// Recebe o ID do produto a ser atualizado
$idProduto = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Consulta SQL para buscar os dados do produto com o ID fornecido
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $comando = $conn->prepare($sql);
    $comando->bindParam(':id', $idProduto, PDO::PARAM_INT);
    $comando->execute();

    $produto = $comando->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
</head>
<body>
    <h2>Atualizar Produto</h2>

    <?php if ($produto): ?>
        <form method="POST" action="atualiza.php">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <label for="nome">Nome do Produto:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br><br>

            <label for="preco">Preço:</label><br>
            <input type="number" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required><br><br>

            <label for="quantidade">Quantidade:</label><br>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required><br><br>

            <input type="submit" value="Atualizar Produto">
        </form>
    <?php else: ?>
        <p>Produto não encontrado.</p>
    <?php endif; ?>
</body>
</html>