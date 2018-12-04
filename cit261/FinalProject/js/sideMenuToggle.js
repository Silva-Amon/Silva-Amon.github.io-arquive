function sideBarShow(){
    var sideBar = document.getElementById('menu');
    sideBar.style.transform = 'translateX(0px)';
}
function closeSideMenu(){
    var sideBar = document.getElementById('menu');
    sideBar.style.transform = 'translateX(-1024px)';
}
function backMenu(){
    var sideBar = document.getElementById('searchResults');
    sideBar.style.transform = 'translateX(1024px)';
    var winUrl = window.location.href;
    var prodPos = winUrl.search("age_product");
    window.location.href = winUrl.substr(0, prodPos);
    
}