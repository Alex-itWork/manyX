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
        <section id="block1" class="content-block">
            <!-- Block content here -->
        </section>
        <section id="block2" class="content-block">
            <!-- Block content here -->
        </section>
        <section id="block3" class="content-block">
            <!-- Block content here -->
        </section>
        <section id="block4" class="content-block">
            <!-- Block content here -->
        </section>
        <section id="block5" class="content-block">
            <!-- Block content here -->
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>

    <audio id="background-music" autoplay loop>
        <source src="../sounds/music.mp3" type="audio/mpeg">
    </audio>

    <script src="../js/scripts.js"></script>
</body>
</html>