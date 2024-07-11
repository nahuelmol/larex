/*
 *
 * @depth average depth for the entire model
 * @width width of each block
 * @nblocks number of blocks
 * */
const G = 6.67e-11;
const PI= Math.PI;

function startCalculation(){
    let depth = document.getElementById('depthInput').value;
    let width = document.getElementById('widthInput').value;
    let nblck = document.getElementById('nblckInput').value;

    let iesp = document.getElementById('iespInput').value;
    let icontrast = document.getElementById('icontrastInput').value;

    graphModel();
}

let calc = document.getElementById('calculateBtn');
calc.addEventListener('click', startCalculation);
