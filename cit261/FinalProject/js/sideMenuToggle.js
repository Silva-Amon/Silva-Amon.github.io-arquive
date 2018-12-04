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
    
    //restoring url
    var winUrl = window.location.href;
    var prodPos = winUrl.search("age_product");
    window.location.href = winUrl.substr(0, prodPos);
}
function showAbout(){
    var footer = document.querySelector('footer');
    footer.style.transform = 'translateX(0px)'; 
}