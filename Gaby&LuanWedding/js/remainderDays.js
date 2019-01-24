var marryDay = new Date(2019,11,30);
var today = new Date();

var one_day = 1000*60*60*24;
var DivBetweenDates = 0;

var diffAnos = diffAnos = today.getYear() - marryDay.getYear();


DivBetweenDates = (today.getMonth()+today.getDate()+diffAnos)/(marryDay.getMonth() + marryDay.getDate());

var percentage = Math.floor(DivBetweenDates * 100);

var diffInDay = Math.abs(marryDay - today);

var days = Math.floor(diffInDay/one_day)-29; //less one month, because Jan is 0, for some misterious reason, is -29 days than 30 (maybe because the leap year);



document.getElementById("day").textContent = "♥ " + days + " Dias para o casamento ♥ " + percentage + "%";


$(function(){
   $("#day").css("width", percentage + "%");
});