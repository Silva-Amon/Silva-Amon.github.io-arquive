function searchResults(){
    var searchContainer = document.getElementById('searchResults');
    searchContainer.style.transform = 'translateX(0px)';
}

function requestJSON(element){
    var loading = document.getElementById('loading');
    loading.style.display = 'block';
    var url = window.location.href;
    var urlSplit;
    if (element.tagName == 'A'){
        url += element.getAttribute("href");
        urlSplit = url.split('?',2);
    }else if(url.includes("?")){
        urlSplit = url.split('?',2);
        console.log(urlSplit);
        urlSplit[1] = urlSplit[0];
        window.location.href = urlSplit[0];
    }else{
        url = window.location.href;
    }

    var codeParam;
    var codeText;
    var codeNumb;
    var requestURL;
    var productRequested = false;

    if(urlSplit != undefined){
        codeParam = urlSplit[1];
        codeText = codeParam.substr(0,4);
        codeNumb = codeParam.substr(5);
    }

    if (codeText == 'code'){
        requestURL = 'https://us.openfoodfacts.org/api/v0/product/' + codeNumb + '.json';
        productRequested = true;

    }else{
        //food search
        var txtFood = document.getElementById("txtSearch").value;
        requestURL = 'https://us.openfoodfacts.org/cgi/search.pl?search_terms='+ txtFood + '&search_simple=1&jqm=1';
    }
    var request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();

    request.onload = function(){
        if (productRequested == false){
            var food = request.response;
            printJSONSearch(food);
        }
        else{
            var product = request.response;
            printJSONProduct(product);
        }
    }
    request.onloadend = function(){

        if (productRequested == false){
            var imgs = document.getElementsByTagName('img');
            var a = document.getElementsByTagName('a');

            //calling the function if link clicked
            for(var i = 0; i < a.length; i++) {
                a[i].setAttribute("onclick","requestJSON(this)");
            }

            var imgLoading = document.getElementById('loading');
            
            //loading imgs in data-src
            for(var i = 1; i < imgs.length; i++) {
                var dataSrc = imgs[i].getAttribute('data-src');
                imgs[i].setAttribute('src',''); // remove old src data 
                imgs[i].setAttribute('src', dataSrc);
                imgLoading.setAttribute('src', 'img/loading.png');
            }
            
            // retrieved from https://stackoverflow.com/questions/29578186/use-javascript-to-write-src-attribute-as-data-src-as-page-is-loading
 
            imgLoading.style.display = 'none';
        }
    }
}
//print search
function printJSONSearch(json){
    var result = document.getElementById('result');
    if (typeof main !== 'undefined'){
        result.innerHTML = json.jqm;
    }else{
        var result = document.createElement('div');
        result.setAttribute('id', 'result');
        result.innerHTML = json.jqm;
        document.getElementsByTagName('main')[0].appendChild(result);
    }
}
//print products
function printJSONProduct(productJSON){
    var product = productJSON.product;
    var result = document.getElementById('productContent');
    if (typeof result !== 'undefined'){
        var productName = document.getElementById('productName');
        
        productName.textContent = product.product_name;
        
        result.innerHTML = "<img src='" + product.image_url + "' alt='Food Picture'>" + "<h3>Ingredients</h3>"+"<p>" + product.ingredients_text + "</p>";
        
        var imgLoading = document.getElementById('loading');
        imgLoading.style.display = 'none';
        
        document.getElementById('searchResults').style.transform = 'translateX(0px)';
    }else{
        var result = document.createElement('div');
        result.setAttribute('id', 'productContent');
        result.innerHTML = "<h1>" + product.product_name + "</h1><img src='" + product.image_url + "' alt='Food Picture'>" + "<h3>Ingredients</h3>"+"<p>" + product.ingredients_text + "</p>";
        document.getElementsByTagName('main')[0].appendChild(result);
        
        var imgLoading = document.getElementById('loading');
        imgLoading.style.display = 'none';
        
         document.getElementById('searchResults').style.transform = 'translateX(0px)';
    }
}
