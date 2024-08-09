<?php 
include 'config.php';

$stmt = $pdo->query('SELECT * FROM faqs ORDER BY created_at DESC');
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Sistema</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h1 style="margin-bottom: 20px; font-weight:700; font-size:40px;">Perguntas Frequentes</h1>
    <a href="add.php" class="button">Adicionar Nova Pergunta</a>

    <?php foreach ($faqs as $faq): ?>
        <div>
            <hr style="margin-top: 10px;">
            <h2 style="margin-top: 25px;"><?php echo htmlspecialchars($faq['question']); ?></h2>
            <p style="margin-bottom: 15px;"><?php echo htmlspecialchars($faq['answer']); ?></p>
            <a href="edit.php?id=<?php echo $faq['id']; ?>" class="button">Editar</a>
            <a href="delete.php?id=<?php echo $faq['id']; ?>" class="button" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
        </div>
    <?php endforeach; ?>

    <?php include 'footer.php'; ?>
</body>
</html>
