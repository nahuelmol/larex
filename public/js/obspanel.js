
const canvasOBS= document.getElementById('obspanel');
const canvasMOD= document.getElementById('modpanel');

const ctxOBS = canvasOBS.getContext('2d');
const ctxMOD = canvasMOD.getContext('2d');

function drawPixel(x, y, color) {
    ctxOBS.fillStyle = color;
    ctxOBS.fillRect(x, y, 4, 4);
}

function drawPARABOLA(x, y, color) {
    ctxOBS.fillStyle = color;
    ctxOBS.fillRect(x, y, 4, 4);
}

for (let x = 0; x < canvasOBS.width; x++) {
    for (let y = 0; y < canvasOBS.height; y++) {
        const red = Math.floor((x / canvasOBS.width) * 255);
        const green = Math.floor((y / canvasOBS.height) * 255);
        const blue = 150;
        const color = `rgb(${red}, ${green}, ${blue})`;
        drawPixel(x, y, color);
    }
}

for (let x = 0; x < canvasOBS.width; x++) {
    let y = Math.pow(x, 2);
    const color = `rgb(255,0,0)`;
    drawPARABOLA(x,y,color)
}

const MODsize = 100;
const xmod = (canvasMOD.width - MODsize) /2;
const ymod = (canvasMOD.height - MODsize) /2;

ctxMOD.fillStyle = 'green';
ctxMOD.fillRect(xmod, ymod, MODsize, MODsize);
