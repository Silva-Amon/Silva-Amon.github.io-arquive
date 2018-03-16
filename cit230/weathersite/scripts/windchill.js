var high = parseFloat(document.getElementById("high").textContent); //getting high temp.
var low = parseFloat(document.getElementById("low").textContent); //getting low temp.
var windSpeed = parseFloat(document.getElementById("wind").textContent); //getting the wind speed per hour.

var t = (high + low) / 2; //wind speed

var f = 35.74 + 0.6215 * t - 35.75 *  Math.pow(windSpeed, 0.16) + 0.4275 * t * Math.pow(windSpeed, 0.16); //Computing the wind chill factor.

var windFactor = Math.round(f*100)/100; //round to decimal places.

document.getElementById("windChillF").innerHTML = " " + windFactor + " °F";
