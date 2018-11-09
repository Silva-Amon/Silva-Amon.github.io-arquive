function playAnimation(){
    var button = document.getElementsByTagName("button")[0]; 
    var square1 = document.getElementById("square1");
    square1.classList.add("horizontal");
    button.textContent = "Stop Animation";
    button.setAttribute("onclick", "stopAnimation()");
}
function stopAnimation(){
    var button = document.getElementsByTagName("button")[0]; 
    var square1 = document.getElementById("square1");
    square1.classList.remove("horizontal");
    button.textContent = "Play Animation";
    button.setAttribute("onclick", "playAnimation()");
}
//Transition
function playTransition(){
    var button = document.getElementsByTagName("button")[1]; 
    var square2 = document.getElementById("square2");
    square2.classList.add("rotate");
    button.textContent = "Stop Transition";
    button.setAttribute("onclick", "stopTransition()");
}
function stopTransition(){
    var button = document.getElementsByTagName("button")[1]; 
    var square2 = document.getElementById("square2");
    square2.classList.remove("rotate");
    button.textContent = "Play Transition";
    button.setAttribute("onclick", "playTransition()");
}