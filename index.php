<?php
session_start();
$current_level = isset($_GET['level']) ? (int)$_GET['level'] : 0;
$max_level = 7;

function getQuestData($level) {
    $quests = [
        1 => ['title' => 'Начало квеста', 'hint' => 'Ищи скрытые символы'],
        2 => ['title' => 'Киберлабиринт', 'hint' => 'Повернись на 180°'],
        // Добавьте данные для всех уровней
    ];
    return $quests[$level] ?? ['title' => 'Уровень '.$level, 'hint' => 'Базовая подсказка'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МЕМЕ | КиберКвест</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    
    <main class="main-content">
        <?php if($current_level === 0): ?>
            <section class="start-screen">
                <h1 class="glitch">ПРОЙДИ КВЕСТ</h1>
                <div class="buttons">
                    <button class="cyber-btn" onclick="loadLevel(1)">СТАРТ</button>
                    <button class="cyber-btn" onclick="window.open('https://t.me')">ТЕЛЕГА</button>
                </div>
            </section>
        <?php else: ?>
            <section class="quest-screen">
                <div class="quest-image">
                    <img src="images/quest/<?= $current_level ?>.jpg" alt="Квест <?= $current_level ?>">
                </div>
                <div class="quest-info">
                    <h2><?= getQuestData($current_level)['title'] ?></h2>
                    <div class="quest-controls">
                        <?php if($current_level > 1): ?>
                            <button class="cyber-btn small" onclick="loadLevel(<?= $current_level-1 ?>)">← НАЗАД</button>
                        <?php endif; ?>
                        <button class="cyber-btn small" onclick="showHint()">ПОДСКАЗКА</button>
                        <?php if($current_level < $max_level): ?>
                            <button class="cyber-btn" onclick="loadLevel(<?= $current_level+1 ?>)">ДАЛЕЕ →</button>
                        <?php else: ?>
                            <button class="cyber-btn" onclick="window.open('https://final.ru')">ФИНАЛ</button>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script src="script.js"></script>
    <audio id="click-sound" src="audio/button_sound.mp3"></audio>
</body>
</html>