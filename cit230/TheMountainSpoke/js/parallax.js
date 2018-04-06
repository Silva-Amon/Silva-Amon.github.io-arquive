$(function(){
    var velocity = 0.5;
    function update(){ 
        var pos = $(window).scrollTop(); 
        $('header').each(function() { 
            var $element = $(this);
            if ($element.height() < 419){
                var height = $element.height()-100;
                $(this).css('backgroundPosition', '100% ' + Math.round((height - pos) * velocity) +  'px');
            }
            // subtract some from the height b/c of the padding

        }); 
    };

    $(window).bind('scroll', update);
})


