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
}