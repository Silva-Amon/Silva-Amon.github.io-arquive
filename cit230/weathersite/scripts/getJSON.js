            //JSON
            var article = document.querySelector('article');
            var section1 = document.getElementById('sec1');
            var section2 = document.getElementById('sec2');
            var section3 = document.getElementById('sec3');

            var requestURL = 'https://byui-cit230.github.io/weather/data/towndata.json';

            var request = new XMLHttpRequest();

            request.open('GET', requestURL);

            request.responseType = 'json';

            request.send();

            request.onload = function(){

                var town = request.response;
                fillArticle(town);
                fillSection1(town);
                fillSection2(town);
                fillSection3(town);

            }
            function fillArticle(json){

                var h2 = document.createElement('h2');
                var para1 = document.createElement('p');
                var para2 = document.createElement('p');
                var para3 = document.createElement('p');
                var listItem = document.createElement('ul');
                var img = document.createElement('img');

                h2.textContent = "Weather Store " + json['towns'][2]['name'];

                para1.textContent = json['towns'][2]['motto'];
                para2.textContent = "It was founded in " + json['towns'][2]['yearFounded']
                    + ". The current population there is of " +json['towns'][2]['currentPopulation']
                    + " The average rain fall there is of " +json['towns'][2]['averageRainfall'] + ".";
                para3.textContent = "The events for this place is:";
                article.appendChild(h2);
                article.appendChild(para1);
                article.appendChild(para2);
                article.appendChild(para3);

                var townsEvents = json['towns'][2]['events'];

                for (var i = 0; i < townsEvents.length; i++){
                    var ListEvents = document.createElement('li');
                    ListEvents.textContent = townsEvents[i];
                    listItem.appendChild(ListEvents);
                    article.appendChild(listItem);
                }

                img.setAttribute("src","img/treen-and-sun-small.jpg");
                img.className = "mainImg";
                article.appendChild(img);
            }
            function fillSection1(json){

                var h2 = document.createElement('h2');
                var para1 = document.createElement('p');
                var para2 = document.createElement('p');
                var para3 = document.createElement('p');
                var listItem = document.createElement('ul');
                var img = document.createElement('img');
                

                h2.textContent = json['towns'][0]['name'];

                para1.textContent = json['towns'][0]['motto'];
                para2.textContent = "It was founded in " + json['towns'][1]['yearFounded']
                    + ". The current population there is of " +json['towns'][0]['currentPopulation']
                    + " The average rain fall there is of " +json['towns'][0]['averageRainfall'] + ".";
                para3.textContent = "The events for this place is:";
                section1.appendChild(h2);
                section1.appendChild(para1);
                section1.appendChild(para2);
                section1.appendChild(para3);
                

                var townsEvents = json['towns'][0]['events'];

                for (var i = 0; i < townsEvents.length; i++){
                    var ListEvents = document.createElement('li');
                    ListEvents.textContent = townsEvents[i];
                    listItem.appendChild(ListEvents);
                    section1.appendChild(listItem);
                }
                img.setAttribute("src","img/galery/pexels-photo-164024-640-350.jpeg");
                img.className = "mainImg";
                section1.appendChild(img);
                
                
            }
            function fillSection2(json){

                var h2 = document.createElement('h2');
                var para1 = document.createElement('p');
                var para2 = document.createElement('p');
                var para3 = document.createElement('p');
                var listItem = document.createElement('ul');
                var img = document.createElement('img');

                h2.textContent = json['towns'][1]['name'];

                para1.textContent = json['towns'][1]['motto'];
                para2.textContent = "It was founded in " + json['towns'][1]['yearFounded']
                    + ". The current population there is of " +json['towns'][1]['currentPopulation']
                    + " The average rain fall there is of " +json['towns'][1]['averageRainfall'] + ".";
                para3.textContent = "The events for this place is:";
                section2.appendChild(h2);
                section2.appendChild(para1);
                section2.appendChild(para2);
                section2.appendChild(para3);

                var townsEvents = json['towns'][1]['events'];

                for (var i = 0; i < townsEvents.length; i++){
                    var ListEvents = document.createElement('li');
                    ListEvents.textContent = townsEvents[i];
                    listItem.appendChild(ListEvents);
                    section2.appendChild(listItem);
                }
                img.setAttribute("src","img/franklingCity1.jpeg");
                img.className = "mainImg";
                section2.appendChild(img);
            }
            function fillSection3(json){

                var h2 = document.createElement('h2');
                var para1 = document.createElement('p');
                var para2 = document.createElement('p');
                var para3 = document.createElement('p');
                var listItem = document.createElement('ul');
                var img = document.createElement('img');

                h2.textContent = json['towns'][3]['name'];

                para1.textContent = json['towns'][3]['motto'];
                para2.textContent = "It was founded in " + json['towns'][3]['yearFounded']
                    + ". The current population there is of " +json['towns'][3]['currentPopulation']
                    + " The average rain fall there is of " +json['towns'][3]['averageRainfall'] + ".";
                para3.textContent = "The events for this place is:";
                section3.appendChild(h2);
                section3.appendChild(para1);
                section3.appendChild(para2);
                section3.appendChild(para3);

                var townsEvents = json['towns'][3]['events'];

                for (var i = 0; i < townsEvents.length; i++){
                    var ListEvents = document.createElement('li');
                    ListEvents.textContent = townsEvents[i];
                    listItem.appendChild(ListEvents);
                    section3.appendChild(listItem);
                }
                img.setAttribute("src","img/galery/pexels-photo-306825-640x426.jpeg");
                img.className = "mainImg";
                section3.appendChild(img);
            }