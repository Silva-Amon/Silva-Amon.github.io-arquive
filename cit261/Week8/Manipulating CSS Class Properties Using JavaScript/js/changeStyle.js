function rotateDice(){
    var dice = document.querySelector("#cube");
    dice.style.transform = "rotateX(360deg) rotateY(720deg)";

    changeColor(".side");

    setTimeout(function(){
        dice.style.transform = "rotateX(-42deg) rotateY(32deg)";
    }, 1700);
}

function changeColor(query){
    var defaultColor = getRandomColor()
    elements = document.querySelectorAll(query);
    for (element of elements){
        element.style.backgroundColor = defaultColor; //we can use the style property and choose the css property to change
    }
}

function getRandomColor(){
    var R = 0;
    var G = 0;
    var B = 0;
    var A = 0;
    var rgbaColor = "";
    R = Math.floor(Math.random() * 255);
    G = Math.floor(Math.random() * 255);
    B = Math.floor(Math.random() * 255);
    A = (Math.random() * 1).toFixed(2);
    rgbaColor = "rgba(" + R + "," + G + "," +  B + "," + A + ")";
    return rgbaColor;

}

/*function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
    //https://stackoverflow.com/questions/1484506/random-color-generator
}*/

function changeClass(){
    var dice = document.getElementById("cube");
    if (dice.classList.contains("cube")){
        dice.classList.remove("cube");
//        dice.className = "";
//        dice.className = dice.className.replace("cube", "");
//        dice.removeAttribute("class");
//        dice.setAttribute("class", "");
    }else{
//        dice.setAttribute("class", "cube");
        dice.classList.add("cube");
        
    }
}