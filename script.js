document.addEventListener('DOMContentLoaded', () => {
    // Мобильное меню
    document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
        const nav = document.querySelector('.desktop-nav');
        nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
    });
});

function loadQuest(level) {
    // Мгновенная загрузка через AJAX
    fetch(`?level=${level}`)
        .then(response => response.text())
        .then(html => {
            document.body.innerHTML = html;
            window.scrollTo(0, 0);
        });
}

function showHint() {
    // Реализация подсказки
    alert('Используй силу мемов!');
}

// Прелоад изображений
const preloadImages = [];
for(let i = 1; i <= 7; i++) {
    const img = new Image();
    img.src = `images/quest/${i}.jpg`;
    preloadImages.push(img);
}