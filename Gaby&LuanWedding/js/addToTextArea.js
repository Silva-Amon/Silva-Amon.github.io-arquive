var ItensTextArea = [];

function MgnTextArea(text){
    
    //return true if the value is finded in the array. (I ♥ you ES6).
    
    if (ItensTextArea.find(textCom => textCom == text)){
        removeItemTextArea(text);
    }else{
        addToTextArea(text);
    }
    var items = ItensTextArea.map(item => " • " + item + "\n").toString();
    
    var name;
    name = document.getElementById("name").value;
    if (typeof name === 'undefined' || name == ""){
        name = "É... Qual seu nome mesmo??? rsrs.";
    }
    
    document.getElementById("message").textContent = "Queridos, Gabrielly e Luan.\n\nGostaria de me comprometer a doar os seguintes presentes (ou o valor em dinheiro):\n\n" + items.replace(/,/g,"") + "\nAtt, " + name;
}

function nameChange(inputText){
    var actualText = document.getElementById("message").textContent;
    
    var splitText = actualText.split("Att,");
    var newName = inputText.value;

    document.getElementById("message").textContent = splitText[0] + "Att, " + newName;
    
}
//replace code reference: https://www.tek-tips.com/viewthread.cfm?qid=1134940

function addToTextArea(element){
    ItensTextArea.push(element);
//    alert(ItensTextArea);
}

function removeItemTextArea(text){
    
    ItensTextArea = ItensTextArea.filter(e => e !== text); 
//    alert(ItensTextArea);
    
}