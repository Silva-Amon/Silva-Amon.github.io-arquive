$(function(){
   navigate();
   if (window.location.hash.length == 0){
      $('#Portfolio').css('display','block');
   }
});

function navigate(href){
   //Creating and Populating hashList.
   var hashList = [];
   var as = document.getElementsByTagName('nav')[0].getElementsByTagName('a');

   for(var a of as){
      hashList.push(a.getAttribute('href'));
   }

   //load actual hash in the url
   var actualHash = window.location.hash;
   
   //if the link wasn't clicked, this code will play
   if (typeof href === 'undefined'){
      for (var a of hashList){
         $(a).fadeOut(400);
      }
      setTimeout(()=>$(actualHash).fadeIn(600),500);
      
   }
   else {
      for (var a of hashList){
         if (a != href){
            $(a).slideUp(400);
         }
      }
      setTimeout(() => $(href).slideDown(600), 500);
   }

}