function sideBarShow(){
    var sideBar = document.getElementById('menu');
    sideBar.style.transform = 'translateX(0px)';
}
function closeSideMenu(){
    var sideBar = document.getElementById('menu');
    sideBar.style.transform = 'translateX(-1024px)';
}
function backMenu(){
    var searchResults = document.getElementById('searchResults');
    searchResults.style.transform = 'translateX(1024px)';
    
    var footer = document.querySelector('footer');
    footer.style.transform = 'translateX(1024px)'; 
    
    setTimeout(function(){
       footer.style.display = 'none'; 
        searchResults.style.display = 'none';
    }, 300);
    
    //restoring url
    var winUrl = window.location.href;
    var prodPos = winUrl.search("age_product");
    if (prodPos == -1){
        prodPos = winUrl.search("#");
    }
    window.location.href = winUrl.substr(0, prodPos+1);
    document.getElementById('loading').style.display = 'none';
}
function showAbout(){
    var footer = document.querySelector('footer');
    footer.style.display = 'block';  
    setTimeout(function(){
       footer.style.transform = 'translateX(0px)';  
    }, 300);
     
}