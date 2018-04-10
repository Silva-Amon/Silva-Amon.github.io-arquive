$(function(){
    $(window).resize(function(){
        if ($(window).width() < 583){
            $("#navUl").css("display", "none");
        }
        else{
            $("#navUl").css("display", "block");
        }
    });
    $('#hamburger').click(function(){
        $("#navUl").slideToggle();
    });

});
