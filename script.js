// Воспроизведение звука
function playSound() {
    const audio = new Audio('audio/meme_sound.mp3');
    audio.play();
}

// Модальное окно
window.onload = function() {
    const modal = document.getElementById('telega-modal');
    const span = document.getElementsByClassName("close")[0];
    
    if(!sessionStorage.getItem('modalShown')) {
        modal.style.display = "block";
        sessionStorage.setItem('modalShown', 'true');
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

// Добавляем обработчик на все кнопки
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', playSound);
});