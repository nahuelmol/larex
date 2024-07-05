
function downloadTable(){
    let table = document.getElementById('datatable');
    let stringCNT = "";

    Array.from(table.rows).forEach((row,j) => {
        Array.from(row.cells).forEach((cell,i) => {
            if(i!=0 && j!=0){
                stringCNT = stringCNT + `${cell.textContent}` + "\t"
            }
        })
        stringCNT = stringCNT + "\n"
    })

    let blob = new Blob([stringCNT], {text:'text/plain'});
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'data.txt';
    link.click();
    URL.revokeObjectURL(link.href);
}

function takeTheRow(event) {
    let but = document.activeElement;
    let row = but.parentElement;
    let ind = row.parentElement.rowIndex;

    let table = document.getElementById('datatable');
    Array.from(table.rows).forEach((row,i) => {
        if(i == ind){
            row.focus();
        }
    })
    console.log("index:" + ind);
}

function takeTheCol(event) {
    let but = document.activeElement;
    let cel = but.parentElement;
    let col = cel.cellIndex;

    let table = document.getElementById('datatable');
    Array.from(table.rows).forEach(row => {
        Array.from(row.cells).forEach(cell => {
            let numb = cell.parentElement.rowIndex;
            if((cell.cellIndex == col) && (numb != 0)){
                cell.focus();
                console.log("cell content:" + cell.textContent);
            }
        })
    })
}

function formData(stringData){
    let data = [];
    data.push([]);
    Array.from(stringData).forEach(ch => {
        if(ch == '\n'){
            data.push([]);
        } else {
            if(ch != '\t'){
                let last = data.length - 1;
                data[last].push(ch);
            }
        }
    })
    return data;
}

function gettingClipboard(event){
    event.preventDefault();
    const result = (event.clipboardData || window.clipboard).getData('text');

    let ele = document.activeElement;
    let pivotrow  = ele.parentNode.rowIndex;
    let pivotcell = ele.cellIndex;
    let table = document.getElementById('datatable');

    let data = formData();

    let ii = 0;
    let ij = 0;
    Array.from(table.rows).forEach((row,i) => {
        Array.from(row.cells).forEach((cell,j) => {
            if((i>=pivotrow) && (j>=pivotcell)){
                let width = data[0].length;
                if(ii < data.length){
                    if(ij < width){
                        console.log(`data[${ii}][${ij}] -> table[${i},${j}]`);
                        cell.textContent = data[ii][ij];
                        if(ij == (width -1)){
                            ij = -1;
                            ii++;
                        }
                        ij++;
                    } else {
                        ii++;
                        ij = 0;
                    }
                }
            }
        })
    })
}

function startTable(){
    let tableContainer = document.getElementById('tableContainer');
    let table = document.createElement('table');
    table.id = "datatable"
    table.addEventListener('keydown', event => {
        let cell = document.activeElement;
        let newrow = 0;
        let newcel = 0;
        if(event.key === "ArrowDown"){
            newrow = cell.parentElement.rowIndex + 1;
            newcel = cell.cellIndex;
        } else if(event.key === "ArrowUp"){
            newrow = cell.parentElement.rowIndex - 1;
            newcel = cell.cellIndex;
        } else if(event.key === "ArrowRight"){
            let len = cell.textContent.length;
            const sel = window.getSelection();
            let pos = sel.focusOffset;
            if(len === pos){
                newrow = cell.parentElement.rowIndex;
                newcel = cell.cellIndex + 1;
            }
        } else if(event.key === "ArrowLeft"){
            let len = cell.textContent.length;
            const sel = window.getSelection();
            let pos = sel.focusOffset;
            if(len === pos){
                newrow = cell.parentElement.rowIndex;
                newcel = cell.cellIndex - 1;
            }
        }
        let rows = table.rows;
        let celda = rows[newrow].cells[newcel];
        celda.focus();
    })
    let downloadBtn = document.createElement('button');
    downloadBtn.textContent = "Download the table"
    downloadBtn.addEventListener('click', downloadTable);
    table.border= "1"

    let cols = 4;
    let rows = 14;

    for(let i = 0;i< rows;i++){
        let row  = document.createElement('tr');
        for(let j=0;j< cols;j++){
            let cell = document.createElement('td');
            if((j==0) && (i==0)){
                let button = document.createElement('button');
                cell.appendChild(button);
            } else if((j==0) && (i!=0)){
                let button = document.createElement('button');
                button.textContent = `${i}`;
                button.addEventListener('click', event => {
                    takeTheRow(event);
                    let current = document.getElementById('currentSelection');
                    current.innerHTML = `${i}`;
                });
                button.className = "tableIndex";
                cell.appendChild(button);
            } else if((i==0) && (j!=0)){
                let button = document.createElement('button');
                let asciicode = 0;
                if(0<j<27){
                    asciicode = j + 64;
                } else if (26<j<53){
                    asciicode = j + 70;
                }
                let charLetter = "";
                charLetter = String.fromCharCode(asciicode);
                button.textContent = charLetter;
                button.addEventListener('click', () => {
                    takeTheCol();
                    let current = document.getElementById('currentSelection');
                    current.innerHTML = charLetter;
                });
                button.className = "tableIndex";
                cell.appendChild(button);
            } else {
                cell.contentEditable = "true";
                cell.textContent = "";
            }
            cell.addEventListener('paste', gettingClipboard);
            row.appendChild(cell);
        }
        table.appendChild(row);
    }
    tableContainer.appendChild(downloadBtn);
    tableContainer.appendChild(table);
}

