
function cloudpoints(setx,sety,canvas){
    let domain = canvas.width;
    for(let x = 0; x < domain; x++){
        setx.forEach(xi => {
            if (x == xi){
                let place = setx.indexOf(x)
                let y = sety[place]
                drawPixel(x,y)
            }
        })
    }
}


