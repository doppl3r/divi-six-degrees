jQuery(document).ready(function($) {
    // Append empty popup if null
    if ($('#popup').length < 1) {
        $('body').append(
            '<div id="popup">' +
                '<div class="background close"></div>' +
                '<div class="wrapper">' +
                    '<a aria-label="close popup" class="button close" href="#">x</a>' +
                    '<div class="content"></div>' +
                '</div>' +
            '</div>'
        );
    }

    // Add thumbnail click listener
    $(document).on('click', popupTarget, function(e){
        e.preventDefault();
        var body = $('body');
        var popup = $('#popup');
        var content = $(this).clone().html();
        var close = popup.find('.close');
        body.addClass('disable-scroll');
        popup.addClass('visible');
        popup.find('.content').html(content);
        popup.find('.content').scrollTop(0);
        close.focus();
    });
    
    // Add popup click listener
    $(document).on('click', '#popup .close', function(e){
        e.preventDefault();
        var popup = $('#popup');
        var content = popup.find('.content');
        var body = $('body');
        body.removeClass('disable-scroll');
        popup.removeClass('visible');
        content.empty();
    });
});