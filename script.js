function showFirstQuest() {
    // Плавное скрытие баннера
    const banner = document.getElementById('main-banner');
    banner.classList.add('hidden');
    
    // Показ контейнера квеста
    const questContainer = document.getElementById('quest-container');
    questContainer.classList.remove('hidden');
    
    // Обновление URL без перезагрузки
    history.pushState(null, null, '?quest=1');
    
    // Загрузка первого квеста
    if(window.location.search.indexOf('quest=1') === -1) {
        window.location.href = '?quest=1';
    }
}

function nextQuest(level) {
    window.location.href = `?quest=${level}`;
}

// Восстановление состояния при загрузке
window.onload = function() {
    if(window.location.search.includes('quest=')) {
        document.getElementById('main-banner').classList.add('hidden');
        document.getElementById('quest-container').classList.remove('hidden');
    }
}