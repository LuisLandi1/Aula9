
<?php
session_start();
include('bd.php');

// Consulta SQL para obter todos os times
$sql = "SELECT id, nome FROM times";
$comando = $conn->prepare($sql);
$comando->execute();

$times = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Times</title>
</head>
<body>
    <h2>Times Cadastrados</h2>
    <ul>
        <?php foreach ($times as $time): ?>
            <li>
                <a href="atualiza_time.php?id=<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
