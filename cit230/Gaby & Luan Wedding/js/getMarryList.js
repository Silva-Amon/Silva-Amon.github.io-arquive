
$(function(){    

    $.getJSON("json/lista.json", function(lista){

        $.each(lista.lista, function(id, listObj){
            if (id % 2 == 0){
                $("#marryList").append("<span href='#' class='list-group-item list-group-item-danger'>" + listObj.Produto + " -  <strong>R$" + listObj.Preco.toFixed(2) + "</strong></span>");
            }
            else {
                $("#marryList").append("<span href='#' class='list-group-item'>" + listObj.Produto + " - <strong>R$" + listObj.Preco.toFixed(2) + "</strong></span>");
            }
        });
    });
});