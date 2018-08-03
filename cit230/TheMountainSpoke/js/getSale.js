$(function(){
    $("#test").click(function(){
        //conection with JSON
        $.getJSON("data/saleJSON.json", function(prodJSON){

            //getting items of products
            var imgAdd = "img/socialMedia/whatsapp.svg";
            $.each(prodJSON.products, function(i, prod){
                $("#saleGrid").append("<section><h2>" + prod.name + "</h2> <p>Sizes: " + prod.sizes + "</p> <p>Price: $" + prod.price + "</p><p>Colors: " + prod.colors + "</p><p>Description: " + prod.description + "</p></section><img src='img/sale/sale"+ i +".jpg'>");
            });

        });
    });

});
