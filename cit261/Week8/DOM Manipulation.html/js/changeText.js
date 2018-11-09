function addTextBellow(){
    var text = document.getElementById("text").textContent;
    var paragraph = document.createElement("p");
    var node = document.createTextNode(text);
    paragraph.appendChild(node);
    document.body.appendChild(paragraph);
}
function addTextAbove(){
    var text = document.getElementById("text").textContent;
    var paragraph = document.createElement("p");
    var node = document.createTextNode(text);
    var p = document.getElementsByTagName("p")[0];
    paragraph.appendChild(node);
    document.body.insertBefore(paragraph, p);
}
function removeTextAbove(){
    var lastParagraph = document.getElementsByTagName("p")[0];
    if (lastParagraph.id != "plabel"){
        document.body.removeChild(lastParagraph);
    }
}
function removeTextBellow(){
    var lastParagraph = document.getElementsByTagName("p");
    if (lastParagraph[lastParagraph.length-1].id != "plabel"){
        document.body.removeChild(lastParagraph[lastParagraph.length-1]);
    }
}
function replaceText(){
    var paragraphs = document.getElementsByTagName("p");
    
    for (paragraph of paragraphs){
        
        var text = document.getElementById("text").textContent;
        var p = document.createElement("p");
        var node = document.createTextNode(text);
        p.appendChild(node);
        
        if (paragraph.id != "plabel"){
            document.body.replaceChild(p, paragraph);
        }
    }
}