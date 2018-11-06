
var preStyle;
function random(){
    var diceVal = [];
    var i = 0;
    var randomVal = 0;

    while (i < 6){

        randomVal = Math.floor(Math.random() * 6) + 1;

        if (randomVal != diceVal[0] &&
            randomVal != diceVal[1] &&
            randomVal != diceVal[2] &&
            randomVal != diceVal[3] &&
            randomVal != diceVal[4] &&
            randomVal != diceVal[5]){

            diceVal[i] = randomVal;
            i++;
        }else{
            continue;
        }
    }
    document.getElementById("front").textContent = diceVal[0];
    document.getElementById("back").textContent = diceVal[1];
    document.getElementById("right").textContent = diceVal[2];
    document.getElementById("left").textContent = diceVal[3];
    document.getElementById("top").textContent = diceVal[4];
    document.getElementById("bottom").textContent = diceVal[5];

    document.getElementById("cube").style.transform = "rotateX(" + Math.floor(Math.random() * 720) + "deg) rotateY(" + Math.floor(Math.random() * 720) + "deg)";

    //    document.getElementById("cube").style.transform = "rotateX(420deg) rotateY(740deg)";

    setTimeout(function(){
        document.getElementById("cube").style.transform = "rotateX(-84deg)";
    }, 1500);

}
//mouse click
document.getElementById("cube").addEventListener("click", function(){
    random();
});

//mouse over
document.getElementById("cube").addEventListener("mouseover", function(){
    preStyle = this.style;
    this.style.transform = "rotateX(-84deg) rotateY(0deg)";
});

//mouse out
document.getElementById("cube").addEventListener("mouseout", function(){
    this.style = preStyle;
});
