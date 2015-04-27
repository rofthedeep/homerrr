jQuery(function () {
    //Controller
    
    var that = this;
    jQuery('form', this.ctx).submit(function (ev) {
        //jQuery(this).find('.btn').addClass('loader');
        jQuery.ajax({
            type: jQuery(this).attr('method'),
            url: jQuery(this).attr('action'),
            data: jQuery(this).serialize(),
            success: function (data) {
                //alert('ok');
                //jQuery(this).find('.btn').removeClass('loader');          
            }
        });
        ev.preventDefault();
        
    });
});

