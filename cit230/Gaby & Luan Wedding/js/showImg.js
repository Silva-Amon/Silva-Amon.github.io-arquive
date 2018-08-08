$(function(){
    $(".thumbernail").click(function(){
        if ($(this).hasClass("thumbernail")){
            $(".LargeImg").addClass("thumbernail");
            $(".thumbernail").removeClass("LargeImg");
            
            $(this).addClass("LargeImg");
            $(this).removeClass("thumbernail");
        }
        
        else{
            $(this).removeClass("LargeImg");
            $(this).addClass("thumbernail");
        }
    }); 
});