const canvasMOD= document.getElementById('modpanel');
const ctxMOD = canvasMOD.getContext('2d');
const ctxModelChart = document.getElementById('modelchart');

function drawPixel(x, y, color, id, sizeRect) {
    const canvas = document.getElementById(id);
    const contxt = canvas.getContext('2d');
    contxt.fillStyle = color;
    contxt.fillRect(x, y, sizeRect, sizeRect);
}
let ModelChart;
function graphModel(){
    if(ModelChart){
        ModelChart.destroy();
    }
    ModelChart = new Chart(ctxModelChart, {
        type: 'bar',
        data: {
          labels: ['block1', 'block2', 'block3'],
          datasets: [{
            label: 'model',
            data: [10,20,15],
            borderWidth: 1
          }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    reverse: true
                }
            },
            layout: {
                padding: 0
            },
            barPercentage: 1.0,
            categoryPercentage: 1.0
        }
    });
}

function clean(id){
    const canvas = document.getElementById(id);
    const contxt = canvas.getContext('2d');
    const color  = `rgb(255, 255, 255)`;
    for(let x=0;x < canvas.width;x++){
        for(let y=0;y < canvas.height;y++){
            drawPixel(x,y,color,id,4);
        }
    }
}

const MODsize = 10;
const xmod = (canvasMOD.width - MODsize) /2;
const ymod = (canvasMOD.height - MODsize) /2;

ctxMOD.fillStyle = 'green';
ctxMOD.fillRect(xmod, ymod, MODsize, MODsize);
