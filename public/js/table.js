
function downloadTable(){
    let table = document.getElementById('datatable');
    let stringCNT = "";

    Array.from(table.rows).forEach((row,j) => {
        Array.from(row.cells).forEach((cell,i) => {
            if(i!=0){
                //console.log(`>> ${cell.textContent}`)
                stringCNT = stringCNT + `${cell.textContent}` + "\t"
            }
        })
        stringCNT = stringCNT + "\n"
    })

    console.log(stringCNT)
}

function takeTheRow() {
    console.log("took the row")
}
function takeTheCol() {
    console.log("took the col")
}

function startTable(){

    let tableContainer = document.getElementById('tableContainer');
    let table = document.createElement('table');
    table.id = "datatable"
    let downloadBtn = document.createElement('button');
    downloadBtn.textContent = "Download the table"
    downloadBtn.addEventListener('click', downloadTable);

    table.border= "1"

    let cols = 4;
    let rows = 4;

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
                button.addEventListener('click', () => {
                    takeTheRow();
                });
                button.className = "tableIndex";
                cell.appendChild(button);
            } else if((i==0) && (j!=0)){
                let button = document.createElement('button');
                button.textContent = `${j}`;
                button.addEventListener('click', () => {
                    takeTheCol();
                });
                button.className = "tableIndex";
                cell.appendChild(button);
            } else {
                cell.contentEditable = "true";
                cell.textContent = "";
            }
            row.appendChild(cell);
        }
        table.appendChild(row);
    }
    tableContainer.appendChild(downloadBtn);
    tableContainer.appendChild(table);
}

