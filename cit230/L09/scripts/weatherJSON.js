var weatherObject = new XMLHttpRequest();

weatherObject.open('GET', 'http://api.wunderground.com/api/3a922c17c0b56de7/conditions/q/MN/Franklin.json', true);

weatherObject.send();

weatherObject.onload = function() {

    var weatherInfo = JSON.parse(weatherObject.responseText);
    console.log(weatherInfo);
    document.getElementById('cityName').innerHTML = weatherInfo.current_observation.display_location.full;
    document.getElementById('weather').innerHTML = weatherInfo.current_observation.weather;
    document.getElementById('wind').innerHTML = weatherInfo.current_observation.wind_mph;
    document.getElementById('temp').innerHTML = weatherInfo.current_observation.temp_f;
    document.getElementById('w_icon').src = weatherInfo.current_observation.icon_url;
    
    
}
