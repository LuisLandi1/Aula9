<?php
session_start();
include('bd.php');

// Consulta SQL para obter todos os produtos
$sql = "SELECT id, nome FROM produtos";
$comando = $conn->prepare($sql);
$comando->execute();

$produtos = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
</head>
<body>
    <h2>Produtos Cadastrados</h2>
    <ul>
        <?php foreach ($produtos as $produto): ?>
            <li>
                <a href="atualiza_produto.php?id=<?php echo $produto['id']; ?>"><?php echo htmlspecialchars($produto['nome']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
