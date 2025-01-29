// Музыка при загрузке
document.addEventListener('DOMContentLoaded', () => {
    const bgMusic = document.getElementById('bg-music');
    bgMusic.volume = 0.3;
    bgMusic.play();
});

// Звуки
function playSound(type) {
    const sounds = {
        button: 'audio/button_sound.mp3',
        quest: 'audio/quest_start.mp3'
    };
    const audio = new Audio(sounds[type]);
    audio.play();
}

// Квесты
function startQuest() {
    playSound('quest');
    window.location.href = '?quest=1';
}

function nextQuest(level) {
    playSound('button');
    window.location.href = `?quest=${level}`;
}

// Мобильное меню
document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
    const menu = document.querySelector('.nav-menu');
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
});