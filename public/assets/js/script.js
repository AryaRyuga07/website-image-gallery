const arrowDown = document.getElementById('arrowDown');
const cardLog = document.getElementById('cardLog');

arrowDown.addEventListener('click', () => {
    arrowDown.classList.toggle('rotate-180');
    cardLog.classList.toggle('hidden');
    cardLog.classList.toggle('absolute');
});
