/*
 *
 * @depth average depth for the entire model
 * @width width of each block
 * @nblocks number of blocks
 * */
const G = 6.67e-11;
const PI= Math.PI;

function graph(iesp, icontrast, depth, width){
    let pprove = document.getElementById('panelprove');
    let newwidth = width/2;
    const color = `rgb(255, 0, 0)`;
    //a la ubicacion del pto en observación
    //le quito la distancia al pto medio del bloque

    //let stringData = document.getElementById('paragraph');
    //let data = formData(stringData)
    //let xdist = Math.abs(xobs - xblock);

    let max = 0;
    let xblock = 0; //block is initally located at the center
    let ges = [];
    for(let x=0;x<pprove.width;x++){

        let xdist = (newwidth -x);
        let result = xdist/depth;
        let direction = Math.atan(xdist/depth);
        let g = 2 * (direction) * G * icontrast * iesp; //esp -> espesor
        ges.push(g);
        if(g>max){
            max = g;
        }
    }
    let newheight = max + 150;
    let inf = 1;
    let sup = 10;
    let j = 0;
    pprove.height = newheight;
    const mid = (max * (Math.pow(10,10)) * 10 + 50)/2;
    const center = pprove.width/2;
    pprove.width = pprove.width + center;
    //I must consider that canvas is positivo at the bottom
    ges.forEach((g,x) => {
        if((x % 10) == 0){
            gbetter = ges[j] * (Math.pow(10,10)) * 10;
            gbetter = (gbetter + 50);

            let diff = Math.abs(gbetter - mid);
            if(gbetter < mid){
                gbetter = gbetter + (2*diff);
            } else {
                gbetter = gbetter - (2*diff);
            }

            x = x + center;
            drawPixel(x, gbetter, color, 'panelprove', 3);
            inf = inf + 10;
            sup = sup + 10;
            j++;
        } else {
            let plus = (Math.abs(x - inf))/10;
            gbetter = ((ges[j-1] + ges[j])/2) * (Math.pow(10,10)) * 10;
            gbetter = (gbetter + 50 - plus);

            let diff = Math.abs(gbetter - mid);
            if(gbetter < mid){
                gbetter = gbetter + (2*diff);
            } else {
                gbetter = gbetter - (2*diff);
            }

            console.log("g:" +gbetter+",plus:"+plus);
            x = x + center;
            drawPixel(x, gbetter, color, 'panelprove', 3);
        }
        let colorprom = `rgb(0, 255, 0)`;
        drawPixel(x, mid, colorprom, 'panelprove', 1);
        let colorline = 'rgb(0,0,0)';
        drawPixel(x, 50, colorline, 'panelprove', 1);
    })
    const canvasMOD= document.getElementById('modpanel');
    canvasMOD.width = pprove.width;
    canvasMOD.height= pprove.height;
    const ymod = (canvasMOD.height - MODsize) /2;

    ctxMOD.fillStyle = 'green';
    ctxMOD.fillRect(50, ymod, MODsize, MODsize);
}


function startCalculation(){
    let depth = document.getElementById('depthInput').value;
    let width = document.getElementById('widthInput').value;
    let nblck = document.getElementById('nblckInput').value;

    let iesp = document.getElementById('iespInput').value;
    let icontrast = document.getElementById('icontrastInput').value;

    graph(iesp, icontrast, depth, width);
}

let calc = document.getElementById('calculateBtn');
calc.addEventListener('click', startCalculation);
