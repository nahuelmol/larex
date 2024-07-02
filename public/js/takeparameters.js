/*
 *
 * @depth average depth for the entire model
 * @width width of each block
 * @nblocks number of blocks
 * */


function startCalculation(){
    let depth = document.getElementById('depthInput').value;
    let width = document.getElementById('widthInput').value;
    let nblck = document.getElementById('nblckInput').value;

    console.log('depth: '+depth);
    console.log('width: '+width);
    console.log('nblck: '+nblck);
}

let calc = document.getElementById('calculateBtn');
calc.addEventListener('click', startCalculation);
