$(function(){
//Variables and objects
var $lista = [];
var total = 0;
var totalTudo = 0;
function $listaObj (Produto, Preco){
    this.Produto = Produto;
    this.Preco = Preco;
}
    $.getJSON("json/lista.json", function(lista){ //populate the array
        $.each(lista.lista, function(id, listObj){
            if ($lista.length < 4){
                $lista.push(new $listaObj(listObj.Produto, listObj.Preco.toFixed(2)));
                totalTudo += Math.abs(listObj.Preco);
            }
        });
        console.log ("total de tudo: " + totalTudo);
    });     
    $("main span").on("click", function(){
        if ($lista != null && $lista.length > 0){
            if($("main span").hasClass("active2")){
                if ($(this).hasClass("active2")){
                    for (var i = 0; i < $lista.length; i++){
                        if ($(this).text() == $lista[i].Produto + " -  R$" + $lista[i].Preco || 
                            $(this).text() == $lista[i].Produto + " - R$" + $lista[i].Preco ){ //add value
                            total += Math.abs($lista[i].Preco);
                            $("#total").text(total);
                            console.log("Adicionado: " + total);
                        }
                    }
                }else{
                    for (var i = 0; i < $lista.length; i++){
                        if (($(this).text() != $lista[i].Produto + " -  R$" + $lista[i].Preco || 
                             $(this).text() != $lista[i].Produto + " - R$" + $lista[i].Preco) && total > 0){ //subtract value
                            console.log("Subtraido: " + total + " Preço: " + $lista[i].Preco);
                            total = total-Math.abs($lista[i].Preco);
                            $("#total").text(total);

                        }
                    }
                }
            }
        }
    });
});  