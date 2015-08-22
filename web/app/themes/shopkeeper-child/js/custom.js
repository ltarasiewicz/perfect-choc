(function($) {

    $(window).on('load', function () {
        //JS version for the retina query

        var generic_media_query = window.matchMedia("screen and (min-device-pixel-ratio:2)");
        var webkit_media_query = window.matchMedia("screen and (-webkit-min-device-pixel-ratio:2)");
        var mozilla_media_query = window.matchMedia("screen and (-moz-min-device-pixel-ratio:2)");
        var opera_media_query = window.matchMedia("screen and (-o-min-device-pixel-ratio:2)");
        var ms_media_query = window.matchMedia("screen and (-ms-min-device-pixel-ratio:2)");

        if ((generic_media_query.matches ||
            webkit_media_query.matches ||
            mozilla_media_query.matches ||
            opera_media_query.matches ||
            ms_media_query.matches) && data.is_homepage) {

            var hp_big_logo = $('img.vc_single_image-img');
            console.log(data);
            hp_big_logo.attr('src', data.images_path + '/logolarge@2x.png');
        }
    });

})(jQuery);