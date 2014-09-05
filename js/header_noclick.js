(function($) {
    $(document).ready(function() {
        $('#secondary a[href$=what-is-broad]').noClick();
        $('#secondary a[href$=news-and-publications]').noClick();
        $('#secondary a[href$=scientific-community]').noClick();
        $('#main-inner .breadcrumb a[href$=what-is-broad]').noLinkBreadcrumb();
        $('#main-inner .breadcrumb a[href$=news-and-publications]').noLinkBreadcrumb();
        $('#main-inner .breadcrumb a[href$=scientific-community]').noLinkBreadcrumb();
    });

    $.fn.extend({
        noClick: function() {
            $(this).click(function() {
                return false;
            });
        },
        noLinkBreadcrumb: function() {
            $(this).noClick();
            $(this).addClass('disabled-bc-link');
        }
    });

})(jQuery);
