<?php
session_start();
include('bd.php');

// Recebe o ID do time a ser atualizado
$idTime = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Consulta SQL para buscar os dados do time com o ID fornecido
    $sql = "SELECT * FROM times WHERE id = :id";
    $comando = $conn->prepare($sql);
    $comando->bindParam(':id', $idTime, PDO::PARAM_INT);
    $comando->execute();

    $time = $comando->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Time</title>
</head>
<body>
    <h2>Atualizar Time</h2>

    <?php if ($time): ?>
        <form method="POST" action="atualiza.php">
            <input type="hidden" name="id" value="<?php echo $time['id']; ?>">

            <label for="nome">Nome do Time:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($time['nome']); ?>" required><br><br>

            <label for="cidade">Cidade:</label><br>
            <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($time['cidade']); ?>" required><br><br>

            <label for="ano_fundacao">Ano de Fundação:</label><br>
            <input type="number" id="ano_fundacao" name="ano_fundacao" value="<?php echo htmlspecialchars($time['ano_fundacao']); ?>" required><br><br>

            <input type="submit" value="Atualizar Time">
        </form>
    <?php else: ?>
        <p>Time não encontrado.</p>
    <?php endif; ?>
</body>
</html>
