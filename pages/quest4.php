<!-- quest1.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Квест 1</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="quest-container">
        <h1>Заголовок квеста 1</h1>
        <p>Описание квеста 1...</p>
        <button onclick="window.location.href='quest2.php'">Летим дальше</button>
        <button onclick="window.history.back()">Назад</button>
        <img src="../images/quest1.jpg" alt="Quest 1 Image">
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="../js/scripts.js"></script>
</body>
</html>