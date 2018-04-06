var velocity = 0.5;
$(window).bind('scroll', update);
function update(){ 
    var pos = $(window).scrollTop(); 
    $('header').each(function() { 
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-100;
        $(this).css('backgroundPosition', '50% ' + Math.round((height - pos) * velocity) +  'px');
    }); 
};





//$(function(){
//    var velocity = 0.5;
//    function update(){
//        var pos = $(window).scrollTop();
//        $('header').each(function(){
//            var $element = $(this);
//            var height = $element.height()-18;
//            $(this).css('backgroundPosition', '50%' + Math.round((height - pos) * velocity) + 'px');
//        });
//        
//        $(window).bind('scroll', update);
//    }
//





//});

//$(function(){
//    var velocity = 0.5;
//    function update(){ 
//        var pos = $(window).scrollTop(); 
//        $('header').each(function() { 
//            var $element = $(this);
//            if ($element.height() < 419){
//                var height = $element.height()-100;
//                $(this).css('backgroundPosition', '100% ' + Math.round((height - pos) * velocity) +  'px');
//            }
//            // subtract some from the height b/c of the padding
//
//        }); 
//    };
//
//    $(window).bind('scroll', update);
//})
//
//
//function scrollBanner() {
//  var scrollPos;
//  var headerText = document.querySelector('header');
//  scrollPos = window.scrollY;
//
//  if (scrollPos <= 600) {
//      headerText.style.transform =  "translateY(" + (-scrollPos/3) +"px" + ")";
//      headerText.style.opacity = 1 - (scrollPos/600);
//  }
//}
//
//window.addEventListener('scroll', scrollBanner);