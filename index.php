<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div id="banner">
        <p>ЗАЛЕТАЙТЕ В ТЕЛЕГУ</p>
        <button onclick="window.location.href='https://t.me/yourlink'">Перейти</button>
        <span id="close-banner">X</span>
    </div>

    <main>
        <section class="content-block">
            <div class="image-container"><img src="../images/image1.jpg" alt="Image 1"></div>
            <div class="text-container">
                <h2>Заголовок блока 1</h2>
                <p>Описание блока 1...</p>
                <button>Начать квест</button>
                <button>Узнать подробнее</button>
                <button>Портал</button>
                <button>ИЗИ ЗАДАНИЯ</button>
            </div>
        </section>
        <section class="content-block">
            <div class="image-container"><img src="../images/image2.jpg" alt="Image 2"></div>
            <div class="text-container">
                <h2>Заголовок блока 2</h2>
                <p>Описание блока 2...</p>
                <button>Начать квест</button>
                <button>Узнать подробнее</button>
                <button>Портал</button>
                <button>ИЗИ ЗАДАНИЯ</button>
            </div>
        </section>
        <section class="content-block">
            <div class="image-container"><img src="../images/image3.jpg" alt="Image 3"></div>
            <div class="text-container">
                <h2>Заголовок блока 3</h2>
                <p>Описание блока 3...</p>
                <button>Начать квест</button>
                <button>Узнать подробнее</button>
                <button>Портал</button>
                <button>ИЗИ ЗАДАНИЯ</button>
            </div>
        </section>
        <section class="content-block">
            <div class="image-container"><img src="../images/image4.jpg" alt="Image 4"></div>
            <div class="text-container">
                <h2>Заголовок блока 4</h2>
                <p>Описание блока 4...</p>
                <button>Начать квест</button>
                <button>Узнать подробнее</button>
                <button>Портал</button>
                <button>ИЗИ ЗАДАНИЯ</button>
            </div>
        </section>
        <section class="content-block">
            <div class="image-container"><img src="../images/image5.jpg" alt="Image 5"></div>
            <div class="text-container">
                <h2>Заголовок блока 5</h2>
                <p>Описание блока 5...</p>
                <button>Начать квест</button>
                <button>Узнать подробнее</button>
                <button>Портал</button>
                <button>ИЗИ ЗАДАНИЯ</button>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>

    <audio id="background-music" autoplay loop>
        <source src="../sounds/music.mp3" type="audio/mpeg">
    </audio>

    <script src="../js/scripts.js"></script>
</body>
</html>