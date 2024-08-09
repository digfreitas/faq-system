<?php 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $pdo->prepare('INSERT INTO faqs (question, answer) VALUES (?, ?)');
    $stmt->execute([$question, $answer]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Adicionar Pergunta</h1>
    <form method="post">
        <label>Pergunta:</label>
        <input type="text" name="question" required>
        <br>
        <label>Resposta:</label>
        <textarea name="answer" required></textarea>
        <br>
        <button type="submit">Adicionar</button>
    </form>

    <?php include 'footer.php'; ?>
</body>
</html>