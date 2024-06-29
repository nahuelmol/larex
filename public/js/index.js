
function checkData(){
    let dataset = document.getElementById("dataset");
    if (dataset.length > 0){
        return true
    }
    return false
}

function imporHandler(){
    var dialog = document.getElementById('dialogbox');
    dialog.showModal();

    var close = document.getElementById('closeDlgBtn');
    close.addEventListener('click', closeHandler);

    var ediTable = document.getElementById('ediTableBtn');
    ediTable.addEventListener('click', startTable);

    var add = document.getElementById('addBtn');
    var del = document.getElementById('delBtn');
}

function closeHandler(){
    var dialog = document.getElementById('dialogbox');
    dialog.close();
}

function graphHandler(){
    if(!checkData()){
        let msg = "imposible to graph -> not sufficient data available"
        let datashow = document.getElementById('datashow');
        datashow.innerHTML = msg;
    } else {
        let msg = "data is sufficient"
        let datashow = document.getElementById('datashow');
        datashow.innerHTML = msg;
    }
}

function checkHandler(){
    if(!checkData()){
        let msg = "imposible to graph -> not sufficient data available"
        let datashow = document.getElementById('datashow');
        datashow.innerHTML = msg;
    } else {
        let msg = "data is sufficient"
        let datashow = document.getElementById('datashow');
        datashow.innerHTML = msg;
    }
}

var graph = document.getElementById('graphBtn');
var check = document.getElementById('checkBtn');
var impor = document.getElementById('imporBtn');
impor.addEventListener('click', imporHandler);
check.addEventListener('click', checkHandler);
graph.addEventListener('click', graphHandler);
