function showBanner(target) {
    var audio = new Audio('audio/banner_sound.mp3');
    audio.play();

    var popup = document.getElementById('popup');
    popup.style.display = 'flex';

    if (target === 'external') {
        setTimeout(function() {
            window.location.href = 'https://example.com';
        }, 3000); // Задержка перед переходом на внешний сайт
    }
}

function hideBanner() {
    var audio = new Audio('audio/banner_sound.mp3');
    audio.play();

    var popup = document.getElementById('popup');
    popup.style.display = 'none';
}

function playSound() {
    var audio = new Audio('audio/meme.mp3');
    audio.play();
}