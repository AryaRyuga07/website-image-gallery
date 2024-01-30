const arrowDown = document.getElementById('arrowDown');
const cardLog = document.getElementById('cardLog');
const fileInput = document.getElementById('fileInput');
const newDraft = document.getElementById('newDraft');

arrowDown.addEventListener('click', () => {
    arrowDown.classList.toggle('rotate-180');
    cardLog.classList.toggle('hidden');
    cardLog.classList.toggle('absolute');
});

const triggerFileInput = () => {
    fileInput.click();
}

// Pemrosesan file setelah dipilih (opsional)
fileInput.addEventListener('change', function() {
    var selectedFile = this.files[0];
    console.log(selectedFile);
    console.log('Nama file yang dipilih:', selectedFile.name);
    // Tambahan logika pemrosesan file sesuai kebutuhan
});

newDraft.addEventListener('click', () => {
    triggerFileInput();
});
