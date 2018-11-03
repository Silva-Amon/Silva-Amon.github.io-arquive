function updatePage(){
    var iFramPor;
    document.getElementById("iFramPor").addEventListener("load", function(){
        iFramPor = document.getElementById("iFramPor");
    });    
    console.log(iFramPor);
    //    iFramPor = iFramPor.replace("#document","");

    //    var porURL = document.getElementById("iFramPor").contentWindow.document.getElementsByTagName("a").href;
    //    console.log(porURL);
    //    var engURL = porURL.replace("por", "eng");
    //    document.getElementById("iFramEng").src = engURL;
    //    console.log(engURL);
}