document.getElementById("iFramPor").addEventListener("load", function(){
    var url = this.contentWindow.location.href;
    console.log(url);
});


function updatePage(){
    var porURL = document.getElementById("iFramPor").getElementsByTagName("a");
    var engURL = porURL.replace("por", "eng");
    document.getElementById("iFramEng").src = engURL;
    console.log(engURL);
}