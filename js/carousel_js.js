/**
 * Created by root on 10/01/17.
 */
$(document).ready(function() {
    $("#lightgallery").lightGallery();
});
$(document).ready(function() {
    $("#light-slider").lightGallery();
});
$('.carousel').carousel({
    interval:5000,
    pause: null
});

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