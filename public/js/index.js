
function checkData(){
    let dataset = document.getElementById("dataset");
    if (dataset.length > 0){
        return true
    }
    return false
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
check.addEventListener('click', checkHandler);
graph.addEventListener('click', graphHandler);
