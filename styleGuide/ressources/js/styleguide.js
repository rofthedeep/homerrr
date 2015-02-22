jQuery(function () {
    var that = this;

    // static navigation
    var chapters = [];
    jQuery('.chapter', this.ctx).each(function () {
        var content = jQuery('h3.chapterHeadline', this).html();
        chapters.push(content);
        jQuery('h3.chapterHeadline', this).attr('id', content);
        //jQuery('h3.chapterHeadline', this).html('<a name="' + content + '">'+ content +'</a>' );
    });
    console.log(chapters);
    jQuery('.navigationContent').html(function () {
        var content = '';
        jQuery.each(chapters, function (i, val) {
            console.log(val);
            content = content + '<li><a href="#' + val + '">' + val + '</a></li>';
            return content;
        });
        return '<ul>' + content + '</ul>';
        console.log(content);
    });

    //Smooth Scroll
    jQuery('.navigationContent a').click(function () {
        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
    resizeWindow();
    makeNavigationStatic();
    jQuery(window).resize(function () {
        makeNavigationStatic();
        resizeWindow();
    });
    var top = jQuery('.staticNavigation').offset().top;
    jQuery(window).scroll(function () {
        makeNavigationStatic();
    });
    function resizeWindow() {
        var width = jQuery('.staticNavigation').outerWidth();
        console.log(width);
        jQuery('.staticNavigation .area').css({
            'width': width
        });
    }
    function makeNavigationStatic() {
        if (jQuery(window).scrollTop() > (top - 20) && document.documentElement.clientWidth > 767) {
            jQuery('.staticNavigation').css({
                'position': 'fixed',
                'top': '20px'
            });
        }
        else {
            jQuery('.staticNavigation').css({
                'position': 'relative',
                'top': 'auto'
            });
        }
    }
    // Modal
    jQuery('.basicModal').click(function (event) {
        event.preventDefault();
        jQuery('#basicModal').modal('show');
    });
    jQuery('.largeModal').click(function (event) {
        event.preventDefault();
        jQuery('#largeModal').modal('show');
    });
    // Popover
    jQuery('.popoverBasic').popover({
        trigger: 'hover'
    });

});




