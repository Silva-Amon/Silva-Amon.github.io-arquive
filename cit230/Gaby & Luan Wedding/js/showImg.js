$(function(){
    $(".thumbernail").click(function(){
        if ($(this).hasClass("thumbernail")){
            $(".LargeImg").addClass("thumbernail");
            $(".thumbernail").removeClass("LargeImg");

            $(this).addClass("LargeImg");
            $(this).removeClass("thumbernail");
            var $img = $(this);

            //            console.log("Img top offset: " + $img.offset().top);
            //            console.log("Window Top: " + ($img.offset().top - $(document).scrollTop()));
            setTimeout(
                function() 
                {
                    $('html, body').stop().animate({
                        scrollTop: $img.offset().top
                    }, 600);
                }, 300);
        }

        else{
            $(this).removeClass("LargeImg");
            $(this).addClass("thumbernail");
        }
    }); 
});