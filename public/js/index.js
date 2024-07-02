
function checkData(){
    let par = document.getElementById('paragraph');
    let len = par.textContent.length;
    if (len > 0){
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

    add.addEventListener('click', addhandler);
    del.addEventListener('click', delhandler);

}

function closeHandler(){
    var dialog = document.getElementById('dialogbox');
    let dataset= document.getElementById('paragraph');
    let table  = document.getElementById('datatable');
    let stringCNT = "";
    Array.from(table.rows).forEach((row,j) => {
        Array.from(row.cells).forEach((cell,i) => {
            if(i!=0 && j!=0){
                stringCNT = stringCNT + `${cell.textContent}` + "\t"
            }
        })
        stringCNT = stringCNT + "\n"
    })
    dataset.innerHTML = stringCNT;
    dialog.close();
}

function zoomin(xdata, ydata){
    let xmax = Math.max(...xdata)
    let ymax = Math.max(...ydata)

    let obs = document.getElementById('obspanel');

    let factorx = (obs.width - (obs.width)/4)/xmax;
    let factory = (obs.height- (obs.height)/4)/ymax;

    let xnew = [];
    let ynew = [];
    xdata.forEach(x => {
        xnew.push(x * factorx);
    })
    ydata.forEach(y => {
        ynew.push(y * factory);
    })
    let scaled = []
    scaled.push(xnew);
    scaled.push(ynew);

    drawXaxis(factorx);
    drawYaxis(factory);
    return scaled;
}


function setYdata(rawdata){
    Array.from(rawdata).forEach(cchr => {
        if(cchr == '\n'){
            console.log("line");
        } else if (cchr == '\t'){
            console.log("data");
        }
    })
}
function isNumber(str) {
    try {
        parseFloat(str);
    } catch(e){
        console.log(e);
        return false;
    }
    return true;
}
function setdata(rawdata){
    let xdataready = [];
    let ydataready = [];
    let data = "";
    let indepedent = true;
    Array.from(rawdata).forEach(cchr => {
        if(cchr == '\n'){
            independent = true;
            if(isNumber(data)){
                let Y = parseFloat(data);
                if(!isNaN(Y)){
                    ydataready.push(Y);
                }
            }
            data = "";
        } else if (cchr == '\t'){
            if(independent == true){
                let X = parseFloat(data);
                if(!isNaN(X)){
                    xdataready.push(X);
                }
            } else {
                let Y = parseFloat(data);
                if(!isNaN(Y)){
                    ydataready.push(Y);
                }
            }
            independent = false;
            data = "";
        } else {
            data = data + cchr;
        }
    })
    let set = [];
    set.push(xdataready);
    set.push(ydataready);
    return set
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

        let data = document.getElementById('paragraph');
        let rawdata = data.textContent;
        let set = setdata(rawdata);
        let xdataset = set[0];
        let ydataset = set[1];

        const canvasOBS= document.getElementById('obspanel');
        const ctxOBS = canvasOBS.getContext('2d');

        let scaled = zoomin(xdataset,ydataset);
        xdataset = scaled[0];
        ydataset = scaled[1];

        paintScreen();
        xdataset.forEach(xdat => {
            let index = xdataset.indexOf(xdat);
            let xpoint = xdat;
            let ypoint = ydataset[index]

            const color = `rgb(255,0,0)`;
            drawPixel(xpoint, ypoint, color, 'obspanel', 4);
        })
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

function delhandler(){
}
function isCol(cnt){
    try {
        parseFloat(cnt);
    } catch(e){
        return true;
    }
    return false;
}
function addhandler(){
    //row and column
    let table = document.getElementById('datatable');
    let selection = document.getElementById('currentSelection');
    let cnt = selection.textContent;
    if(isCol(cnt)){
        let code = cnt.charCodeAt(0);
        let position = code - 64;
        Array.from(table.rows).forEach((row,ri) => {
            Array.from(row.cells).forEach((cell, index) => {
                if(index == position){
                    const newCell = document.createElement('td');
                    row.appendChild(newCell);
                }
            })
        })
    } else {
        let len = table.rows[0].cells.length;
        let row = table.insertRow(Number(cnt));
        for(let i=0;i<len;i++){
            let newCell = document.createElement('td');
            console.log('all->' + i);
            row.appendChild(newCell);
        }

        Array.from(table.rows).forEach((row,i) => {
            if(i == Number(cnt)){
                let button = document.createElement('button');
                button.textContent = cnt;
                button.className = 'tableIndex';

                Array.from(row.cells).forEach((cell,icell) => {
                    if(icell == 0){
                        cell.appendChild(button);
                    } else {
                        cell.contentEditable = "true";
                    }
                })
            }
            if(i > Number(cnt)){
                Array.from(row.cells).forEach((cell,j) => {
                    if(j == 0){
                        let newcell = Number(cnt) + 1;
                        console.log(newcell);
                        let butt = cell.getElementsByTagName('button');
                        butt.textContent = newcell;
                    }
                })
            }
        })
    }
}

var graph = document.getElementById('graphBtn');
var check = document.getElementById('checkBtn');
var impor = document.getElementById('imporBtn');


impor.addEventListener('click', imporHandler);
check.addEventListener('click', checkHandler);
graph.addEventListener('click', graphHandler);
