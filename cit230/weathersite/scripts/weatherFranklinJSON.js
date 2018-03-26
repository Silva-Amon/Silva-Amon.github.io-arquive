var weatherObject = new XMLHttpRequest();

weatherObject.open('GET', 'https://api.wunderground.com/api/3a922c17c0b56de7/conditions/q/MN/Franklin.json', true);

weatherObject.send();

weatherObject.onload = function() {

    var weatherInfo = JSON.parse(weatherObject.responseText);
    console.log(weatherInfo);
    document.getElementById('cityName').innerHTML = weatherInfo.current_observation.display_location.full;
    document.getElementById('weather').innerHTML = weatherInfo.current_observation.weather;
    document.getElementById('wind').innerHTML = weatherInfo.current_observation.wind_mph;
    document.getElementById('temp').innerHTML = weatherInfo.current_observation.temp_f;
    document.getElementById('w_icon').src = weatherInfo.current_observation.icon_url;
    document.getElementById('prec').innerHTML = weatherInfo.current_observation.precip_1hr_in*100;

    //calculate the windchill.
    var high = parseFloat(document.getElementById("high").textContent); //getting high temp.
    var low = parseFloat(document.getElementById("low").textContent); //getting low temp.
    var windSpeed = parseFloat(document.getElementById("wind").textContent); //getting the wind speed per hour.

    var t = (high + low) / 2; //wind speed

    var f = 35.74 + 0.6215 * t - 35.75 *  Math.pow(windSpeed, 0.16) + 0.4275 * t * Math.pow(windSpeed, 0.16); //Computing the wind chill factor.

    var windFactor = Math.round(f*100)/100; //round to decimal places.

    document.getElementById("windChillF").innerHTML = " " + windFactor + " °F";
}
