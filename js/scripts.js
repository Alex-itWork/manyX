// scripts.js

document.querySelectorAll('nav ul li a').forEach(item => {
    item.addEventListener('click', () => {
        playSound('click');
    });
});

document.querySelectorAll('.content-block button').forEach(button => {
    button.addEventListener('click', () => {
        if (button.textContent === 'Начать квест') {
            window.location.href = 'quest1.php';
            playSound('quest-start');
        } else {
            playSound('click');
        }
    });
});

const menuIcon = document.querySelector('.menu-icon');
const mobileNav = document.querySelector('.mobile-nav');

menuIcon.addEventListener('click', () => {
    mobileNav.classList.toggle('active');
    document.querySelector('nav ul').classList.toggle('active');
});

document.getElementById('close-banner').addEventListener('click', () => {
    document.getElementById('banner').style.display = 'none';
});

function playSound(sound) {
    const audio = new Audio(`../sounds/${sound}.mp3`);
    audio.play();
}

document.getElementById('background-music').play();