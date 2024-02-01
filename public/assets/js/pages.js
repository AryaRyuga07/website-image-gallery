// const anotherPages = (url) => {
//     // Lakukan permintaan AJAX
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             // Ganti konten halaman
//             document.body.innerHTML = xhr.responseText;
//             // Perbarui URL
//             history.pushState({}, '', url);
//             setEventHandlers();
//         }
//     };
//     xhr.open('GET', url, true);
//     xhr.send();
// }

const setEventHandlers = () => {
    let urlPages = document.querySelectorAll('.button-page');
    urlPages.forEach((urlPage) => {
        urlPage.addEventListener('click', (event) => {
            let url = urlPage.getAttribute('data-url');
            console.log(url);
            window.location.assign(url);
        });
    });
}

    let buttonPages = document.querySelectorAll('.button-page');
    buttonPages.forEach((button) => {
        button.addEventListener('click', () => {
            let url = button.getAttribute('data-url');
            console.log(url);
            window.location.assign(url);
        })
    })
