<?php
session_start();
$current_quest = isset($_GET['quest']) ? (int)$_GET['quest'] : 0;
$max_quest = 7;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МЕМЕ | КиберКвест</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Ubuntu+Mono&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <!-- Главный баннер -->
    <div id="main-banner" class="<?= $current_quest > 0 ? 'hidden' : '' ?>">
        <h2 class="glitch">ПРОЙДИ КВЕСТ</h2>
        <div class="banner-buttons">
            <button class="cyber-btn" onclick="window.open('https://t.me/your_channel')">ТЕЛЕГА</button>
            <button class="cyber-btn" onclick="startQuest()">СТАРТ</button>
        </div>
    </div>

    <!-- Блоки квестов -->
    <div class="quest-container">
        <?php if($current_quest > 0 && $current_quest <= $max_quest): ?>
            <div class="quest-block">
                <img src="images/quest/<?= $current_quest ?>.jpg" alt="Квест <?= $current_quest ?>">
                <div class="quest-info">
                    <h3>Уровень <?= $current_quest ?></h3>
                    <p>Описание квеста...</p>
                    <?php if($current_quest < $max_quest): ?>
                        <button class="cyber-btn" onclick="nextQuest(<?= $current_quest + 1 ?>)">ПРОДОЛЖИТЬ</button>
                    <?php else: ?>
                        <button class="cyber-btn" onclick="window.open('https://final-link.com')">ФИНАЛ</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'includes/footer.php'; ?>

    <audio id="bg-music" loop>
        <source src="audio/bg_music.mp3" type="audio/mpeg">
    </audio>
    
    <script src="script.js"></script>
</body>
</html>
