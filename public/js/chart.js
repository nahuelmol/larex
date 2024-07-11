const ctx = document.getElementById('myChart');

function isNumber(number){
    /*try {
        return true;
    } catch(e) {
        return false;
    }*/
    return !isNaN(parseFloat(number));
}
function stringToData(stringData){
    let xdata = [];
    let ydata = [];
    let data = [];
    let number = "";
    Array.from(stringData).forEach(ch => {
        switch(ch){
            case '\n':
                if(isNumber(number)){
                    data.push(number);
                    number = "";
                };
            case '\t':
                if(isNumber(number)){
                    data.push(number);
                    number = "";
                };
            default:
                if(isNumber(ch)){
                    number = number + ch;
                }
        }
    })
    data.forEach((dat,i) => {
        if((i % 2) == 0){
            xdata.push(dat);
        } else {
            ydata.push(dat);
        }
    })
    alldata = [xdata,ydata];
    return alldata;
}
let chart;
var xdata;
var ydata;
function charting(){
    if(chart){
        chart.destroy();
    }
    let stringData = document.getElementById('dataset');
    let data = stringToData(stringData.textContent);
    xdata = data[0];
    ydata = data[1]
    chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: data[0],
          datasets: [{
            label: 'observed data',
            data: data[1],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
    });
}

