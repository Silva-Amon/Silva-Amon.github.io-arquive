var marryDay = new Date(2019,09,15);
var today = new Date();
var one_day = 1000*60*60*24;

var DivBetweenDates = (today.getTime() / marryDay.getTime());

var percentage = Math.floor(DivBetweenDates * 100);

var diffInDay = Math.abs(marryDay - today);

var days = Math.floor(diffInDay/one_day)-30; //less one month, because Jan is 0;

document.getElementById("day").textContent = "♥ " + days + " Dias para o casamento ♥";


$(function(){
   $("#day").css("width", percentage + "%");
});