<?php
session_start();
// Определяем текущий уровень
$current_level = isset($_GET['level']) ? (int)$_GET['level'] : 1;
$max_level = 7;

// Данные для блоков (можно вынести в БД)
$content = [
    1 => ['title' => 'Кибер-мемы', 'img' => 'images/banners/lvl1.jpg'],
    2 => ['title' => 'Космические приколы', 'img' => 'images/banners/lvl2.jpg'],
    // ... добавить данные для всех уровней
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МЕМЕ | Уровень <?= $current_level ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <?php if($current_level <= $max_level): ?>
            <section class="content-block">
                <img src="<?= $content[$current_level]['img'] ?>" alt="Мем уровня <?= $current_level ?>">
                <h2><?= $content[$current_level]['title'] ?></h2>
                <p>Описание раздела уровня <?= $current_level ?>...</p>
                
                <?php if($current_level < $max_level): ?>
                    <a href="?level=<?= $current_level+1 ?>" class="cyber-button" onclick="playSound()">
                        Перейти на уровень <?= $current_level+1 ?>
                    </a>
                <?php else: ?>
                    <a href="https://example.com" class="cyber-button" onclick="playSound()">
                        Финальный переход!
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </div>

    <!-- Модальное окно -->
    <div id="telega-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="blink">ЗАЛЕТАЙ В ТЕЛЕГУ!</h2>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>