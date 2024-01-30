const anotherPages = (url) => {
    // Lakukan permintaan AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Ganti konten halaman
            document.body.innerHTML = xhr.responseText;
            // Perbarui URL
            history.pushState({}, '', url);
            setEventHandlers();
        }
    };
    xhr.open('GET', url, true);
    xhr.send();
}

const setEventHandlers = () => {
    let urlPages = document.querySelectorAll('.button-page');
    urlPages.forEach((urlPage) => {
        urlPage.addEventListener('click', (event) => {
            event.preventDefault();
            let url = urlPage.getAttribute('data-url');
            anotherPages(url);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    setEventHandlers();
});