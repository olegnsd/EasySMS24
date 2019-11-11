jQuery(document).ready(function(){
    jQuery('.parallax').each(function(){
        var $bgobj = jQuery(this); // создаем объект
        jQuery(window).scroll(function() {
            //var yPos = -((jQuery(window).scrollTop()+($bgobj.height()*5)) / 5);
var min=$bgobj.offset().top-jQuery(window).height();
var max=$bgobj.offset().top+$bgobj.innerHeight();
if(jQuery(window).scrollTop()>min & jQuery(window).scrollTop()<max){
var yPos=((jQuery(window).scrollTop()-min)/(max-min))*100;
            var coords = 'center '+ yPos + '%';
            $bgobj.css({ backgroundPosition: coords });}
        });


var min=$bgobj.offset().top-jQuery(window).height();
var max=$bgobj.offset().top+$bgobj.innerHeight();
if(jQuery(window).scrollTop()>min & jQuery(window).scrollTop()<max){
var yPos=((jQuery(window).scrollTop()-min)/(max-min))*100;
            var coords = 'center '+ yPos + '%';
            $bgobj.css({ backgroundPosition: coords });}


    });
});
