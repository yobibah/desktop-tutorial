function showPopup(message) {
    document.querySelector('.popup-message').innerText = message;
    document.querySelector('.popup').classList.add('visible');
    document.querySelector('.popup-overlay').classList.add('visible');
}

function hidePopup() {
    document.querySelector('.popup').classList.remove('visible');
    document.querySelector('.popup-overlay').classList.remove('visible');
}

document.querySelector('.popup button').addEventListener('click', hidePopup);
