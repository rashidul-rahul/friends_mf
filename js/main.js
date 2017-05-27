//$(document).ready(function(){
//    $('#nav').slicknav();
//    $("#responsive_vedio").fitVids();
//});

<!-- SLIDER AREA -->
    $('#myCarousel').carousel({
        pause: 'none'
    })



$('.hide-password').on('click', function(){
    var $this= $(this),
        $password_field = $this.prev('input');

    ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
    ( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
    //focus and move cursor to the end of input field
    $password_field.putCursorAtEnd();
});
$('.hide-password').on('click', function(){
    var $this= $(this),
        $password_field = $this.prev('input');

    ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
    ( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
    //focus and move cursor to the end of input field
    $password_field.putCursorAtEnd();
});