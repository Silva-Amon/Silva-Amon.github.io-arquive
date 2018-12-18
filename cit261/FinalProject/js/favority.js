function toggleColors(img){
   if (img.getAttribute('src') == 'img/star-yellow.png'){
      img.src='img/star-void.png';
      removeFav();
   }
   else{
      img.src='img/star-yellow.png';
      storeFav();
   }
}

function storeFav(){
//products length
   if(typeof window.localStorage['productIndex'] !== 'undefined'){
      var index = window.localStorage['productIndex'];
      window.localStorage.setItem('productIndex', parseInt(index)+1);
   }else{
       window.localStorage.setItem('productIndex', 1);
   }
   
   var codeNumb = getProdCode();
   
   //creating objects by product info
   
   //---Product Img---
   var productImg = document.querySelector('#productContent img');
   
   var img = {
      src: productImg.getAttribute('src'),
      alt: productImg.getAttribute('alt')
   };
   
   //---Product Name---
   var productName = document.querySelector('#productName').textContent;
   
   //---Product Ingredients---
   var productIgred = document.querySelector('#productContent p').textContent;
   
   //product object setting (index start at 1)
   var index = window.localStorage['productIndex'];
   
   var product = {
      code:parseInt(codeNumb),
      imgInfo:img,
      name:productName   
   };
   
   window.localStorage.setItem('product['+index+']', JSON.stringify(product));
}


function removeFav(){
 //products length
   if(typeof window.localStorage['productIndex'] !== 'undefined'){
      var index = window.localStorage['productIndex'];
      window.localStorage.setItem('productIndex', parseInt(index)-1);
   }else{
       window.localStorage.setItem('productIndex', 0);
   }
   
   var codeNumb = getProdCode();
   
   window.localStorage.removeItem(codeNumb);
   
   window.localStorage.removeItem(codeNumb+'imgSrc');
   
   window.localStorage.removeItem(codeNumb+'imgAlt');   
}

function getFav(){
   
   var products = [];
   for (var product in window.localStorage){
      if(product.substring(0,8) == 'product['){
         products.push(JSON.parse(window.localStorage[product]));
      }
   }
   console.log(products);
   console.log(JSON.parse(window.localStorage['productIndex']));

}

function getProdCode(){
   
    var url = window.location.href;
    var urlSplit;
   
   if(url.includes("?")){
        urlSplit = url.split('?',2);
   }
    var codeParam;
    var codeText;
    var codeNumb;

    if(urlSplit != undefined){
        codeParam = urlSplit[1];
        codeText = codeParam.substr(0,4);
        codeNumb = codeParam.substr(5);
    }
   return codeNumb;
}