const arrowDown = document.getElementById("arrowDown");
const cardLog = document.getElementById("cardLog");

arrowDown.addEventListener("click", () => {
    arrowDown.classList.toggle("rotate-180");
    cardLog.classList.toggle("hidden");
    cardLog.classList.toggle("absolute");
});

function showNotification(message) {
    // Dapatkan elemen notifikasi
    var notification = document.getElementById("notification");

    // Setel teks pemberitahuan
    notification.innerText = message;

    // Tampilkan notifikasi
    notification.classList.add("animate-pulse");
    notification.classList.remove("hidden");
    notification.classList.add("flex");

    // Sembunyikan notifikasi setelah beberapa detik (opsional)
    setTimeout(function () {
        notification.classList.remove("animate-pulse");
        notification.classList.remove("flex");
        notification.classList.add("hidden");
    }, 1000); // Sembunyikan setelah 3 detik
}

let search = document.getElementById("searchInput");
let searchIcon = document.getElementById("searchIcon");
let root = document.getElementById("root");

let darkEl = document.createElement('div');
darkEl.classList.add('w-full');
darkEl.classList.add('h-full');
darkEl.classList.add('z-40');
darkEl.classList.add('bg-black');
darkEl.classList.add('absolute');
darkEl.classList.add('top-0');
darkEl.classList.add('opacity-80');

search.addEventListener("focus", () => {
    searchIcon.classList.add("hidden");
    search.classList.remove("pl-12");
    search.classList.add("pl-5");
    document.body.appendChild(darkEl);
    document.body.classList.add('overflow-hidden');
});

search.addEventListener("blur", () => {
    searchIcon.classList.remove("hidden");
    search.classList.remove("pl-5");
    search.classList.add("pl-12");
    document.body.removeChild(darkEl);
    document.body.classList.remove('overflow-hidden');
});
