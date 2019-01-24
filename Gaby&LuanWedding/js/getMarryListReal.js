//**************************************************************************
//************* GETTING THE REAL JSON THAT GABY SENT TO ME *****************
//**************************************************************************

var requestURL = 'json/marryListReal.json';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

request.onload = function() {
    var lista = request.response;
    populateList(lista);
//    getPrice();
}
request.onloadend = function(){
    //BEGIN Item Selection color change
    $(function(){
        $("main span").click(function(){
            $(this).toggleClass("active2"); 
            // END Item Selection color change
        });
    });
}


function populateList(jsonObj) {
    var mainList = document.querySelector("#marryList");
    var lista = jsonObj;

    for (var i = 0; i < lista.length; i++){

        //**** create section *****
        var span = document.createElement('span');

        //**** appending to the mainList *****

        span.innerHTML = lista[i]['ProductName'];
        let productName = lista[i]['ProductName'];
//        console.log(lista[i]);
        span.onclick = () => MgnTextArea(productName);
        if (i % 2 == 0){
            span.classList.add("list-group-item");
            span.classList.add("list-group-item-danger");
        }
        else{
            span.classList.add("list-group-item");    
        }

        mainList.appendChild(span);

    }

}


/*

function getPrice(){
    var total = 0
    $("#marryList").append("<h2 id=total>Total: R$" + total.toFixed(2) + "</h2>"); 

    $(function(){
        $("#marryList > span").click(function(){
            if ($(this).hasClass("active2") == false){
                var valor = $(this).find("#preco").text();
                total += parseFloat(valor);
                $("#marryList #total").text("Total: R$" + total.toFixed(2));
            }
            else {
                var valor = $(this).find("#preco").text();
                total -= parseFloat(valor);
                $("#marryList #total").text("Total: R$" + total.toFixed(2));
            }

        });
    });
}
*/

