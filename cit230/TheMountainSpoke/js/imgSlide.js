$(function(){
    $("#one").css("display", "block");
    var i = 1;
    setInterval(function(){
        if (i == 0){
            $(".slideImg").fadeIn(400).css("display", "none");
            $("#one").css("display", "block");
            i++;
            return;
        }
        if (i == 1){
            $(".slideImg").fadeIn(400).css("display", "none");
            $("#two").css("display", "block");
            i++;
            return;
        }
        if (i == 2){
            $(".slideImg").fadeIn(400).css("display", "none");
            $("#three").css("display", "block");
            i = 0;
            return;
        }
        
    }, 2000);
});

/* -------------- Slide Show with SlideDown ------------------
    setInterval(function(){
        if (i == 0){
            $(".slideImg").css("display", "none");
            $("#one").slideDown().css("display", "block");
            i++;
            return;
        }
        if (i == 1){
            $(".slideImg").css("display", "none");
            $("#two").slideDown().css("display", "block");
            i++;
            return;
        }
        if (i == 2){
            $(".slideImg").css("display", "none");
            $("#three").slideDown().css("display", "block");
            i = 0;
            return;
        }
        
    }, 2000);
*/