
const canvasOBS= document.getElementById('obspanel');
const canvasMOD= document.getElementById('modpanel');

const ctxOBS = canvasOBS.getContext('2d');
const ctxMOD = canvasMOD.getContext('2d');

function drawPixel(x, y, color, id, sizeRect) {
    const canvas = document.getElementById(id);
    const contxt = canvas.getContext('2d');
    contxt.fillStyle = color;
    contxt.fillRect(x, y, sizeRect, sizeRect);
}

function paintScreen(){
    for (let x = 0; x < canvasOBS.width; x++) {
        for (let y = 0; y < canvasOBS.height; y++) {
            const red = Math.floor((x / canvasOBS.width) * 255);
            const green = Math.floor((y / canvasOBS.height) * 255);
            const blue = 150;
            const color = `rgb(${red}, ${green}, ${blue})`;
            drawPixel(x,y,color, 'obspanel', 4);
        }
    }
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

function drawYaxis(factor){
    clean('yaxis');
    const canvas  = document.getElementById('yaxis');
    const ctxaxs = canvas.getContext('2d');
    const color = `rgb(0, 0, 0)`;

    let y = 0;
    let gap = 10 * factor;
    while(y <= canvas.height){
        drawPixel(0,y,color, 'yaxis', 2);
        drawPixel(1,y,color, 'yaxis', 2);
        drawPixel(2,y,color, 'yaxis', 2);
        drawPixel(3,y,color, 'yaxis', 2);
        drawPixel(4,y,color, 'yaxis', 2);
        drawPixel(5,y,color, 'yaxis', 2);
        drawPixel(6,y,color, 'yaxis', 2);
        drawPixel(7,y,color, 'yaxis', 2);
        drawPixel(8,y,color, 'yaxis', 2);
        drawPixel(9,y,color, 'yaxis', 2);

        y = y + gap;
    }
}

function drawXaxis(factor){
    clean('xaxis');
    const canvasX  = document.getElementById('xaxis');
    const ctxXaxis = canvasX.getContext('2d');
    const color = `rgb(0, 0, 0)`;

    let x = 0;
    let gap = 10 * factor;
    while(x <= canvasX.width){
        drawPixel(x,0,color, 'xaxis', 2);
        drawPixel(x,1,color, 'xaxis', 2);
        drawPixel(x,2,color, 'xaxis', 2);
        drawPixel(x,3,color, 'xaxis', 2);
        drawPixel(x,4,color, 'xaxis', 2);
        drawPixel(x,5,color, 'xaxis', 2);
        drawPixel(x,6,color, 'xaxis', 2);
        drawPixel(x,7,color, 'xaxis', 2);
        drawPixel(x,8,color, 'xaxis', 2);
        drawPixel(x,9,color, 'xaxis', 2);

        x = x + gap;
    }
}

paintScreen();
drawXaxis(1);
drawYaxis(1);

const MODsize = 100;
const xmod = (canvasMOD.width - MODsize) /2;
const ymod = (canvasMOD.height - MODsize) /2;

ctxMOD.fillStyle = 'green';
ctxMOD.fillRect(xmod, ymod, MODsize, MODsize);
