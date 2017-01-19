/**
 * Created by root on 10/01/17.
 */
$('.carousel').carousel({
    interval:5000,
    pause: null
});

<!--function loadimage() {
   $.getJSON("data_js",function (data){
       var item= [];
       $.each(data, function (key,val){
            item.push()
       }

       )

   })
}-->
loadimage();
var elem = document.getElementsByClassName("news-image");
if (elem.requestFullscreen) {
    elem.requestFullscreen();
}
$('#glyph').on('click',function (){
    var nav = $('body > header > nav');
    nav.remove('nav');
    var span = $('.carousel span');
    span.replaceWith('');
});

$(window).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function exitfs(e) {
    var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
    var event = state ? 'FullscreenOn' : 'FullscreenOff';
    if (event == 'FullscreenOff'){
        location.reload(true);
    }
});
