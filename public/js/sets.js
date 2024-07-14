
function addsetCallback(){
    let adder = document.getElementById('dialogAdder');
    adder.showModal();
}

function viewsetCallback(){
    let viewer = document.getElementById('dialogViewer');
    viewer.showModal();
}

function formHandler(event){
    var foldername = document.getElementById('foldername');
    document.getElementById('hiddenField').value = foldername.textContent;
}

document.getElementById('formToSet').addEventListener('submit', formHandler)
const addset = document.getElementById('addsetId');
const viewset= document.getElementById('viewsetId');

addset.addEventListener('click', addsetCallback);
viewset.addEventListener('click',viewsetCallback);
