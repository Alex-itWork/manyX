document.addEventListener('DOMContentLoaded', () => {
    // Мобильное меню
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const nav = document.querySelector('.desktop-nav');
    
    menuBtn.addEventListener('click', () => {
        nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        playSound();
    });

    // Закрытие меню при клике вне его
    document.addEventListener('click', (e) => {
        if(!e.target.closest('.desktop-nav') && !e.target.closest('.mobile-menu-btn')) {
            nav.style.display = 'none';
        }
    });
});

function loadLevel(level) {
    playSound();
    history.replaceState(null, null, `?level=${level}`);
    
    // Быстрая загрузка через AJAX
    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            document.body.innerHTML = newDoc.body.innerHTML;
            window.scrollTo(0, 0);
        });
}

function showHint() {
    playSound();
    // Реализация подсказки
    alert('Подсказка: Используй кибер-интуицию!');
}

function playSound() {
    const audio = document.getElementById('click-sound');
    audio.currentTime = 0;
    audio.play();
}

// Прелоад изображений
for(let i = 1; i <= 7; i++) {
    new Image().src = `images/quest/${i}.jpg`;
}