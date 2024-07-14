
const dropZone = document.getElementById('dropZone');

// Highlight drop zone when file is dragged over
dropZone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropZone.classList.add('dragover');
});

// Remove highlight when dragging leaves the drop zone
dropZone.addEventListener('dragleave', (event) => {
    dropZone.classList.remove('dragover');
});

function handleFiles(files) {
    const fileList = Array.from(files);
    fileList.forEach(file => {
        console.log('File name:', file.name);
        console.log('File size:', file.size);
        console.log('File type:', file.type);
    });
}

dropZone.addEventListener('drop', (event) => {
    event.preventDefault();
    dropZone.classList.remove('dragover');

    const file = event.dataTransfer.files;
    handleFiles(file);
});

let dialog = document.getElementById('dataDialog');
dialog.showModal();
