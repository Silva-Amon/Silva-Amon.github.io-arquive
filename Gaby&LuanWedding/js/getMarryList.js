//$(function(){    
//
//    $.getJSON("json/lista.json", function(lista){
//
//        $.each(lista.lista, function(id, listObj){
//            if (id % 2 == 0){
//                $("#marryList").append("<span href='#' class='list-group-item list-group-item-danger'>" + listObj.Produto + " -  <strong>R$" + listObj.Preco.toFixed(2) + "</strong></span>");
//            }
//            else {
//                $("#marryList").append("<span href='#' class='list-group-item'>" + listObj.Produto + " - <strong>R$" + listObj.Preco.toFixed(2) + "</strong></span>");
//            }
//        });
//    });
//});

//var header = document.querySelector('#mainGrid section header');
//var section = document.querySelector('#mainGrid section section');
var requestURL = 'json/lista.json';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

request.onload = function() {
    var lista = request.response;
    populateList(lista);
    getPrice();
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
//Terminar de carregar arquivos JSON{
//
//	total = 0
//
//	clicar no span {
//
//		Se a class "selecioado" do span estiver desativada{
//
//			valor = pegar caracteres depois do "R$" dentro do span
//			total += valor
//			span.listaDeclass.add = "selecionado"
//		}
//		else {
//			valor = pegar caracteres depois do "R$" dentro do span
//			total -= valor
//		}
//	}
//
//	SpanTotal = criar span
//	SpanTotal = total
//}

function populateList(jsonObj) {
    var mainList = document.querySelector("#marryList");
    var lista = jsonObj['lista'];

    for (var i = 0; i < lista.length; i++){

        //create section
        var span = document.createElement('span');

        //appending to the mainList

        span.innerHTML = lista[i]['Produto'] + " - R$" + "<span id=preco>" + lista[i]['Preco'].toFixed(2) + "</span>";
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

