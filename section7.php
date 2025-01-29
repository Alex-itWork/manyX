<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МЕМЕ - Раздел 7</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="banner">
        <p>ЗАЛЕТАЙ В ТЕЛЕГУ</p>
    </div>
    <header>
        <div class="logo">МЕМЕ</div>
        <nav>
            <ul>
                <li><a href="#">О нас</a></li>
                <li><a href="#">WB</a></li>
                <li><a href="#">OZON</a></li>
                <li><a href="#">ЯД</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="block">
            <img src="https://via.placeholder.com/300" alt="Изображение">
            <textarea placeholder="Введите описание..."></textarea>
            <button onclick="showBanner('external')">Перейти на внешний сайт</button>
        </section>
    </main>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn" onclick="hideBanner()">&times;</span>
            <img src="images/frog.png" alt="Лягушка" class="frog">
            <div class="popup-text">
                <h2>Раздел 7</h2>
                <p>Вот описание раздела 7.</p>
            </div>
        </div>
        <audio id="bannerAudio" src="audio/banner_sound.mp3"></audio>
    </div>
    <script>
        document.querySelector('button').addEventListener('click', function() {
            if (this.textContent === 'Перейти на внешний сайт') {
                window.location.href = 'https://example.com';
            }
        });
    </script>
</body>
</html>