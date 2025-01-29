<?php
session_start();
$current_level = isset($_GET['level']) ? (int)$_GET['level'] : 0;
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
    <header class="cyber-header">
        <div class="logo-container">
            <img src="images/logo.png" class="cyber-logo" alt="МЕМЕ">
            <span class="logo-text">МЕМЕ</span>
        </div>
        <nav class="desktop-nav">
            <a href="#about" class="cyber-nav-btn">О нас</a>
            <a href="https://vk.com" target="_blank" class="cyber-nav-btn">VK</a>
            <a href="https://t.me" target="_blank" class="cyber-nav-btn">TG</a>
            <a href="https://ozon.ru" target="_blank" class="cyber-nav-btn">OZON</a>
            <a href="https://wildberries.ru" target="_blank" class="cyber-nav-btn">WB</a>
            <a href="https://yandex.ru" target="_blank" class="cyber-nav-btn">ЯД</a>
        </nav>
        <div class="mobile-menu-btn">☰</div>
    </header>

    <main class="cyber-main">
        <?php if($current_level === 0): ?>
        <section class="start-screen">
            <h1 class="glitch-text">ПРОЙДИ КВЕСТ</h1>
            <div class="cyber-buttons">
                <button class="cyber-button" onclick="loadQuest(1)">СТАРТ</button>
                <button class="cyber-button" onclick="window.open('https://t.me')">ТЕЛЕГА</button>
            </div>
        </section>
        <?php else: ?>
        <section class="quest-screen">
            <div class="quest-image"></div>
            <div class="quest-content">
                <h2 class="cyber-title">Уровень <?= $current_level ?></h2>
                <p class="cyber-text"><?= getQuestDescription($current_level) ?></p>
                <div class="quest-controls">
                    <?php if($current_level > 1): ?>
                    <button class="cyber-button small" onclick="loadQuest(<?= $current_level-1 ?>)">НАЗАД</button>
                    <?php endif; ?>
                    <button class="cyber-button small" onclick="showHint()">ПОДСКАЗКА</button>
                    <?php if($current_level < 7): ?>
                    <button class="cyber-button" onclick="loadQuest(<?= $current_level+1 ?>)">ДАЛЕЕ</button>
                    <?php else: ?>
                    <button class="cyber-button" onclick="window.open('https://final.ru')">ФИНАЛ</button>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>

    <script src="script.js"></script>
</body>
</html>