var header = document.querySelector('#mainGrid section header');
var section = document.querySelector('#mainGrid section section');

var requestURL = 'data/tour.json';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

request.onload = function() {
    var tours = request.response;
    populateHeader(tours);
}

function populateHeader(jsonObj) {
    var mainGrid = document.querySelector("#tourGrid");
    var tour = jsonObj['tours'];
    
    for (var i = 0; i < tour.length; i++){
        
        //create section
        var section = document.createElement('section');
        //create h1
        var myH1 = document.createElement('h1');
        //create h2
        var mottoH2 = document.createElement('h2');
        
        var lengthH2 = document.createElement('h2');
        var skillH2 = document.createElement('h2');
        var costH2 = document.createElement('h2');
        var locationH2 = document.createElement('h2');
        //appending to the mainGrid
        myH1.textContent = tour[i]['company'];
        mottoH2.textContent = tour[i]['motto'];
        //length
        lengthH2.textContent = "Length";
        paraLength = document.createElement('p');
        paraLength.textContent  = tour[i]['length'] + " miles";
        //skill
        skillH2.textContent = "Skills";
        paraSkill = document.createElement('p');
        paraSkill.textContent  = "Bike level skill: " + tour[i]['skill'];
        //cost
        costH2.textContent = "Cost";
        paraCost = document.createElement('p');
        paraCost.textContent  = "Cost: $" + tour[i]['cost'];
        //location
        locationH2.textContent = "Location";
        paraLocation = document.createElement('p');
        paraLocation.textContent  = "Location: " + tour[i]['location'];
        //description
        paraDescription = document.createElement('p');
        paraDescription.textContent  = tour[i]['description'];
        
        section.appendChild(myH1);
        section.appendChild(mottoH2);
        section.appendChild(paraDescription);
        section.appendChild(lengthH2);
        section.appendChild(paraLength);
        section.appendChild(skillH2);
        section.appendChild(paraSkill);
        section.appendChild(costH2);
        section.appendChild(paraCost);
        section.appendChild(locationH2);
        section.appendChild(paraLocation);
        
        
        mainGrid.appendChild(section);
        
    }

}