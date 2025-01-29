<?php
session_start();
$current_quest = isset($_GET['quest']) ? (int)$_GET['quest'] : 0;
$max_quest = 7;
?>
<!DOCTYPE html>
<html lang="ru" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МЕМЕ | КиберКвест</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
    
    <!-- Главный баннер -->
    <div id="main-banner" class="<?= $current_quest > 0 ? 'hidden' : '' ?>">
        <h2 class="glitch" style="margin: 2cm 0 0.5cm 0;">ПРОЙДИ КВЕСТ</h2>
        <div class="banner-buttons">
            <button class="cyber-btn" onclick="window.open('https://t.me')">ТЕЛЕГА</button>
            <button class="cyber-btn" onclick="startQuest()">СТАРТ</button>
        </div>
    </div>

    <!-- Блоки квестов -->
    <div class="quest-container" style="margin-top: 2cm;">
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

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
    
    <script src="script.js"></script>
</body>
</html>