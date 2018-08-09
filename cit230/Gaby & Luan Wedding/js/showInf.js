
$(function(){
    $("#showInf").click(function(){
        $(".inf").slideToggle(500);
        setTimeout(
            function() 
            {
                $('html, body').stop().animate({
                    scrollTop: $(".inf").offset().top
                }, 600);
            }, 300);
    });
});