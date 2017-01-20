/**
 * Created by root on 10/01/17.
 */
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
$('#first').addClass('active');

$(window).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function exitfs(e) {
    var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
    var event = state ? 'FullscreenOn' : 'FullscreenOff';
    if (event == 'FullscreenOff'){
        location.reload(true);
    } 
});
$('.diff-border').draggable();
$('#drop').droppable({
    drop:function (){
        alert('depot ok!');
    }
});