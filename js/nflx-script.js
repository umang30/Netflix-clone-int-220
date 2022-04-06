function numberWithCommas(x) {
    return String(x).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const myParam = "ctWEbnrKnhzNiTT_IgrOpJ6QuCcJIpnN";
document.addEventListener('DOMContentLoaded', function() {
    var priceCont = document.getElementById("stock_price");
    var changeCont = document.getElementById("stock_change");
    var volumeCont = document.getElementById("volume");
    var timeUpdated = document.getElementById("time_updated");
    fetch('https://api.polygon.io/v2/aggs/ticker/NFLX/prev?adjusted=true&apiKey='+myParam,{
        method: 'GET',
    }).then(function(response){
        return response.json();
    }).then(async function(data) {
        var results = data.results[0];
        console.log(results);
        priceCont.textContent = "$" + results.c;
        let change = (results.c - results.o).toFixed(2);
        changeCont.textContent = change + " (" + ((change/Math.max(results.o, results.c)) * 100).toFixed(2) + "%)";
        volumeCont.textContent = "VOLUME: "+numberWithCommas(results.v);
        let date = new Date(results.t);
        let month = date.getMonth() + 1;
        let day = date.getDate();
        let year = date.getFullYear();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let meridian  = "AM";
        if(hours>=12){
            meridian = "PM";
        }
        if(hours>12){
            hours = hours - 12;
        }
        if(hours==0){
            hours = 12;
        }
        if(minutes<10){
            minutes = "0" + minutes;
        }
        if(month<10){
            month = "0" + month;
        }
        if(day<10){
            day = "0" + day;
        }
        year = String(year).substring(2,4);
        timeUpdated.textContent = month + "/" + day + "/" + year + " " + hours + ":" + minutes + " " + meridian;

    });
});
function toggleTheme(param){
    if(param.getAttribute('src') == "/int220/imgs/theme.png"){
        document.body.classList.add("dark-theme");
        param.setAttribute('src', "/int220/imgs/theme_dark.png");
    } else {
        document.body.classList.remove("dark-theme");
        param.setAttribute('src', "/int220/imgs/theme.png");
    }
}