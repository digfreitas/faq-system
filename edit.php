<?php 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $pdo->prepare('UPDATE faqs SET question = ?, answer = ? WHERE id = ?');
    $stmt->execute([$question, $answer, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM faqs WHERE id = ?');
$stmt->execute([$id]);
$faq = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pergunta</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Editar Pergunta</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $faq['id']; ?>">
        <label>Pergunta:</label>
        <input type="text" name="question" value="<?php echo htmlspecialchars($faq['question']); ?>" required>
        <br>
        <label>Resposta:</label>
        <textarea name="answer" required><?php echo htmlspecialchars($faq['answer']); ?></textarea>
        <br>
        <button type="submit">Salvar</button>
    </form>

    <?php include 'footer.php'; ?>
</body>
</html>